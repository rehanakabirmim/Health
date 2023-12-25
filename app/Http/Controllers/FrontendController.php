<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class FrontendController extends Controller
{
    public function doctor(){
        $all = Doctor::Latest()->get();
        return view('doctors', compact('all'));
    }
    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
}


