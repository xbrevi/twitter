<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\User;

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

Route::get('/teste', function() {
    //\Illuminate\Support\Facades\Artisan::call('storage:link');
    return storage_path();
});


Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');    
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');

    //Route::post('/profiles/{user:name}/follow', 'FollowsController@store');
    Route::post('/profiles/{user:username}/follow', 'FollowsController@store')->name('follow');
    Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', 'ProfilesController@update')->middleware('can:edit,user');
    Route::get('/explore', 'ExploreController');
});

//Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
//Route::get('/profiles/{user:name}', 'ProfilesController@show')->name('profile');
Route::get('/profiles/{user:username}', 'ProfilesController@show')->name('profile');

Auth::routes();


