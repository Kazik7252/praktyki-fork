<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        if($request->search)
            $topics->where('title', 'like', '%' . $request->search . '%');

        return response(['topics' => $topics->get()], 200);
    }

    public function readTopic(Request $request)
    {
        // Pobiera rekord z tabeli Topics o podanym id oraz wszystkie odpowiadające mu rekordy z tabeli Articles
        $topic = Topic::where('id', $request->id)->with('topicAuthor');

        $articles = Article::where('topic_id',$request->id)->orderBy('created_at', 'DESC');

        return response(['topic' => $topic->get(), 'articles' => $articles->get()], 200);
    }

    public function deleteTopic(Request $request)
    {
        // Pobiera rekord z tabeli Topics z id podanym w ścieżce
        $topic = Topic::where('id', $request->id)->delete();

        return response(['message' => 'The topic has been deleted.'], 200);
    }

    public function createTopic(Request $request) {

        //Sprawdzanie czy podane dane spełniają wymagania
        $request->validate([
            'title' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        // Wpisuje do tabeli dane podane przez klienta
        $user = Topic::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
        ]);

        return response(['message' => 'The topic has been successfully created.'], 201);
    }
}
