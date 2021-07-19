<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    function home() {

            $role = User::select('select user_type from users where id = '. Auth::id());
            return view('home', ['role' => $role]);
    }

    function addCitizen() {
        return view('add_citizen');
    }

}
