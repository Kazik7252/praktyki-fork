<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function listTopics(Request $request)
    {
        // Pobiera rekordy z tabeli Topics
        // 'with' zamienia user_id na obiekt
        $topics = Topic::with('topicAuthor')->orderBy('created_at', 'DESC');

        // Filtrowanie rekordów
        if ($request->search)
            $topics->where('title', 'like', '%' . $request->search . '%');

        return response(['topics' => $topics->get()], 200);
    }

    public function readTopicByTopicId(Request $request)
    {
        // Pobiera rekord z tabeli Topics o podanym id oraz wszystkie odpowiadające mu rekordy z tabeli Posts
        $topic = Topic::where('id', $request->topic_id)->with('topicAuthor');

        $posts = Post::where('topic_id', $request->topic_id)
            ->with('postAuthor')
            ->orderBy('created_at', 'DESC');

        if (!$topic->first())
            return response(['message' => "The topic doesn't exist"], 204);

        return response([
                'topic' => $topic->get(),
                'posts' => $posts->get()
            ],
            200
        );
    }

    public function readTopicByPostId(Request $request)
    {
        //TODO nie wiem jak wkleić wyrażenie jako warunek w where()
        // $post = Post::raw("SELECT * FROM topics WHERE id = (SELECT topic_id FROM posts WHERE id = $request->post_id");

        $post = Post::where('id', $request->post_id)->with('motherTopic');

        // $topic = Topic::where('id','!=',0)->posts()->where('id', $request->topic_id)->first();

        // dd($topic);
        // PO UKOŃCZENIU ZAKOMENTOWAĆ LUB USUNĄĆ RETURN 404
        return response(['Message' => 'This API is not released yet'], 404);

        if (!$post->first())
            return response(['Message' => "This post doesn't exist"],204);

        return response(['posts' => $post->get()], 200);
    }

    public function readTopicsByUserId(Request $request)
    {
        $user = User::where('id', $request->user_id)->with('topics');

        if (!$user->first())
            return response(['Message' => 'This user does not exist'], 204);

        return response(['user' => $user->get()], 200);
    }

    public function deleteTopic(Request $request)
    {
        // Pobiera rekord z tabeli Topics z id podanym w ścieżce
        Topic::where('id', $request->topic_id)->delete();

        Post::where('topic_id', $request->topic_id)->delete();

        return response(['message' => 'The topic has been successfully deleted.'], 204);
    }

    public function createTopic(Request $request)
    {

        //Sprawdzanie czy podane dane spełniają wymagania
        $request->validate([
            'title' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        // Wpisuje do tabeli dane podane przez klienta
        Topic::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
        ]);

        return response(['message' => 'The topic has been successfully created.'], 201);
    }
}
