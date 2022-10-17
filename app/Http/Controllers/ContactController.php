<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('ContactUs/contact');
    }

    public function show(){

        $contacts = contact::orderBy('id', 'desc')->paginate(5);
        return view('Dashboard/all-contacts')->with(['contacts'=>$contacts]);
       
    }




    public function store(Request $request)
    {  
        
        $request->validate([
            'numriTel'=>['number', 'max:10'],
            'mesazhi' => ['required','string','max:400']
        ]);
    
        contact::create([
            'emri' => Auth::user()->emri." ".Auth::user()->mbiemri ,
            'email' => Auth::user()->email,
            'numriTel'=>Auth::user()->numriTel,
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
