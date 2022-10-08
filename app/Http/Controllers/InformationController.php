<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index()
    {
        $infos = information::with('user')->orderBy('id', 'desc')->paginate(5);
        $citys = information::select('lokacioni')->get();
        $categories = information::select('kategoria')->get();

        return view('Information/information')->with(['infos'=>$infos,'citys'=>$citys,'categories'=>$categories]);
    }

    public function allInfos()
    {
        $infos = information::with('user')->orderBy('id', 'desc')->paginate(5);
        $citys = information::select('lokacioni')->get();
        $categories = information::select('kategoria')->get();
        return view('dashboard/all-informations')->with(['infos'=>$infos,'citys'=>$citys,'categories'=>$categories]);
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

    public function findInfo(Request $request){
        $infos=information::orderBy('id', 'desc')->where([
            ['titulli', '!=' , Null],
            ['lokacioni', '!=' , Null],
            ['kategoria', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('titulli', 'LIKE', '%'.$term.'%');
                }
                if(($location=$request->loc)){
                    $query->where('lokacioni', 'LIKE', '%'.$location.'%');
                }  
                if(($kategoria=$request->cat)){
                    $query->where('kategoria', 'LIKE', '%'.$kategoria.'%');
                }     
    }]])->paginate(5);
    $citys = information::select('lokacioni')->get();
    $categories = information::select('kategoria')->get();
    return view('Information/information')->with(['infos'=>$infos,'citys'=>$citys,'categories'=>$categories]);
    }

    public function findInfoDashboard(Request $request){
        $infos=information::orderBy('id', 'desc')->where([
            ['titulli', '!=' , Null],
            ['lokacioni', '!=' , Null],
            ['kategoria', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('titulli', 'LIKE', '%'.$term.'%');
                }
                if(($location=$request->loc)){
                    $query->where('lokacioni', 'LIKE', '%'.$location.'%');
                }  
                if(($kategoria=$request->cat)){
                    $query->where('kategoria', 'LIKE', '%'.$kategoria.'%');
                }     
    }]])->paginate(5);
    $citys = information::select('lokacioni')->get();
    $categories = information::select('kategoria')->get();
    return view('dashboard/all-informations')->with(['infos'=>$infos,'citys'=>$citys,'categories'=>$categories]);
    }


    public function update(Request $request, $id)
    {
        $file = $request->hasFile('img');
        if ($file) {
            $newFile = $request->file('img');
            $file_path = $newFile->store('/public/info');
        $file = information::findOrFail($id);
        $file->user_id = Auth::user()->id;
        $file->img = $file_path;
        $file->titulli = $request->titulli;
        $file->pershkrimi = $request->pershkrimi;
        $file->kategoria = $request->kategoria;
        $file->lokacioni = $request->lokacioni;
        $file->dataSkadimit = $request->dataSkadimit;
        $file->vende = $request->vende;
        $file->emriKompanis = $request->emriKompanis;
        $file->save();
        return back();
        }else{
            $file = information::findOrFail($id);
            $file->user_id = Auth::user()->id;
            $file->img = $file->img;
            $file->titulli = $request->titulli;
            $file->pershkrimi = $request->pershkrimi;
            $file->kategoria = $request->kategoria;
            $file->lokacioni = $request->lokacioni;
            $file->dataSkadimit = $request->dataSkadimit;
            $file->vende = $request->vende;
            $file->emriKompanis = $request->emriKompanis;
            $file->save();
            return back();
        }
    }

 
    public function destroy($id)
    {
        $infos = information::findOrFail($id);
        Storage::delete($infos->img);
        Storage::delete("storage/app/".$infos->img);
        $infos->delete();
        return back();
    }
}
