<?php

use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
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


// TOPICS
Route::get('/topics', [TopicController::class, 'listTopics']);

Route::get('/topics/{topic_id}', [TopicController::class, 'readTopic']);

Route::delete('/topics/{topic_id}', [TopicController::class, 'deleteTopic']);

//Przyjmuje wartości title, user_id
Route::post('/topics', [TopicController::class, 'createTopic']);

// TODO Group Topics 
// for example topics created by specified user based on user_id


// POSTS
Route::get('/posts/{post_id}', [PostController::class, 'readPost']);

Route::delete('/posts/{post_id}', [PostController::class, 'deletePost']);

// Przyjmuje wartości body, user_id, topic_id
Route::post('/posts', [PostController::class, 'submitPost']);
