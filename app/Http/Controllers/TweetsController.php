<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Tweet;


class TweetsController extends Controller
{

    public function index()
    {

        // DD(auth()->user()->timeline); // Illuminate\Database\Eloquent\Collection 
        // DD(auth()->user()->timeline()); // Illuminate\Database\Eloquent\Relations\BelongsToMany

        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:255'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('/tweets');
    }
}
