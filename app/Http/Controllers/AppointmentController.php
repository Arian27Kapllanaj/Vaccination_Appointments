<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\certificate;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function confirmed($id)
    {
        DB::table('booking')
            ->where('id', $id)
            ->update(['isDone' => true]);

        $user= Booking::find($id);

        $certicate = DB::table('booking')->select('id')->where('user_id', '=', $user->user_id)->where('isDone', '=', '1')->count();
        if ($certicate > 1) {
            $getCertificate = new certificate();
            $getCertificate->user_id = $user->user_id;
            $getCertificate->vac_id = $user->vac_id;
            $getCertificate->last_shot_date = $user->date_of_shot;

            $getCertificate->save();
        }

        return redirect('/nurse/all/citizens/appointments');
    }

    public function cancelled($id)
    {
        DB::table('booking')
            ->where('id', $id)
            ->update(['isCancelled' => true]);

        return redirect('/nurse/all/citizens/appointments');
    }

    public function missed($id)
    {
        DB::table('booking')
            ->where('id', $id)
            ->update(['isMissed' => true]);

        return redirect('/nurse/all/citizens/appointments');
    }
}
