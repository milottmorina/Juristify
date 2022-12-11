<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use Illuminate\Support\Str;


class NewsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $news = news::with('user')->orderBy('id', 'desc')->take(50)->paginate(9);
        return view('News/news')->with(['news'=>$news]);
    }

    public function showAll()
    {
        $news = news::with('user')->orderBy('id', 'desc')->paginate(9);
        $nw=news::count();
        return view('Dashboard/all-news')->with(['news'=>$news,'nw'=>$nw]);
    }
    public function findNews(Request $request){
        $news=news::orderBy('id', 'desc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    return view('News/news')->with(['news'=>$news]);
    }


    public function findNewsDashboard(Request $request){
        $nw=news::count();
        $news=news::orderBy('id', 'desc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    return view('Dashboard/all-news')->with(['news'=>$news,'nw'=>$nw]);
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
                'title' => ['required','max:100','min:4'],
                'description' => ['required','max:7500','min:10'],
                'img' => ['required','mimes:jpeg,png','max:4096'],
                'category' => ['required','max:50'],

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
            news::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'img' => $result['ObjectURL'],
                'category'=>$request['category'],
                'user_id' => Auth::user()->id,
            ]);
       return back()->with('msg','News successfully stored!');
        }else{
            return back()->with('error','Please fill the required fields!');
 
        }
        
    }

  
    public function show($id)
    {
        $news = news::with('user')->findOrFail($id);
        return view('News/single')->with(['news'=>$news]);
    }
  
    public function update(Request $request, $id)
    {
        $file = $request->hasFile('img');
        if ($file) {
            $request->validate([
                'title' => ['required','max:100','min:4'],
                'description' => ['required','max:7500','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'category' => ['required','max:20'],

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
        $news = News::findOrFail($id);
        $news->user_id = Auth::user()->id;
        $news->img = $result['ObjectURL'];
        $news->title = $request->title;
        $news->description = $request->description;
        $news->category = $request->category;
        $news->save();
        return back();
        }else{
            $request->validate([
                'title' => ['required','max:100','min:4'],
                'description' => ['required','max:7500','min:10'],
                'category' => ['required','max:20'],
            ]);
            $news = News::findOrFail($id);
            $news->user_id = Auth::user()->id;
            $news->img = $news->img;
            $news->title = $request->title;
            $news->description = $request->description;
            $news->category = $request->category;
            $news->save();
            return back();
        }
    }

   
    public function destroy($id)
    {
        $news = news::findOrFail($id);
        $news->delete();
        return back();
    }
}
