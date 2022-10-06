<?php

namespace App\Http\Controllers;

use App\Models\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function index()
    {
        $files = files::with('user')->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(5);

        return view('profile/AllMyFiles')->with(['files'=>$files]);
    }

    public function showAll(){
        $files = files::with('user')->orderBy('id', 'desc')->paginate(5);
        return view('dashboard/all-files')->with(['files'=>$files]);
    }
 


    public function store(Request $request)
    {
      
        $file = $request->hasFile('dokumenti');
        if ($file) {
        
        $request->validate([
            'titulli' => ['required','max:40','min:4'],
            'pershkrimi' => ['required','max:250','min:10'],
            'dokumenti' => ['required','mimes:pdf,docx','max:2048'],
        ]);
            $newFile = $request->file('dokumenti');
            $file_path = $newFile->store('/public/dokumentet');
            files::create([
                'titulli' => $request['titulli'],
                'pershkrimi' => $request['pershkrimi'],
                'dokumenti' => $file_path,
                'user_id' => Auth::user()->id,
            ]);
        return back()->with('msg','Dokumenti juaj u shtua me sukses!');
        }else{
            return back()->with('error','Plotesoni hapesirate e kerkuara!');
        }
       
    }


    public function show()
    {
        $files = files::with('user')->orderBy('id', 'desc')->paginate(10);

        return view('LibraryDocs/allDocuments')->with(['files'=>$files]);
    }


    public function edit(files $files)
    {
        //
    }

    public function findFile(Request $request){
        $files=files::orderBy('id', 'asc')->where([
            ['titulli', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('titulli', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    return view('LibraryDocs/allDocuments')->with(['files'=>$files]);
    }
    public function update(Request $request, $id)
    {
        $file = $request->hasFile('dokumenti');
        if(Auth::user()->role==="admin"){
            $file = files::findOrFail($id);
            $file->user_id =$file->user_id;
            $file->titulli = $request->titulli;
            $file->pershkrimi = $request->pershkrimi;
            $file->dokumenti= $file->dokumenti;
            $file->save();
            return back();
        }else{
        if ($file) { 
            $request->validate([
            'titulli' => ['required','max:40','min:4'],
            'pershkrimi' => ['required','max:250','min:10'],
            'dokumenti' => ['required','mimes:pdf,docx','max:2048'],
        ]);
            $newFile = $request->file('dokumenti');
            $file_path = $newFile->store('/public/dokumentet');
     
        $file = files::findOrFail($id);
        $file->user_id = Auth::user()->id;
        $file->titulli = $request->titulli;
        $file->pershkrimi = $request->pershkrimi;
        $file->dokumenti=$file_path;
        $file->save();
        return back();
    }else{
        $request->validate([
            'titulli' => ['required','max:40','min:4'],
            'pershkrimi' => ['required','max:250','min:10'],
        ]);
        $file = files::findOrFail($id);
        $file->user_id = Auth::user()->id;
        $file->titulli = $request->titulli;
        $file->pershkrimi = $request->pershkrimi;
        $file->dokumenti=$file->dokumenti;
        $file->save();
        return back();
    }
    }
    }

  
    public function destroy($id)
    {
        $file = files::findOrFail($id);
        Storage::delete($file->dokumenti);
        Storage::delete("storage/app/".$file->dokumenti);
        $file->delete();
        return back()->with('msg','File u fshi me sukses!');
    }
}
