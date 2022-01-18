<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//              ----------------TOPICS----------------
Route::get('/topics', [TopicController::class, 'listTopics']);

Route::get('/topics/by-topic-id/{topic_id}', [TopicController::class, 'readTopicByTopicId']);

// Zwraca dane o poście oraz o topicu w którym się znajduje
Route::get('/topics/by-post-id/{post_id}', [TopicController::class, 'readTopicByPostId']);

// Zwraca dane użytkownika oraz informacje o wszystkich topicach
Route::get('/topics/by-user-id/{user_id}', [TopicController::class, 'readTopicsByUserId']);

Route::delete('/topics/by-topic-id/{topic_id}', [TopicController::class, 'deleteTopic']);

//Przyjmuje wartości title, user_id
Route::post('/topics', [TopicController::class, 'createTopic']);


//              ----------------POSTS----------------
Route::get('/posts/by-post-id/{post_id}', [PostController::class, 'readPost']);

Route::delete('/posts/by-post-id/{post_id}', [PostController::class, 'deletePost']);

// Przyjmuje wartości body, user_id, topic_id
Route::post('/posts', [PostController::class, 'submitPost']);


// TODO         ----------------USERS----------------
Route::post('/user/register', [UserController::class, 'store']);

// Porównywanie ### hasła do tego w bazie danych przy logowaniu.
// Illuminate/Support/Facades/Hash::check('password'), $"username"->"password");
// Zwraca true or false

Route::get('/user/login', [UserController::class, 'login']);

Route::post('/user/logout', [SessionController::class, 'destroy']);


