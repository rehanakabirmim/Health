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
        if(Auth::user()->id){
            if(Auth::user()->usertype=='0'){
                return view('welcome');
            }
            else{
                return view('admin.dashboard');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function index(){
        // $all = data::all();
        return view('welcome');

    }

    public function appointment(Request $request){

            // $this->validate($request,[
            //     'name'=>'required|max:50',
            //     'email'=>'required|email|max:50|unique:appointments',
            //     'phone'=>'required|min:15|unique:appointments',
                
            //   ],[
            //     'name.required'=>'Please enter your name.',
            //     'email.required'=>'Please enter email address.',
            //     'phone.required'=>'Please enter phone.',
               
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


            return redirect()->back()->with('message','Appointment Request Successful . We will contact with you soon');
           
            
      

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
        return redirect()->back();
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
}    


