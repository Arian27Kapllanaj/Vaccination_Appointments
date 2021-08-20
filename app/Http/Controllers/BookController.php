<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingHasVaccinationCenters;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    function addAppointment(Request $request)
    {
        $count = DB::table('booking')->select('id')->where('user_id', '=', Auth::id())->count();
        if ($count > 1) {
            echo "You have made all the shots of the vaccination";
            die();
        }

        $first = DB::table('booking')->select('id')->where('user_id', '=', Auth::id())->count();
        if ($first > 0) {

            $confirm = DB::table('booking')->select('id')->where('user_id', '=', Auth::id())->where('isDone', '=', '1')->count();
            if ($confirm < 1) {
                echo "Your first appointment is not confirmed, so you cannot make a second appointment without doing the first one.";
                die();
            }
        }

        $user = auth()->user();

        $request->date_of_birth = auth()->user()->birthday;
        $age = Carbon::parse($request->date_of_birth)->diff(Carbon::now())->y;

        $result = DB::table('vaccination')
            ->select('min_age')
            ->where('id', '=', $request->get('vaccination_id'))
            ->get();

        $min_age = $result[0]->min_age;

        if ($age < $min_age) {
            //Later on I can add a new page that looks better to show this message
            echo "You are younger than " . $min_age . " years old";
            die();
        }

        $findUser = Booking::where('user_id', '=', Auth::id())->where('isDone', '=', '1')->count();

        if ($findUser > 0) {
            $date_of_shot = $request->get('date_of_shot');

            $diff = Carbon::parse($date_of_shot)->diffInDays(Carbon::now());


            $result = DB::table('vaccination')->select('interval_shots')->where('id', '=', $request->get('vaccination_id'))->get();
            $interval = $result[0]->interval_shots;

            if ($diff < $interval) {
                //Later on I can add a new page that looks better to show this message
                $difference = $interval - $diff;
                echo "You need to choose " . $difference . " more days to complete the interval between shots.";

                echo " The interval between shots is: " . $interval;
                die();
            }
        }
        $booking = new Booking();
        $booking->vac_center_id = $request->get('vaccination_center');
        $booking->vac_id = $request->get('vaccination_id');
        $booking->date_of_shot = $request->get('date_of_shot');
        $booking->time = $request->get('time');
        $booking->shot_number = $request->get('shot_number');
        $booking->isDone = 0;
        $booking->isCancelled = 0;
        $booking->user_id = $user->id;

        $booking->save();
        $bookingHasVaccination = new BookingHasVaccinationCenters();
        $bookingHasVaccination->booking_id = $booking->id;
        $bookingHasVaccination->vaccination_center_id = $request->get('vaccination_center');
        $bookingHasVaccination->save();


        return redirect('/home');
    }
}
