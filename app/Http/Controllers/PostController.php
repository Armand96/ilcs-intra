<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostFile;
use App\Models\PostLike;
use App\Models\PostViewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class PostController extends Controller
{
    public function listPost()
    {
        $post = Post::orderBy('created_at', 'DESC')->with(['comments.user', 'comments.likers', 'comments.replies.user', 'postedBy', 'files', 'likers'])->paginate(6);
        return response()->json($post);
    }

    public function singlePost(Post $post)
    {
        $post->load(['comments.user', 'comments.likers', 'comments.replies.user', 'postedBy', 'files', 'likers']);
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

    public function updatePost(Request $request, Post $post)
    {
        try {
            $request->validate([
                'content' => 'required',
            ]);
            $data = $request->only(['content']);
            $post->update($data);

            return response()->json(['message' => "Post behrasil diupdate"]);
        } catch (\Throwable $th) {
            //throw $th;
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
            return response()->json($comment);
        } catch (\Throwable $th) {
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function editComment(Request $request, Comment $comment)
    {

        try {
            $request->validate([
                'comment' => 'required',
            ]);

            $data = $request->only([
                'post_id',
                'parent_comment_id',
                'comment',
            ]);

            $comment->update($data);
            $comment->load('user');

            return response()->json($comment);
        } catch (\Throwable $th) {
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function postLikers($postId)
    {
        $likers = PostLike::where('post_id', $postId)->get();
        return response()->json($likers);
    }

    public function commentLikers($commentId)
    {
        $likers = PostLike::where('comment_id', $commentId)->get();
        return response()->json($likers);
    }

    public function like(Request $request)
    {
        $data = $request->only([
            'post_id',
            'comment_id',
        ]);

        try {
            DB::beginTransaction();

            $data['user_id'] = Auth::user()->id;
            PostLike::create($data);
            $post = Post::find($data['post_id']);
            $post->increment('total_like');

            DB::commit();

            return response()->json(['message' => "Sukses Like"]);
        } catch (\Throwable $th) {
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function unlike(Request $request)
    {
        try {
            $data = $request->only([
                'post_id',
                'comment_id',
            ]);

            DB::beginTransaction();

            $data['user_id'] = Auth::user()->id;

            $post = Post::find($data['post_id']);
            $post->decrement('total_like');
            PostLike::when(isset($data['post_id']), function($qry) use($data){
                $qry->where('post_id', $data['post_id']);
            })->when(isset($data['comment_id']), function($qry) use($data){
                $qry->where('comment_id', $data['comment_id']);
            })->where('user_id', $data['user_id'])->delete();

            DB::commit();
            return response()->json(['message' => "Sukses Unlike"]);
        } catch (\Throwable $th) {
            //throw $th;
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

            Comment::where('id', $commentId)->orWhere('parent_comment_id', $commentId)->delete();

            // DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            // return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function seePost(Post $post)
    {
        try {
            $userId = Auth::user()->id;
            $view = PostViewer::where('post_id', $post->id)->where('user_id', $userId)->first();
            if(!$view) {
                DB::beginTransaction();
                $dataInsert = array(
                    'post_id' => $post->id,
                    'user_id' => $userId
                );

                PostViewer::create($dataInsert);
                $post->increment('total_viewer');
                DB::commit();
            }
            return response()->json(['message' => 'view post berhasil']);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}
