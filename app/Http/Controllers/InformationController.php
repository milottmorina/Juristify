<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use Illuminate\Support\Str;

class InformationController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index()
    {
        $date = today()->format('Y-m-d');
        $infos = information::with(['user'=>function($query){$query->select(['name','surname']);}])->select(['user_id','title','company_name','category','location','expiration_date','free_places','description','img'])->where('expiration_date','>',$date)->orderBy('id', 'desc')->paginate(12);
        return view('Information/information')->with(['infos'=>$infos]);
    }

    public function allInfos()
    {
        $infos = information::with('user')->orderBy('id', 'desc')->paginate(6);
        return view('Dashboard/all-informations')->with(['infos'=>$infos]);
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
                'title' => ['required','max:100','min:5'],
                'description' => ['required','max:5000','min:10'],
                'img' => ['required','mimes:jpeg,png','max:4096'],
                'free_places' => ['required'],
                'expiration_date'=>['required'],
                'location' => ['required','max:100','min:4'],
                'category' => ['required','max:50','min:2'],
                'company_name' => ['required','max:80','min:3']
            ]);
            $newImg = $request->file('img');
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
            information::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'img' => $result['ObjectURL'],
                'free_places'=>$request['free_places'],
                'expiration_date'=>$request['expiration_date'],
                'location'=>$request['location'],
                'category'=>$request['category'],
                'company_name'=>$request['company_name'],
                'user_id' => Auth::user()->id,
            ]);
       
        }
        return back()->with('msg','Proclamation stored successfully!');
    }

    public function findInfo(Request $request){
        $date = today()->format('Y-m-d');
        $infos=information::with(['user'=>function($query){$query->select(['name','surname']);}])->orderBy('id', 'desc')->where([
            ['title', '!=' , Null],
            ['location', '!=' , Null],
            ['category', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%')
                    ->orWhere('location', 'LIKE', '%'.$term.'%')
                    ->orWhere('category', 'LIKE', '%'.$term.'%');
                }
    }]])->where('expiration_date','>',$date)->paginate(12);
    return view('Information/information')->with(['infos'=>$infos]);
    }

    public function findInfoDashboard(Request $request){
        $infos=information::with(['user'=>function($query){$query->select(['name','surname']);}])->orderBy('id', 'desc')->where([
            ['title', '!=' , Null],
            ['location', '!=' , Null],
            ['category', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%')
                    ->orWhere('location', 'LIKE', '%'.$term.'%')
                    ->orWhere('category', 'LIKE', '%'.$term.'%');
                }  
    }]])->paginate(6);
    return view('Dashboard/all-informations')->with(['infos'=>$infos]);
    }

    public function update(Request $request, $id)
    {
        $file = $request->hasFile('img');
        if ($file) {
            $request->validate([
                'title' => ['required','max:100','min:5'],
                'description' => ['required','max:5000','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'free_places' => ['required'],
                'expiration_date'=>['required'],
                'location' => ['required','max:100','min:4'],
                'category' => ['required','max:50','min:2'],
                'company_name' => ['required','max:80','min:3'] 
            ]);
        $newImg = $request->file('img');
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
        $file = information::findOrFail($id);
        $file->user_id = Auth::user()->id;
        $file->img = $result['ObjectURL'];
        $file->title = $request->title;
        $file->description = $request->description;
        $file->category = $request->category;
        $file->location = $request->location;
        $file->expiration_date = $request->expiration_date;
        $file->free_places = $request->free_places;
        $file->company_name = $request->company_name;
        $file->save();
        return back();
        }else{
            $request->validate([
                'title' => ['required','max:100','min:5'],
                'description' => ['required','max:5000','min:10'],
                'free_places' => ['required'],
                'expiration_date'=>['required'],
                'location' => ['required','max:100','min:4'],
                'category' => ['required','max:50','min:2'],
                'company_name' => ['required','max:80','min:3'] 
            ]);
        $file = information::findOrFail($id);
        $file->user_id = Auth::user()->id;
        $file->img = $file->img;
        $file->title = $request->title;
        $file->description = $request->description;
        $file->category = $request->category;
        $file->location = $request->location;
        $file->expiration_date = $request->expiration_date;
        $file->free_places = $request->free_places;
        $file->company_name = $request->company_name;
        $file->save();
        return back();
        }
    }

    public function destroy($id)
    {
        $infos = information::findOrFail($id);
        $infos->delete();
        return back();
    }
}
