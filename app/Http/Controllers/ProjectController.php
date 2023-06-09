<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    //

    public function getAllDepartments(Request $request){
        $departments=Department::all();
        return view('index', ['departments'=>$departments]);
    }

    public function showAppointments(Request $request){
        $department_id=$request->input('department_id');
        $appointments=Appointment::where('department_id', $department_id)->get();
        return \view('appointments', ['appointments'=>$appointments]);

    }

    public function bookAppointment(Request $request){
        $appointment_id = $request->input("appointment_id");
        $department_name= $request->input("department_name");
        $appointment_date= $request->input("appointment_date");
        $exists=Booking::where('appointment_id', '=', $appointment_id)->exist();
        if($exists){
            //Dice al usuario si ha sido buscado por otro usuario
            Session::flash('message', 'Appointment was alredy taken');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/');
        }else{
            //Busca 
            $booking = new Booking;
            $booking->appointment_id = $appointment_id;
            $booking->department_name = $department_name;
            $booking->appointment_date = $appointment_date;
            $booking->username= Auth::user()->name;
            $booking->user_id= Auth::user()->id;

            $booking->save();

            //Ha sido buscado
            Session::flash('message', 'Appointment booked succesfully');
            Session::flash('alert-class', 'alert-sucess');
            return redirect('/');
        }
    }
}
