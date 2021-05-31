<?php

namespace App\Http\Controllers;

use App\User;

class ExploreController extends Controller
{
    // Aqui exemplo de um Invokable Controller 
    // Um Controller que só tem um método, no Route, só precisa informar o nome do Controller 
    public function __invoke()
    {
        return view('explore', [
            'users' => User::paginate(50),
        ]);
    }
}