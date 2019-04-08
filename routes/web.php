<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Post routes

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/{post}', 'PostController@show')->name('show')
        ->where('post', '[0-9]+');

    Route::middleware('auth')->group(function () {
        Route::get('/create', 'PostController@create')->name('create');
        Route::post('/create', 'PostController@store')->name('store');

        Route::middleware('author.post')->group(function () {
            Route::get('/{post}/edit', 'PostController@edit')->name('edit');
            Route::post('/{post}/edit', 'PostController@update')->name('update');
            Route::get('/{post}/delete', 'PostController@destroy')->name('destroy');
        });
    });
});

// Comment routes
Route::post('/post/{post}/comment/create', 'CommentController@store')
    ->name('comment.store')
    ->middleware('auth');

Route::prefix('comment')->name('comment.')->middleware(['auth', 'author.comment'])->group(function () {
    Route::post('/{comment}/edit', 'CommentController@update')->name('update');
    Route::get('/{comment}/delete', 'CommentController@destroy')->name('destroy');
});

Route::prefix('conversation')->name('conversation.')->middleware('auth')->group(function () {
    Route::get('/', 'ConversationController@index')->name('index');
    Route::get('/create/{user}', 'ConversationController@create')->name('create');

    Route::middleware('author.conversation')->group(function () {
        Route::get('/{conversation}/messages', 'ConversationController@messages')->name('messages');
        Route::post('/{conversation}/messages', 'ConversationController@sendMessage')->name('sendMessage');
    });
});

Route::get('/user/{user}', 'UserController@show')->name('user.show');