<?php

namespace App\Http\Controllers;

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
        return view('admin.scheduled_appointments');
    }
}
