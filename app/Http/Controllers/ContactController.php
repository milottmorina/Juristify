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
        $c=contact::count();
        return view('Dashboard/all-contacts')->with(['c'=>$c,'contacts'=>$contacts]);
       
    }

    public function store(Request $request)
    {  
        
        $request->validate([
            'phoneNo'=>['required','max:20'],
            'msg' => ['required','string','max:700']
        ]);
    
        contact::create([
            'name' => Auth::user()->name." ".Auth::user()->surname ,
            'email' => Auth::user()->email,
            'phoneNo'=>$request['phoneNo'],
            'msg'=>$request['msg'],
        ]);
        return back()->with('msg','Message sent successfully!');
    }

    public function destroy($id)
    {
        $file = contact::findOrFail($id);
        $file->delete();
        return back()->with('msg','Contact deleted successfully!');
    }

  
}
