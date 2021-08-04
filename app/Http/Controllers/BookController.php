<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function addAppointment(Request $request) {
        $user = auth()->user();
        $booking = new Booking();
        $booking->vac_center_id = $request->get('vaccination_center');
        $booking->vac_id = $request->get('vaccination_id');
        $booking->date_of_shot = $request->get('date_of_shot');
        $booking->shot_number = $request->get('shot_number');
        $booking->isDone = 0;
        $booking->isCancelled = 0;
        $booking->user_id = $user->id;

        $booking->save();
        return redirect('/home');
    }
}
