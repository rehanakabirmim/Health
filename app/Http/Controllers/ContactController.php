<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show_contact(){
        $all=Contact::orderBy('id','DESC')->get();
        return view('admin.contact.all-contact',compact('all'));
    }
}
