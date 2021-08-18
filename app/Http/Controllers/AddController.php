<?php

namespace App\Http\Controllers;

use App\Models\VaccinationCenters;
use App\Models\Vaccinations;
use Illuminate\Http\Request;

class AddController extends Controller
{
    function addVaccinationCenter(Request $request) {
        $add = new VaccinationCenters();
        $add->name = $request->get('name');
        $add->address = $request->get('address');
        $add->rooms = $request->get('rooms');
        $add->save();

        return redirect('home');
    }

    function addVaccine(Request $request) {
        $add = new Vaccinations();
        $add->name = $request->get('name');
        $add->min_age = $request->get('age');
        $add->number_of_shots = $request->get('shots');
        $add->interval_shots = $request->get('interval');
        $add->save();

        return redirect('home');
    }
}
