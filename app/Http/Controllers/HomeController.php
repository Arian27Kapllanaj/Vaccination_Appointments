<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function home()
    {
        $user = User::find(Auth::id());

        return view('home', ['role' => $user->user_type]);
    }
}
