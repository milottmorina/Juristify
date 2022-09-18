<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('ContactUs/contact');
    }

    public function show(){
        $contacts = contact::orderBy('id', 'asc')->paginate(5);
        return view('ContactUs/allContacts')->with(['contacts'=>$contacts]);
    }




    public function store(Request $request)
    {  
        
        $request->validate([
            'emri' => ['required', 'regex:/^[a-z A-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:40'],
            'numriTel'=>['required','string', 'max:10'],
            'mesazhi' => ['required','string','max:400']
        ]);
        contact::create([
            'emri' => $request['emri'],
            'email' => $request['email'],
            'numriTel'=>$request['numriTel'],
            'mesazhi'=>$request['mesazhi'],
        ]);
        return back()->with('msg','Mesazhi juaj u dergua me sukses!');
    }

  
}
