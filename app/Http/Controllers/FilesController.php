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
use Aws\S3\S3Client;
use Illuminate\Support\Str;

class FilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $files = files::with('user')->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('Profile/AllMyFiles')->with(['files'=>$files]);
    }

    public function showAll(){
        $files = files::with('user')->orderBy('id', 'desc')->paginate(5);
        $allFiles=files::count();
        $allAcFiles=files::where('status',1)->count();
        $allNacFiles=files::where('status',0)->count();
        return view('Dashboard/all-files')->with(['allNacFiles'=>$allNacFiles,'allAcFiles'=>$allAcFiles,'allFiles'=>$allFiles,'files'=>$files]);
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
        if ($file && Auth::user()->role==1) {
        
        $request->validate([
            'title' => ['required','max:100','min:4'],
            'description' => ['required','max:1000','min:10'],
            'file' => ['required','mimes:pdf,docx','max:2048'],
        ]);
            $newImg = $request->file('file');
            $fileName=Str::random(30).$newImg->getClientOriginalName();
            $s3 = new S3Client([
                'region'  => 'us-east-1',
                'version' => 'latest',
                'credentials' => [
                    'key'    => "AKIAYI7C65632AHOGP4K",
                    'secret' => "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",
                ]
            ]);	
            $result = $s3->putObject([
                'Bucket' => 'juristify',
                'Key'    => $fileName,
                'SourceFile' => $newImg,	
                'ACL' => 'public-read'	
            ]);
            files::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'file' => $result['ObjectURL'],
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
            $newImg = $request->file('file');
            $fileName=Str::random(30).$newImg->getClientOriginalName();
            $s3 = new S3Client([
                'region'  => 'us-east-1',
                'version' => 'latest',
                'credentials' => [
                    'key'    => "AKIAYI7C65632AHOGP4K",
                    'secret' => "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",
                ]
            ]);	
            $result = $s3->putObject([
                'Bucket' => 'juristify',
                'Key'    => $fileName,
                'SourceFile' => $newImg,	
                'ACL' => 'public-read'	
            ]);
                files::create([
                    'title' => $request['title'],
                    'description' => $request['description'],
                    'file' => $result['ObjectURL'],
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
                    $query->where('title', 'ILIKE', '%'.$term.'%');
                }  
            }]
        ])->where('user_id',Auth::user()->id)->paginate(5);
        return view('Profile/AllMyFiles')->with(['files'=>$files]);
    }

    public function findFile(Request $request){
        $files=files::with('user')->orderBy('id', 'asc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'ILIKE', '%'.$term.'%');
                }   
    }]])->where('status',1)->paginate(5);
    return view('LibraryDocs/allDocuments')->with(['files'=>$files]);
    }
    public function findFileDashboard(Request $request){
        $files=files::with('user')->orderBy('id', 'asc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'ILIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    $allFiles=files::count();
    $allAcFiles=files::where('status',1)->count();
    $allNacFiles=files::where('status',0)->count();
    return view('Dashboard/all-files')->with(['allNacFiles'=>$allNacFiles,'allAcFiles'=>$allAcFiles,'allFiles'=>$allFiles,'files'=>$files]);
    }
    public function update(Request $request, $id)
    {
        $doc = $request->hasFile('file');
        if ($doc) { 
            $request->validate([
            'title' => ['required','max:100','min:4'],
            'description' => ['required','max:1000','min:10'],
            'file' => ['required','mimes:pdf,docx','max:4096'],
            ]);
            $newImg = $request->file('file');
            $fileName=Str::random(30).$newImg->getClientOriginalName();
            $s3 = new S3Client([
                'region'  => 'us-east-1',
                'version' => 'latest',
                'credentials' => [
                    'key'    => "AKIAYI7C65632AHOGP4K",
                    'secret' => "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",
                ]
            ]);	
            $result = $s3->putObject([
                'Bucket' => 'juristify',
                'Key'    => $fileName,
                'SourceFile' => $newImg,	
                'ACL' => 'public-read'	
            ]);
            $file = files::findOrFail($id);
            $file->title = $request->title;
            $file->user_id=$file->user_id;
            $file->description = $request->description;
            $file->file=$result['ObjectURL'];
            $file->save();
            return back()->with('msg','File successfully updated!');
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
        return back()->with('msg','File successfully updated!');
        }
        }

  
    public function destroy($id)
    {
        $file = files::findOrFail($id);
        $file->delete();
        return back()->with('msg','File deleted successfully!');
    }
}
