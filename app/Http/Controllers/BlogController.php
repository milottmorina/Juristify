<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User as UserModel;
use App\Mail\BlogActivate;
use App\Mail\BlogDeactivated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Aws\S3\S3Client;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $blogs = blog::with('user')->active(1)->orderBy('id', 'desc')->paginate(9);
        return view('Blog/blog')->with(['blogs'=>$blogs]);
    }

    public function myBlogs(){
        $blogs = blog::with('user')->myblogs()->orderBy('id', 'desc')->paginate(9);
        return view('Profile/AllMyBlogs')->with(['blogs'=>$blogs]);
    }
    
    public function create()
    {
        return view('Profile/StoreBlog');
    }

    public function showAll(){
        $blogs = blog::with('user')->orderBy('id', 'desc')->paginate(9);
        $allBlogs=blog::count();
        $NonAcBlogs=blog::where('active',0)->count();
        $AcBlogs=blog::where('active',1)->count();
        return view('Dashboard/all-blogs')->with(['AcBlogs'=>$AcBlogs,'NonAcBlogs'=>$NonAcBlogs,'blogs'=>$blogs,'allBlogs'=>$allBlogs]);
    }
    public function cverifiko($id){
        $blog = blog::findOrFail($id);
        $blog->active=0;
        $blog->save();
        $email=UserModel::select('email')->where('id',$blog->user_id)->get();
        Mail::to($email)->send(new BlogDeactivated($email));    
        return back()->with('msg',"Blog is unverified successfully!");
    }
    public function verifiko($id){
        $blog = blog::findOrFail($id);
        $blog->active=1;
        $blog->save();
        $email=UserModel::select('email')->where('id',$blog->user_id)->get();
        Mail::to($email)->send(new BlogActivate($email));    
        return back()->with('msg',"Blog is verified successfully!");
    }
   
    public function store(Request $request)
    {
        $blog = $request->hasFile('img');
        if ($blog && Auth::user()->role==0) {
            $request->validate([
                'title' => ['required','max:100','min:4'],
                'description' => ['required','max:6000','min:10'],
                'img' => ['required','mimes:jpeg,png','max:4096'],
                'category' => ['required','max:50'],
            ]);
            $s3 = new S3Client([
                'region'  => 'us-east-1',
                'version' => 'latest',
                'credentials' => [
                    'key'    => "AKIAYI7C65632AHOGP4K",
                    'secret' => "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",
                ]
            ]);	 
            $newImg = $request->file('img');
            $fileName=Str::random(30).$newImg->getClientOriginalName();
            $result = $s3->putObject([
                'Bucket' => 'juristify',
                'Key'    => $fileName,
                'SourceFile' => $newImg,	
                'ACL' => 'public-read'	
            ]);
            // $blog_path = $newblog->store('/public/blog');
            blog::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'img' => $result['ObjectURL'],
                'category'=>$request['category'],
                'user_id' => Auth::user()->id,
                'active'=>0
            ]);
       return back()->with('msg','Blog is stored succesfully, please be patient until we verify!');
        }else{
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
            $request->validate([
                'title' => ['required','max:100','min:4'],
                'description' => ['required','max:6000','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'category' => ['required','max:50'],

            ]);
            blog::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'img' => $result['ObjectURL'],
                'category'=>$request['category'],
                'user_id' => Auth::user()->id,
                'active'=>1
            ]);
            return back()->with('msg','Blog is stored successfully!');
        }
        
    }

   
    public function show($id)
    {
        $blogs = blog::with('user')->findOrFail($id);
        $comments = Comment::with('user','blog')->where('blog_id',$id)->orderBy('id', 'desc')->paginate(10);
        if($blogs->active!==1){
            return redirect('/blog');
        }
        return view('Blog/single')->with(['blogs'=>$blogs,'comments'=>$comments]);
    }

    public function findBlog(Request $request){
        $blogs=blog::active(1)->with('user')->orderBy('id', 'desc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(9);
    return view('Blog/blog')->with(['blogs'=>$blogs]);
    }
    
    public function findMyBlog(Request $request){
        $blogs=blog::with('user')->orderBy('id','asc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }  
            }]
        ])->where('user_id',Auth::user()->id)->paginate(9);
        return view('Profile/AllMyBlogs')->with(['blogs'=>$blogs]);
    }

    public function findBlogDashboard(Request $request){
        $blogs=blog::with('user')->orderBy('id', 'desc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    $allBlogs=blog::count();
    $NonAcBlogs=blog::where('active',0)->count();
    $AcBlogs=blog::where('active',1)->count();
    return view('Dashboard/all-blogs')->with(['AcBlogs'=>$AcBlogs,'NonAcBlogs'=>$NonAcBlogs,'allBlogs'=>$allBlogs,'blogs'=>$blogs]);
    }
  
     public function update(Request $request, $id)
    {
        $blog = $request->hasFile('img');
        if ($blog) {
        $blog = blog::findOrFail($id);
        $request->validate([
        'title' => ['required','max:100','min:4'],
        'description' => ['required','max:6000','min:10'],
        'img' => ['required','mimes:jpeg,png','max:2048'],
        'category'=>['required','min:3','max:50']
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
        $blog->user_id = $blog->user_id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->img=$result['ObjectURL'];
        $blog->category=$request->category;
        $blog->active=$blog->active;
        $blog->save();
        return back();
    }else{
        $request->validate([
        'title' => ['required','max:100','min:4'],
        'description' => ['required','max:6000','min:10'],
        'category'=>['required','min:3','max:50']
        ]);
        $blog = blog::findOrFail($id);
        $blog->user_id = $blog->user_id;
        $blog->title = $request->title;
        $blog->category=$request->category;
        $blog->description = $request->description;
        $blog->img=$blog->img;
        $blog->active=$blog->active;
        $blog->save();
        return back();
    }
    }

    public function updateBlogDashboard(Request $request, $id)
    {
        $file = $request->hasFile('img');
        if ($file) {
        $request->validate([
        'title' => ['required','max:100','min:4'],
        'description' => ['required','max:6000','min:10'],
        'img' => ['required','mimes:jpeg,png','max:2048'],
        'category'=>['required','min:3','max:50']
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
        $blog = blog::findOrFail($id);
        $blog->user_id = $blog->user_id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->img=$result['ObjectURL'];
        $blog->category=$request->category;
        $blog->active=$blog->active;
        $blog->save();
        return back()->with('msg','Blog updated successfully!');
    }else{
        $request->validate([
        'title' => ['required','max:100','min:4'],
        'description' => ['required','max:6000','min:10'],
        'category'=>['required','min:3','max:50']
        ]);
        $blog = blog::findOrFail($id);
        $blog->user_id = $blog->user_id;
        $blog->title = $request->title;
        $blog->category=$request->category;
        $blog->description = $request->description;
        $blog->img=$blog->img;
        $blog->active=$blog->active;
        $blog->save();
        return back()->with('msg','Blog updated successfully!');
    }
    }

  
    public function destroy($id)
    {
        $blog = blog::findOrFail($id);
        $blog->delete();
        return back()->with('msg','Blog successfully deleted!');
    }
}
