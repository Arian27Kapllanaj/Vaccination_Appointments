<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function home() {

            $vaccine = DB::table('booking')->select('date_of_shot')->where('user_id', '=', Auth::id())->get();
            $date = $vaccine[0]->date_of_shot;
            $vac_date = Carbon::parse($date);
            $vac_date->format('Y-m-d');
            $user = User::find(Auth::id());
            return view('home', ['role' => $user->user_type, 'vac_date' => $vac_date, 'vaccine' => $vaccine]);

    }
}
