<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function readPost(Request $request)
    {
        $post = Post::where('id', $request->post_id)->with('postAuthor', 'motherTopic');

        return response(['post' => $post->get()], 200);
    }

    public function deletePost(Request $request)
    {
        $user = auth()->user();

        $post = Post::where('id', $request->topic_id)->first();

        // Sprawdza czy zalogowany user ma uprawnienia do operacji (PostPolicy.php)
        if ($user->can('delete', $post)) {
            $post->delete();

            return response(['message' => 'The post has been successfully deleted.'], 204);
        } else {
            return response(['message' => 'Permission denied'], 403);
        }
    }

    public function createPost(Request $request)
    {
        $user = auth()->user();

        if($user->can('create'))
            return response(['message' => 'Permission denied'], 403);

        $request->validate([
            'body' => 'required|string',
            'user_id' => 'required|integer',
            'topic_id' => 'required|integer'
        ]);

        $post = Post::create([
            'body' => $request->body,
            'user_id' => $request->user_id,
            'topic_id' => $request->topic_id
        ]);

        return response([
            'Post' => $post,
            'message' => 'The post has been successfully created'
        ], 201);
    }
}
