<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Doctor;
use App\Models\User;
use App\Models\DoctorApply;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class DoctorController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $all=Doctor::orderBy('id','DESC')->get();
        return view('admin.doctor.all-doctor',compact('all'));
      }

      public function add(){
        return view('admin.doctor.add-doctor');
      }


      public function edit($id){
        $data=Doctor::where('id',$id)->firstOrFail();
        return view('admin.doctor.edit-doctor',compact('data'));
      }

      public function view($id){
        $data=Doctor::where('id',$id)->firstOrFail();
        return view('admin.doctor.view-doctor',compact('data'));
      }


      public function insert(Request $request){

        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|max:50|unique:doctors',
            'phone'=>'required',
            'specialty_id'=>'required|max:15',

          ],[
            'name.required'=>'Please enter your name.',
            'email.required'=>'Please enter email address.',
            'phone.required'=>'Please enter phone.',
            'specialty_id'=>'Please Select Speciality',

          ]);



        $insert=Doctor::insertGetId([
          'name'=>$request['name'],
          'phone'=>$request['phone'],
          'email'=>$request['email'],
          'specialty_id'=>$request['specialty_id'],
          'designation'=>$request['designation'],
        'room_no'=>$request['room_no'],



          'created_at'=>Carbon::now()->toDateTimeString(),


        ]);

        if($request->hasFile('photo')){
          $image=$request->file('photo');
          $imageName='user_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(250,250)->save('uploads/users/'.$imageName);

          Doctor::where('id',$insert)->update([
              'photo'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
        }

        return redirect()->back()->with('message','Doctor Added  successfully');
      }


      //update

      public function update(Request $request){
        $id=$request['id'];

        $this->validate($request,[
          'name'=>'required|max:50',
          'email'=>'required|email|max:50|unique:users,email,'.$id.',id',
          'phone'=>'required',
          'room_no'=>'required',

        ],[
          'name.required'=>'Please enter your name.',
          'email.required'=>'Please enter email address.',
          'phone.required'=>'Please enter your phone.',
          'room_no'=>'Please enter your room_no.',

        ]);



        $update=Doctor::where('id',$id)->update([
          'name'=>$request['name'],
          'phone'=>$request['phone'],
          'email'=>$request['email'],

          'room_no'=>$request['room_no'],
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('photo')){
          $image=$request->file('photo');
          $imageName='user_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(250,250)->save('uploads/users/'.$imageName);

          Doctor::where('id',$id)->update([
              'photo'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
        }

        return redirect()->back()->with('message','Doctor information updated  successfully');
      }


      public function delete($id){
        $delete=Doctor::where('id',$id)->delete([]);
        $all=Doctor::orderBy('id','DESC')->get();
        return view('admin.doctor.all-doctor',compact('all'));



      }

      public function show_apply(){
        $all=DoctorApply::orderBy('id','DESC')->get();
        return view('admin.doctor.all-show-apply',compact('all'));
    }

    public function apply_view($id){

      $data=DoctorApply::where('id',$id)->firstOrFail();

      return view('admin.doctor.apply-view-doctor',compact('data'));
    }

    public function findDoctors($specialty_id){

      $all = Doctor::where('specialty_id', $specialty_id)->latest()->get();

      // return response()->json(array(
      //     'doctors' => $all,
      // ));
      return json_decode($all);
  }

}


