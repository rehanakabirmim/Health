<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\DoctorApply;
use Session;
use Image;

use Carbon\carbon;
class HomeController extends Controller
{
    public function redirect(){

        return view('welcome');

    }
    public function index(){
        // $all = data::all();
        return view('welcome');

    }

    public function appointment(Request $request){

        // $this->validate($request,[
        //     'name'=>'required|max:50',
        //     'email'=>'required|email|max:50|unique:doctors',
        //     'phone'=>'required',
        //     'specialty_id'=>'required|max:15',
        //     'doctor'=>'required',

        //   ],[
        //     'name.required'=>'Please enter your name.',
        //     'email.required'=>'Please enter email address.',
        //     'phone.required'=>'Please enter phone.',
        //     'specialty_id'=>'Please Select Speciality',
        //     'doctor'=>'Please Select Doctor',

        //   ]);


            $insert=Appointment::insert([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'doctor'=>$request['doctor'],
            'date'=>$request['date'],
            'message'=>$request['message'],
            'status'=>'In progress',
            'created_at'=>Carbon::now()->toDateTimeString(),

            // if(Auth::user()->id){
            // 'user_id'=>[Auth::user()->id],

            // }

            'user_id' => Auth::user()->id,

            ]);




            return redirect()->back()->with('message', 'Appointment Request Successful. We will contact you soon.');



    }


    public function myappointment(){
        if(Auth::user()->id){
            $userid=Auth::user()->id;
            $app=Appointment::where('user_id', $userid)->get();
            return view('my-appointment',compact('app'));
        }
        else{
            return redirect()->back();
        }


    }


    public function cancel_appoint($id){
        // return $id;
       $data=Appointment::find($id);
       $data->delete();
       return redirect()->back();
    }






    public function contact(Request $request){

        $insert=Contact::insert([
          'name'=>$request['name'],

          'email'=>$request['email'],
          'subject'=>$request['subject'],
            'message'=>$request['message'],

          'created_at'=>Carbon::now()->toDateTimeString(),


        ]);
        return redirect()->back()->with('message','Contact Message Send is successful');
    }


//apply doctor





public function apply(Request $request){




    $insert=DoctorApply::insertGetId([
      'name'=>$request['name'],
      'phone'=>$request['phone'],
      'email'=>$request['email'],
      'specialty'=>$request['specialty'],
    'about'=>$request['about'],



      'created_at'=>Carbon::now()->toDateTimeString(),


    ]);

    if($request->hasFile('photo')){
        $image=$request->file('photo');
        $imageName='user_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(250,250)->save('uploads/users/'.$imageName);

        DoctorApply::where('id',$insert)->update([
            'photo'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
         return back();
    }

    }
//search

    public function search(Request $request){
        $doctors=Doctor::orderBy('id','desc')->where('name','LIKE','%'.$request->doctor.'%');
        if($request->specialty_id != "ALL")$doctors->where('id',$request->specialty_id);
        $doctors= $doctors->get();
        $all=Doctor::orderBy('id','DESC')->get();
        return view('all-doctor-search',compact('all'));


    }


    // show doctorinf

    public function drsearch(){
        $all=Doctor::orderBy('id','DESC')->get();
            return view('all-doctor-search',compact('all'));
        }


}


