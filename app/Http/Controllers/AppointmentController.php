<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use Notification;
use App\Notifications\SendEmailNotification;

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

    public function emailView($id)
    {
        $data=Appointment::find($id);
        return view('admin.appoint.email-view',compact('data'));
    }


    public function sendemail(Request $request,$id)
    {
     
        $data=Appointment::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart


        ];

        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message','Email Send is successful');

    }

    
}



