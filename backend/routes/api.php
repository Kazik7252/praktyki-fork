<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\HandlePostRequest;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//              ----------------USERS----------------
Route::post('/user/register', [UserController::class, 'registerUser']);


// Logowanie użytkownika
Route::post('/user/login', [UserController::class, 'login']);


// Sprawdzanie jaki użytkownik jest obecnie zalogowany, przyjmuje Bearer Token
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/logout', [UserController::class, 'logout'])
    ->middleware('auth:sanctum');



//              ----------------TOPICS----------------
Route::get('/topics', [TopicController::class, 'listTopics']);

Route::get('/topics/by-topic-id/{topic_id}', [TopicController::class, 'readTopicByTopicId']);

// Zwraca dane o poście oraz o topicu w którym się znajduje
// Endpoint nie został ukończony, na tę chwilę zwraca 404
Route::get('/topics/by-post-id/{post_id}', [TopicController::class, 'readTopicByPostId']);

// Zwraca dane użytkownika oraz informacje o jego wszystkich topicach
Route::get('/topics/by-user-id/{user_id}', [TopicController::class, 'readTopicsByUserId']);

Route::delete('/topics/by-topic-id/{topic_id}', [TopicController::class, 'deleteTopic'])
    ->middleware('auth:sanctum');

//Przyjmuje parametry title, user_id
Route::post('/topics', [TopicController::class, 'createTopic'])
    ->middleware('auth:sanctum');




//              ----------------POSTS----------------
Route::get('/posts/by-post-id/{post_id}', [PostController::class, 'readPost']);

Route::delete('/posts/by-post-id/{post_id}', [PostController::class, 'deletePost'])
    ->middleware('auth:sanctum');

// Przyjmuje parametry body, user_id, topic_id
Route::post('/posts', [PostController::class, 'createPost'])
    ->middleware('auth:sanctum');


