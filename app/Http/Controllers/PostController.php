<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostFile;
use App\Models\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function home()
    {
        $post = Post::orderBy('created_at', 'DESC')->with(['comments', 'postedBy'])->paginate(9);
    }

    public function makePost(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $data = $request->only(['content', 'tipe']);

        try {
            DB::beginTransaction();

            $data['posted_by'] = Auth::user()->id;
            $post = Post::create($data);

            if ($request->hasFile('file') && isset($data['tipe'])) {
                /* INSERT TO FILE POST */
                $fileName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/post_file/', $fileName);
                $dataFile = array(
                    'post_id' => $post->id,
                    'path_file' => $fileName,
                    'tipe' => $data['tipe'],
                );

                PostFile::create($dataFile);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    public function comment(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'comment' => 'required',
        ]);

        $data = $request->only([
            'post_id',
            'parent_comment_id',
            'comment',
        ]);

        try {
            $data['user_id'] = Auth::user()->id;
            Comment::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    public function like(Request $request)
    {
        $data = $request->only([
            'post_id',
            'comment_id',
        ]);

        try {
            $data['user_id'] = Auth::user()->id;
            PostLike::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    public function deletePost($postId)
    {
        try {
            DB::beginTransaction();

            $postFiles = PostFile::where('post_id', $postId)->get();

            Post::where('id', $postId)->delete();
            Comment::where('post_id', $postId)->delete();
            PostLike::where('post_id', $postId)->delete();
            PostFile::where('post_id', $postId)->delete();

            /* DELETE FILE */

            if ($postFiles) {
                foreach ($postFiles as $key => $pf) {
                    Storage::disk('public')->exists("profile_picture/$pf->path_file");
                    Storage::delete("public/profile_picture/$pf->path_file");
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }
}
