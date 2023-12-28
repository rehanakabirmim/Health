<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorApply;
class FrontendController extends Controller
{
    public function doctor(){
        $all = Doctor::Latest()->get();
        return view('doctors', compact('all'));
    }
    public function about(){
        $all = Doctor::Latest()->get();
        return view('about', compact('all'));
    }

    public function contact(){
        return view('contact');
    }

    public function apply(){
        return view('doctor_apply');
    }

    
}


