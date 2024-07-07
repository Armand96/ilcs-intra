<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostFile;
use App\Models\PostLike;
use App\Models\PostViewer;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    use NotificationTrait;

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function listPost()
    {
        $post = Post::orderBy('created_at', 'DESC')
                ->with(['comments.user', 'comments.likers', 'comments.replies.user', 'comments.replies.likers', 'postedBy', 'files', 'likers.user'])
                ->withCount(['comments as total_comments' => function($query) {
                    $query->orWhereIn('parent_comment_id', function($subQuery) {
                        $subQuery->select('id')
                                 ->from('comments')
                                 ->whereColumn('comments.post_id', 'posts.id');
                    });
                }])
                ->paginate(6);
        return response()->json($post);
    }

    public function singlePost(Post $post)
    {
        $post->load(['comments.user', 'comments.likers', 'comments.replies.user', 'comments.replies.likers', 'postedBy', 'files', 'likers.user'])
        ->loadCount(['comments as total_comments' => function($query) use ($post) {
            $query->orWhereIn('parent_comment_id', function($subQuery) use ($post) {
                $subQuery->select('id')
                         ->from('comments')
                         ->where('post_id', $post->id);
            });
        }]);
        return response()->json($post);
    }

    public function makePost(PostRequest $request)
    {
        $messages = [
            'videos.*.max' => 'File size melebihi batas',
        ];

        $request->validate([
            'content' => 'required',
            'videos.*' => 'max:'.env('MAX_FILE_SIZE_VIDEO', 10240)
        ], $messages);

        // dd($request->all());

        $data = $request->only(['content', 'tipe', 'images', 'videos', 'files']);

        try {
            DB::beginTransaction();

            $data['posted_by'] = Auth::user()->id;
            $post = Post::create($data);

            /* UPLOAD IMAGES */
            if ($request->has('images')) {
                /* INSERT TO FILE POST */

                // dd($request->images);
                foreach ($request->images as $key => $value) {
                    $dataImage = $this->convertBase64ToImage($value,$this->generateRandomString());

                    // Store the image in storage/app/public directory
                    Storage::put('public/employee_forum/' . $dataImage['fileName'], $dataImage['image']);
                    $dataFile = array(
                        'post_id' => $post->id,
                        'path_file' => $dataImage['fileName'],
                        'tipe' => 'gambar',
                    );

                    PostFile::create($dataFile);
                }
            }

            /* UPLOAD FILES */
            if ($request->hasFile('files')) {

                foreach ($request->file('files') as $key => $fl) {
                    $fileName = str_replace(" ", "_", $fl->getClientOriginalName());
                    $fl->storeAs('public/employee_forum/', $fileName);
                    // $data['path_file'] = $fileName;
                    $dataFile = array(
                        'post_id' => $post->id,
                        'path_file' => $fileName,
                        'tipe' => 'file'
                    );

                    PostFile::create($dataFile);
                }
            }

            /* UPLOAD VIDEOS */
            if ($request->hasFile('videos')) {

                foreach ($request->file('videos') as $key => $fl) {
                    $fileName = str_replace(" ", "_", $fl->getClientOriginalName());
                    $fl->storeAs('public/employee_forum/', $fileName);
                    // $data['path_file'] = $fileName;
                    $dataFile = array(
                        'post_id' => $post->id,
                        'path_file' => $fileName,
                        'tipe' => 'video'
                    );

                    PostFile::create($dataFile);
                }
            }

            DB::commit();

            $post->load(['comments', 'postedBy']);
            return response()->json($post);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
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
            Log::error($th->getMessage());
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
            $url = "";
            $data['user_id'] = Auth::user()->id;
            $comment = Comment::create($data);
            $senderId = Auth::user()->id;

            if(!isset($data['post_id'])) {
                /* REPLIES */
                $data['post_id'] = 0;
                $parentComment = Comment::find($data['parent_comment_id']);
                $postData = Post::with(['comments'])->find($parentComment->post_id);
                if($postData && count($postData->comments)) {
                    $userListNotif = [];
                    $url = $postData->id;
                    if($postData->posted_by != Auth::user()->id) array_push($userListNotif, $postData->posted_by);

                    foreach ($postData->comments as $key => $value) {
                        if($value->user_id == Auth::user()->id) continue;
                        if(!array_key_exists($value->user_id, $userListNotif)) array_push($userListNotif, $value->user_id);
                    }

                    /* SEND NOTIF */
                    $this->massNotification($userListNotif, $senderId, $url, 0, $parentComment->id, 'comment');
                }
            }
            else {
                /* POST */
                $postData = Post::with(['comments'])->find($data['post_id']);
                if($postData && count($postData->comments)) {
                    $userListNotif = [];
                    $url = $postData->id;
                    if($postData->posted_by != Auth::user()->id) array_push($userListNotif, $postData->posted_by);

                    foreach ($postData->comments as $key => $value) {
                        if($value->user_id == Auth::user()->id) continue;
                        if(!array_key_exists($value->user_id, $userListNotif)) array_push($userListNotif, $value->user_id);
                    }

                    /* SEND NOTIF */
                    $this->massNotification($userListNotif, $senderId, $url, $postData->id, 0, 'comment');
                }
            }

            $comment->load('user');
            return response()->json($comment);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
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
            Log::error($th->getMessage());
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
            $url = "";
            $senderId = Auth::user()->id;

            if(!isset($data['comment_id'])) {
                /* POST */
                $post = Post::with(['comments'])->find($data['post_id']);
                $url = $post->id;
                $post->increment('total_like');
                $userListNotif = [];
                if($post->posted_by != Auth::user()->id) array_push($userListNotif, $post->posted_by);
                $this->massNotification($userListNotif, $senderId, $url, $post->id, 0, 'like');
            } else {
                /* LIKE */
                $currentComment = Comment::find($data['comment_id']);

                if($currentComment->post_id) {
                    $post = Post::find($currentComment->post_id);
                    $url = $post->id;
                } else {
                    $parentComment = Comment::find($currentComment->parent_comment_id);
                    $url = $parentComment->post_id;
                }

                $userListNotif = [];
                if($currentComment->user_id != Auth::user()->id) array_push($userListNotif, $currentComment->user_id);
                $this->massNotification($userListNotif, $senderId,  $url, 0, $currentComment->id, 'like');
            }

            DB::commit();

            return response()->json(['message' => "Sukses Like"]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
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
            if(isset($data['post_id'])) {
                $post->decrement('total_like');
            }
            PostLike::when(isset($data['post_id']), function($qry) use($data){
                $qry->where('post_id', $data['post_id']);
            })->when(isset($data['comment_id']), function($qry) use($data){
                $qry->where('comment_id', $data['comment_id']);
            })->where('user_id', $data['user_id'])->delete();

            DB::commit();
            return response()->json(['message' => "Sukses Unlike"]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
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
            Log::error($th->getMessage());
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
            Log::error($th->getMessage());
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
                $post->increment('total_view');
                DB::commit();
            }
            return response()->json(['message' => 'view post berhasil']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            //throw $th;
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}
