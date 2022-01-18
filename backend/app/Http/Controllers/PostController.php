<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //TODO Post Methods
    public function readPost(Request $request)
    {
        $post = Post::where('id', $request->post_id)->with('postAuthor', 'motherTopic');

        return response(['post' => $post->get()], 200);
    }

    public function deletePost(Request $request)
    {
        $post = Post::where('id', $request->post_id)->delete();

        return response(['message' => 'The post has been successfully deleted'], 200);
    }

    public function submitPost(Request $request)
    {
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

        return response(['message' => 'The post has been successfully created'], 201);
    }
}
