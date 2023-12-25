<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    public function show_appoint(){
        $all=Appointment::orderBy('id','DESC')->get();
        return view('admin.appoint.all-appoint',compact('all'));
    }


    public function approved($id)
    {
        $data=Appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }



    public function canceled($id)
    {
        $data=Appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }

    public function show_contact(){
        $all=Doctor::orderBy('id','DESC')->get();
        return view('admin.contact.all-contact',compact('all'));
    }


}



