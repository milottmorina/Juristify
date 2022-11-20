<?php

namespace App\Http\Controllers;

use App\Mail\LibraryActivated;
use App\Mail\LibraryDeactivated;
use App\Models\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\User as UserModel;

class FilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $files = files::with('user')->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('profile/AllMyFiles')->with(['files'=>$files]);
    }

    public function showAll(){
        $files = files::with('user')->orderBy('id', 'desc')->paginate(5);
        $allFiles=$files->count();
        $allAcFiles=$files->where('status',1)->count();
        $allNacFiles=$files->where('status',0)->count();
        return view('dashboard/all-files')->with(['allNacFiles'=>$allNacFiles,'allAcFiles'=>$allAcFiles,'allFiles'=>$allFiles,'files'=>$files]);
    }

    public function cverifiko($id){
        $files = files::findOrFail($id);
        $files->status=0;
        $files->save();
        $email=UserModel::select('email')->where('id',$files->user_id)->get();
        Mail::to($email)->send(new LibraryDeactivated($email));   
        return back()->with('msg',"File has been failed verified!");
    }
    public function verifiko($id){
        $files = files::findOrFail($id);
        $files->status=1;
        $files->save();
        $email=UserModel::select('email')->where('id',$files->user_id)->get();
        Mail::to($email)->send(new LibraryActivated($email));  
        return back()->with('msg',"File has been successfully verified!");
    }
 
    public function store(Request $request)
    {
      
        $file = $request->hasFile('file');
        if ($file && Auth::user()->role===1) {
        
        $request->validate([
            'title' => ['required','max:100','min:4'],
            'description' => ['required','max:1000','min:10'],
            'file' => ['required','mimes:pdf,docx','max:2048'],
        ]);
            $newFile = $request->file('file');
            $file_path = $newFile->store('/public/dokumentet');
            files::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'file' => $file_path,
                'user_id' => Auth::user()->id,
                'status'=>1
            ]);
        return back()->with('msg','Document has been successfully stored!');
        }else{
            $request->validate([
                'title' => ['required','max:100','min:4'],
                'description' => ['required','max:1000','min:10'],
                'file' => ['required','mimes:pdf,docx','max:2048'],
            ]);
                $newFile = $request->file('file');
                $file_path = $newFile->store('/public/dokumentet');
                files::create([
                    'title' => $request['title'],
                    'description' => $request['description'],
                    'file' => $file_path,
                    'user_id' => Auth::user()->id,
                    'status'=>0
                ]);
                return back()->with('msg','Document has been successfully stored, please be patient until we approve the file!');
        }
       
    }

    public function show()
    {
        $files = files::with('user')->where('status',1)->orderBy('id', 'desc')->paginate(10);

        return view('LibraryDocs/allDocuments')->with(['files'=>$files]);
    }

    public function findMyFile(Request $request){
        $files=files::with('user')->orderBy('id','asc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }  
            }]
        ])->where('user_id',Auth::user()->id)->paginate(5);
        return view('profile/AllMyFiles')->with(['files'=>$files]);
    }

    public function findFile(Request $request){
        $files=files::with('user')->orderBy('id', 'asc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }   
    }]])->where('status',1)->paginate(5);
    return view('LibraryDocs/allDocuments')->with(['files'=>$files]);
    }
    public function findFileDashboard(Request $request){
        $files=files::with('user')->orderBy('id', 'asc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    $allFiles=files::count();
    $allAcFiles=files::where('status',1)->count();
    $allNacFiles=files::where('status',0)->count();
    return view('dashboard/all-files')->with(['allNacFiles'=>$allNacFiles,'allAcFiles'=>$allAcFiles,'allFiles'=>$allFiles,'files'=>$files]);
    }
    public function update(Request $request, $id)
    {
        $file = $request->hasFile('file');
        if ($file) { 
            $request->validate([
            'title' => ['required','max:100','min:4'],
            'description' => ['required','max:1000','min:10'],
            'file' => ['required','mimes:pdf,docx','max:2048'],
            ]);
             $file = files::findOrFail($id);
            $newFile = $request->file('file');
            $file_path = $newFile->store('/public/dokumentet');
            $file->title = $request->title;
            $file->user_id=$file->user_id;
            $file->description = $request->description;
            $file->file=$file_path;
            $file->save();
            return back();
        }else{
        $request->validate([
            'title' => ['required','max:100','min:4'],
            'description' => ['required','max:1000','min:10'],
        ]);
        $file = files::findOrFail($id);
        $file->file=$file->file;
        $file->user_id=$file->user_id;
        $file->title = $request->title;
        $file->description = $request->description;
        $file->save();
        return back();
        }
        }

  
    public function destroy($id)
    {
        $file = files::findOrFail($id);
        Storage::delete($file->file);
        Storage::delete("storage/app/".$file->file);
        $file->delete();
        return back()->with('msg','File deleted successfully!');
    }
}
