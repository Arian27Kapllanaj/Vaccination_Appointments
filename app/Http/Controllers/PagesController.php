<?php

namespace App\Http\Controllers;

use App\Models\VaccinationCenters;
use App\Models\Vaccinations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class PagesController extends Controller
{
    function book()
    {

        $center = VaccinationCenters::all();
        $vaccinations = Vaccinations::all();

        return view('citizen.book')->with(['centers' => $center])->with(['vaccination' => $vaccinations]);
    }

    function allAppointments()
    {

        $all = DB::table('users')
            ->join('booking', 'users.id', '=', 'booking.user_id')
            ->join('booking_has_vaccination_center', 'booking.id', '=', 'booking_has_vaccination_center.booking_id')
            ->join('vaccination_center', 'booking_has_vaccination_center.vaccination_center_id', '=', 'vaccination_center.id')
            ->join('vaccination', 'booking.vac_id', '=', 'vaccination.id')
            ->select('users.name as name', 'users.surname', 'booking.*', 'vaccination_center.name as vac_center_name', 'vaccination.name as vac_name')
            ->count();

        return view('admin.scheduled_appointments')->with(['all' => $all]);
    }


    function addCitizen()
    {
        return view('nurse.add_citizen');
    }

    function allCitizensAppointments()
    {
        $allAppointments = DB::table('users')
            ->join('booking', 'users.id', '=', 'booking.user_id')
            ->join('booking_has_vaccination_center', 'booking.id', '=', 'booking_has_vaccination_center.booking_id')
            ->join('vaccination_center', 'booking_has_vaccination_center.vaccination_center_id', '=', 'vaccination_center.id')
            ->join('vaccination', 'booking.vac_id', '=', 'vaccination.id')
            ->select('users.name as name', 'users.surname', 'booking.*', 'vaccination_center.name as vac_center_name', 'vaccination.name as vac_name')
            ->where('isDone', '=', '0')
            ->where('isMissed', '=', '0')
            ->where('isCancelled', '=', '0')
            ->where('booking.user_id', '!=', Auth::id())
            ->count();

            $show = DB::table('users')
            ->join('booking', 'users.id', '=', 'booking.user_id')
            ->join('booking_has_vaccination_center', 'booking.id', '=', 'booking_has_vaccination_center.booking_id')
            ->join('vaccination_center', 'booking_has_vaccination_center.vaccination_center_id', '=', 'vaccination_center.id')
            ->join('vaccination', 'booking.vac_id', '=', 'vaccination.id')
            ->select('users.name as name', 'users.surname', 'booking.*', 'vaccination_center.name as vac_center_name', 'vaccination.name as vac_name')
            ->where('isDone', '=', '0')
            ->where('isMissed', '=', '0')
            ->where('isCancelled', '=', '0')
            ->where('booking.user_id', '!=', Auth::id())
            ->get();

        return view('nurse.all_appointments')->with(['allAppointments' => $allAppointments])->with(['show' => $show]);
    }

    function allMissed()
    {

        $all = DB::table('users')
            ->join('booking', 'users.id', '=', 'booking.user_id')
            ->join('booking_has_vaccination_center', 'booking.id', '=', 'booking_has_vaccination_center.booking_id')
            ->join('vaccination_center', 'booking_has_vaccination_center.vaccination_center_id', '=', 'vaccination_center.id')
            ->join('vaccination', 'booking.vac_id', '=', 'vaccination.id')
            ->select('users.name as name', 'users.surname', 'booking.*', 'vaccination_center.name as vac_center_name', 'vaccination.name as vac_name')
            ->where('isMissed', '=', '1')
            ->get();

        return view('admin.missed')->with(['all' => $all]);
    }

    function allCancelled()
    {

        $all = DB::table('users')
            ->join('booking', 'users.id', '=', 'booking.user_id')
            ->join('booking_has_vaccination_center', 'booking.id', '=', 'booking_has_vaccination_center.booking_id')
            ->join('vaccination_center', 'booking_has_vaccination_center.vaccination_center_id', '=', 'vaccination_center.id')
            ->join('vaccination', 'booking.vac_id', '=', 'vaccination.id')
            ->select('users.name as name', 'users.surname', 'booking.*', 'vaccination_center.name as vac_center_name', 'vaccination.name as vac_name')
            ->where('isCancelled', '=', '1')
            ->get();

        return view('admin.cancelled')->with(['all' => $all]);
    }

    function addVaccinationCenter()
    {
        return view('admin.add_vac_center');
    }

    function addVaccine()
    {
        return view('admin.add_vaccine');
    }

    function viewDate()
    {
        $result = DB::table('booking')->select('date_of_shot')
            ->where('user_id', '=', Auth::id())
            ->where('isDone', '=', 0)
            ->where('isMissed', '=', 0)
            ->where('isCancelled', '=', 0)
            ->count();
        if ($result != 0) {
            $result = DB::table('booking')->select('date_of_shot')
                ->where('user_id', '=', Auth::id())
                ->where('isDone', '=', 0)
                ->where('isMissed', '=', 0)
                ->where('isCancelled', '=', 0)
                ->get();
            $date = $result[0]->date_of_shot;
            return view('citizen.date')->with(['date' => $date]);
        } else
            return view('citizen.date')->with(['date' => $result]);
    }

    function certificate() {
        $certificate = DB::table('certificate')
        ->join('users', 'certificate.user_id', '=', 'users.id')
        ->join('vaccination', 'certificate.vac_id', '=', 'vaccination.id')
        ->select('certificate.id as id', 'users.name', 'users.surname', 'users.birthday', 'vaccination.name as vac_name', 'certificate.last_shot_date as date')
        ->where('certificate.user_id', '=', Auth::id())
        ->get();

        return view('citizen.certificate')->with(['info' => $certificate]);
    }

    function withoutAppointments() {

        $all = DB::table('users')
        ->select('name', 'surname', 'birthday')
        ->leftJoin('booking', 'booking.user_id', '=', 'users.id')
        ->where('booking.user_id', '=', null)
        ->orderBy('users.birthday', 'asc')
        ->get();

        return view('admin.citizens_without_appointments')->with(['all' => $all]);
    }

    function addVaccineToVacCenter() {
        $vac_center = DB::table('vaccination_center')->get();
        $vac = DB::table('vaccination')->get();

        return view('admin.add_vaccination_to_vac_center')->with(['vac_center' => $vac_center])->with(['vac' => $vac]);
    }
}
