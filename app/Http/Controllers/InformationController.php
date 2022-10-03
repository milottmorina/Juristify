<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{

 
    public function index()
    {
        $infos = information::with('user')->orderBy('id', 'asc')->paginate(5);
        return view('Information/information')->with(['infos'=>$infos]);
    }

 
    public function create()
    {
        return view('Profile/StoreInformation');
    }

  
 
    public function store(Request $request)
    {
        $file = $request->hasFile('img');
        if ($file) {
  
            $request->validate([
                'titulli' => ['required','max:40','min:5'],
                'pershkrimi' => ['required','max:450','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'vende' => ['required'],
                'dataSkadimit'=>['required'],
                'lokacioni' => ['required','max:40','min:4'],
                'kategoria' => ['required','max:20','min:2'],
                'emriKompanis' => ['required','max:40','min:3']
            ]);
            $newFile = $request->file('img');
            $file_path = $newFile->store('/public/info');
            information::create([
                'titulli' => $request['titulli'],
                'pershkrimi' => $request['pershkrimi'],
                'img' => $file_path,
                'vende'=>$request['vende'],
                'dataSkadimit'=>$request['dataSkadimit'],
                'lokacioni'=>$request['lokacioni'],
                'kategoria'=>$request['kategoria'],
                'emriKompanis'=>$request['emriKompanis'],
                'user_id' => Auth::user()->id,
            ]);
       
        }
        return back()->with('msg','Shpallja juaj u shtua me sukses!');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
