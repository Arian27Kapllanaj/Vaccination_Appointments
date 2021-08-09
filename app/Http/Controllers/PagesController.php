<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\VaccinationCenters;
use App\Models\Vaccinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    function book() {

        $center = VaccinationCenters::all();
        $vaccinations = Vaccinations::all();
        return view('citizen.book')->with(['centers' => $center])->with(['vaccination' => $vaccinations]);
    }

    function allAppointments() {

        $all = DB::table('users')
            ->join('booking', 'users.id', '=', 'booking.user_id')
            ->join('booking_has_vaccination_center', 'booking.id', '=', 'booking_has_vaccination_center.booking_id')
            ->join('vaccination_center','booking_has_vaccination_center.vaccination_center_id', '=', 'vaccination_center.id')
            ->join('vaccination_center_has_vaccination', 'vaccination_center.id', '=', 'vaccination_center_has_vaccination.vaccination_center_id')
            ->join('vaccination', 'vaccination_center_has_vaccination.vaccination_id', '=', 'vaccination.id')
            ->select('users.name as name', 'users.surname', 'booking.*', 'vaccination_center.name as vac_center_name', 'vaccination.name as vac_name')
            ->get();

        return view('admin.scheduled_appointments')->with(['all' => $all]);
    }
}
