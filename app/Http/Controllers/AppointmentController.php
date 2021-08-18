<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function confirmed($id)
    {
        DB::table('booking')
            ->where('id', $id)
            ->update(['isDone' => true]);

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
