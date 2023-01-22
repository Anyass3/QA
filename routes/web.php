<?php

use App\Http\Controllers\QuestionController;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [QuestionController::class, 'index']);
Route::post('/questions', [QuestionController::class, 'store']);
Route::get('/questions/create', [QuestionController::class, 'create']);
Route::get('/questions/{question}', [QuestionController::class, 'show']);

Route::get('/hello-world', function () {
    return response('<p>my <i>Zainab Nyass</i></p>', 200)
        ->header('Content-Type', 'text/plain');
});
Route::get('/slug/{name}', function ($name, Request $req) {
    return str()->slug($name . ' ' . fake('en')->sentence());
})->where('name', '[0-9]+');

Route::get('/search', function (Request $req) {
    dd($req);
});
