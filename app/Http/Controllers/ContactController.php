<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('ContactUs/contact');
    }

    public function show(){
       if(Auth::user() && Auth::user()->role==='admin'){
        $contacts = contact::orderBy('id', 'asc')->paginate(5);
        return view('Dashboard/all-contacts')->with(['contacts'=>$contacts]);
        }else{
            return redirect('/home');
        }
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

    public function destroy($id)
    {
        $file = contact::findOrFail($id);
        $file->delete();
        return back()->with('msg','Kontakti u fshi me sukses!');
    }

  
}
