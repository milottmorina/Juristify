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
