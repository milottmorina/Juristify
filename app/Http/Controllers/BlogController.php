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
        $blogs = blog::with('user')->orderBy('id', 'desc')->paginate(5);
        $allBlogs=blog::count();
        $NonAcBlogs=blog::where('active',0)->count();
        $AcBlogs=blog::where('active',1)->count();
        return view('Dashboard/All-blogs')->with(['AcBlogs'=>$AcBlogs,'NonAcBlogs'=>$NonAcBlogs,'blogs'=>$blogs,'allBlogs'=>$allBlogs]);
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
        if ($blog && Auth::user()->role===0) {
            $request->validate([
                'title' => ['required','max:100','min:4'],
                'description' => ['required','max:6000','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'category' => ['required','max:50'],
            ]);
            $newblog = $request->file('img');
            $blog_path = $newblog->store('/public/blog');
            blog::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'img' => $blog_path,
                'category'=>$request['category'],
                'user_id' => Auth::user()->id,
                'active'=>0
            ]);
       return back()->with('msg','Blog is stored succesfully, please be patient until we verify!');
        }else{
            $newblog = $request->file('img');
            $blog_path = $newblog->store('/public/blog');
            $request->validate([
                'title' => ['required','max:100','min:4'],
                'description' => ['required','max:6000','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'category' => ['required','max:50'],

            ]);
            blog::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'img' => $blog_path,
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
        return view('Blog/Single')->with(['blogs'=>$blogs,'comments'=>$comments]);
    }

    public function findBlog(Request $request){
        $blogs=blog::active(1)->with('user')->orderBy('id', 'desc')->where([
            ['title', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('title', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    return view('Blog/Blog')->with(['blogs'=>$blogs]);
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
    return view('Dashboard/All-blogs')->with(['AcBlogs'=>$AcBlogs,'NonAcBlogs'=>$NonAcBlogs,'allBlogs'=>$allBlogs,'blogs'=>$blogs]);
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
        $newblog = $request->file('img');
        $blog_path = $newblog->store('/public/blog');
        $blog->user_id = $blog->user_id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->img=$blog_path;
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
        $newblog = $request->file('img');
        $blog_path = $newblog->store('/public/blog');
        $blog = blog::findOrFail($id);
        $blog->user_id = $blog->user_id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->img=$blog_path;
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
        Storage::delete($blog->img);
        Storage::delete("storage/app/".$blog->img);
        $blog->delete();
        return back()->with('msg','Blog successfully deleted!');
    }
}
