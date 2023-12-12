<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;


class HomeController extends Controller
{
    public function redirect()
    {
        // function for user and admin
        if(Auth::id()){
            //for when user is logged in 
            $doctor = Doctor::all();
                if(Auth::user() ->usertype =="0"){
                    return view('user.home',compact('doctor'));
                }else{
                    // i dont have admin for the moment
                    return view('admin.home');
                }
        }
        else{
            return redirect()->back();
        }

    }

    public function index()
    {
        $doctor = Doctor::all();

    return view('user.home',compact('doctor'));
    }





}
