<?php

namespace App\Http\Controllers;

use App\Models\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{

    public function index()
    {
        $files = files::with('user')->where('user_id',Auth::user()->id)->orderBy('id', 'asc')->paginate(5);

        return view('profile/AllMyFiles')->with(['files'=>$files]);
    }


 


    public function store(Request $request)
    {
        $file = $request->hasFile('dokumenti');
        if ($file) {

            $newFile = $request->file('dokumenti');
            $file_path = $newFile->store('/public/dokumentet');
            files::create([
                'titulli' => $request['titulli'],
                'pershkrimi' => $request['pershkrimi'],
                'dokumenti' => $file_path,
                'user_id' => Auth::user()->id,
            ]);
       
        }
        return back()->with('msg','Dokumenti juaj u shtua me sukses!');
    }


    public function show()
    {
        $files = files::with('user')->orderBy('id', 'asc')->paginate(10);

        return view('LibraryDocs/allDocuments')->with(['files'=>$files]);
    }


    public function edit(files $files)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        $file = files::findOrFail($id);
        $file->delete();
        return back()->with('msg','File u fshi me sukses!');
    }
}
