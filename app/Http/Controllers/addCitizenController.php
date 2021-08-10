<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class addCitizenController extends Controller
{
    function addCitizen(Request $request) {
        $add = new User();
        $add->name = $request->get('name');
        $add->surname = $request->get('surname');
        $add->gender = $request->get('gender');
        $add->birthday = $request->get('birthday');
        $add->profession = $request->get('profession');
        $add->email = $request->get('email');
        //should make password hashed 
        $add->password = $request->get('password');
        $add->user_type = 'citizen';
        $add->save();

        return redirect('home');
    }
}
