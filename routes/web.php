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

});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::post('/profiles/{user:name}/follow', 'FollowsController@store');
});

//Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
Route::get('/profiles/{user:name}', 'ProfilesController@show')->name('profile');

Auth::routes();


