<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    function home() {
            $user = User::find(Auth::id());
            return view('home', ['role' => $user->user_type]);
    }

    function addCitizen() {
        return view('add_citizen');
    }

}
