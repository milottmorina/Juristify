<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    
    public function index()
    {
        $news = news::with('user')->orderBy('id', 'desc')->paginate(9);
        return view('News/news')->with(['news'=>$news]);
    }

    public function showAll()
    {
        $news = news::with('user')->orderBy('id', 'desc')->paginate(9);
        return view('dashboard/all-news')->with(['news'=>$news]);
    }
    public function findNews(Request $request){
        $news=news::orderBy('id', 'asc')->where([
            ['titulli', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('titulli', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    return view('News/news')->with(['news'=>$news]);
    }

    public function create()
    {
        return view('Profile/StoreNews');
    }

 
    public function store(Request $request)
    {
        $file = $request->hasFile('img');
        if ($file) {
            $request->validate([
                'titulli' => ['required','max:40','min:4'],
                'pershkrimi' => ['required','max:250','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'kategoria' => ['required','max:20'],

            ]);
            $newFile = $request->file('img');
            $file_path = $newFile->store('/public/news');
            news::create([
                'titulli' => $request['titulli'],
                'pershkrimi' => $request['pershkrimi'],
                'img' => $file_path,
                'kategoria'=>$request['kategoria'],
                'user_id' => Auth::user()->id,
            ]);
       return back()->with('msg','Lajmi juaj u shtua me sukses!');
        }else{
            return back()->with('error','Ploteso hapesirat e kerkuara!');
 
        }
        
    }

  
    public function show($id)
    {
        $news = news::with('user')->findOrFail($id);
        return view('News/Single')->with(['news'=>$news]);
    }
  

   
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $file = $request->hasFile('img');
        if ($file) {
            $newFile = $request->file('img');
            $file_path = $newFile->store('/public/news');
        $news = News::findOrFail($id);
        $news->user_id = Auth::user()->id;
        $news->img = $file_path;
        $news->titulli = $request->titulli;
        $news->pershkrimi = $request->pershkrimi;
        $news->kategoria = $request->kategoria;
        $news->save();
        return back();
        }else{
            $news = News::findOrFail($id);
            $news->user_id = Auth::user()->id;
            $news->img = $news->img;
            $news->titulli = $request->titulli;
            $news->pershkrimi = $request->pershkrimi;
            $news->kategoria = $request->kategoria;
            $news->save();
            return back();
        }
    }

   
    public function destroy($id)
    {
        $news = news::findOrFail($id);
        Storage::delete($news->img);
        Storage::delete("storage/app/".$news->img);
        $news->delete();
        return back();
    }
}
