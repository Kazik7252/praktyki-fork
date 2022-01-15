<?php

use App\Http\Controllers\TopicController;
use App\Http\Controllers\ArticleController;
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

Route::get('/topics/{id}', [TopicController::class, 'readTopic']);

Route::delete('/topics/{id}', [TopicController::class, 'deleteTopic']);

Route::post('/topics', [TopicController::class, 'createTopic']);

// TODO ARTICLES
