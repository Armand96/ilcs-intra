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
    public function listPost()
    {
        $post = Post::orderBy('created_at', 'DESC')->with(['comments.user', 'comments.replies.user', 'postedBy'])->paginate(6);
        return response()->json($post);
    }

    public function makePost(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $data = $request->only(['content', 'tipe', 'images', 'videos', 'files']);

        try {
            DB::beginTransaction();

            $data['posted_by'] = Auth::user()->id;
            $post = Post::create($data);

            /* UPLOAD IMAGES */
            if ($request->has('images') && isset($data['tipe'])) {
                /* INSERT TO FILE POST */

                foreach ($request->images as $key => $value) {
                    $dataImage = $this->convertBase64ToImage($value, time());

                    // Store the image in storage/app/public directory
                    Storage::put('public/employee_forum/' . $dataImage['fileName'], $dataImage['image']);
                    $dataFile = array(
                        'post_id' => $post->id,
                        'path_file' => $dataImage['fileName'],
                        'tipe' => $data['tipe'],
                    );

                    PostFile::create($dataFile);
                }
            }

            /* UPLOAD FILES */
            if ($request->hasFile('files') && isset($data['tipe'])) {

                foreach ($request->file('files') as $key => $fl) {
                    $fileName = time() . '.' . $fl->extension();
                    $fl->storeAs('public/employee_forum/', $fileName);
                    // $data['path_file'] = $fileName;
                    $dataFile = array(
                        'post_id' => $post->id,
                        'path_file' => $fileName,
                        'tipe' => $data['tipe']
                    );

                    PostFile::create($dataFile);
                }
            }

            DB::commit();

            $post->load(['comments', 'postedBy']);
            return response()->json($post);
        } catch (\Throwable $th) {
            DB::rollBack();
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    private function convertBase64ToImage(string $base64String, string $fileName)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64String, $type)) {
            $base64String = substr($base64String, strpos($base64String, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif, etc.
        } else {
            return null;
        }

        $dataArray = array(
            'image' => base64_decode($base64String), // Decode the base64 string
            'fileName' => $fileName . "." . $type // Generate a unique file name
        );

        return $dataArray;
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
            $comment = Comment::create($data);
            $comment->load('user');
            return response()->json();
        } catch (\Throwable $th) {
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
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
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
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
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function deleteComment($commentId)
    {
        try {
            // DB::beginTransaction();

            Comment::where('comment_id', $commentId)->orWhere('parent_comment_id', $commentId)->delete();

            // DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}
