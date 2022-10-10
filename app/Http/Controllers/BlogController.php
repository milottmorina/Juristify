<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User as UserModel;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
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
        
        $blogs = blog::with('user')->where('aktive','po')->orderBy('id', 'desc')->paginate(9);
       
        return view('Blog/blog')->with(['blogs'=>$blogs]);
    }

    public function myBlogs(){
        $blogs = blog::with('user')->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(9);
        return view('Profile/AllMyBlogs')->with(['blogs'=>$blogs]);
    }
    
    public function create()
    {
        return view('Profile/StoreBlog');
    }

    public function showAll(){
        $blogs = blog::with('user')->orderBy('id', 'desc')->paginate(5);
        return view('dashboard/all-blogs')->with(['blogs'=>$blogs]);
    }
    public function cverifiko($id){
        $blog = blog::findOrFail($id);
        $blog->aktive='jo';
        $blog->save();
        $email=UserModel::select('email')->where('id',$blog->user_id)->get();
        Mail::to($email)->send(new BlogDeactivated($email));    
        return back()->with('msg',"Blogu u c'verifikua me sukses!");
    }
    public function verifiko($id){
        $blog = blog::findOrFail($id);
        $blog->aktive='po';
        $blog->save();
        
        $email=UserModel::select('email')->where('id',$blog->user_id)->get();
        Mail::to($email)->send(new BlogActivate($email));    
        return back()->with('msg',"Blogu u verifikua me sukses!");
    }
   
    public function store(Request $request)
    {
        $blog = $request->hasFile('img');
        if ($blog && Auth::user()->role==="user") {
            $request->validate([
                'titulli' => ['required','max:40','min:4'],
                'pershkrimi' => ['required','max:1500','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'kategoria' => ['required','max:20'],
            ]);
            $newblog = $request->file('img');
            $blog_path = $newblog->store('/public/blog');
            blog::create([
                'titulli' => $request['titulli'],
                'pershkrimi' => $request['pershkrimi'],
                'img' => $blog_path,
                'kategoria'=>$request['kategoria'],
                'user_id' => Auth::user()->id,
                'aktive'=>'jo'
            ]);
       return back()->with('msg','Blog juaj u shtua me sukses, por ju duhet te prisni per aprovimin nga admini!');
        }else{
            $newblog = $request->file('img');
            $blog_path = $newblog->store('/public/blog');
            $request->validate([
                'titulli' => ['required','max:40','min:4'],
                'pershkrimi' => ['required','max:1500','min:10'],
                'img' => ['required','mimes:jpeg,png','max:2048'],
                'kategoria' => ['required','max:20'],

            ]);
            blog::create([
                'titulli' => $request['titulli'],
                'pershkrimi' => $request['pershkrimi'],
                'img' => $blog_path,
                'kategoria'=>$request['kategoria'],
                'user_id' => Auth::user()->id,
                'aktive'=>'po'
            ]);
            return back()->with('msg','Blog juaj u shtua me sukses!');
        }
        
    }

   
    public function show($id)
    {
        
        $blogs = blog::with('user')->findOrFail($id);
        $comments = Comment::with('user','blog')->where('blog_id',$id)->orderBy('id', 'desc')->get();
    
        if($blogs->aktive==="po"){
        return view('Blog/Single')->with(['blogs'=>$blogs,'comments'=>$comments]);
        }else{
            return redirect('/blog');
        }
    }


    public function edit($id)
    {
        
    }

    public function findBlog(Request $request){
        $blogs=blog::orderBy('id', 'desc')->where([
            ['titulli', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('titulli', 'LIKE', '%'.$term.'%')->where('aktive','po');
                }   
    }]])->paginate(5);
    return view('Blog/blog')->with(['blogs'=>$blogs]);
    }
    public function findBlogDashboard(Request $request){
        $blogs=blog::orderBy('id', 'desc')->where([
            ['titulli', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('titulli', 'LIKE', '%'.$term.'%');
                }   
    }]])->paginate(5);
    return view('dashboard/all-blogs')->with(['blogs'=>$blogs]);
    }
  
     public function update(Request $request, $id)
    {
        $blog = $request->hasfile('img');
        if ($blog) {
             $blog = blog::findOrFail($id);
            $request->validate([
            'titulli' => ['required','max:40','min:4'],
            'pershkrimi' => ['required','max:250','min:10'],
            'img' => ['required','mimes:jpeg,png','max:2048'],
        ]);
            $newblog = $request->file('img');
            $blog_path = $newblog->store('/public/blog');
     
        
        $blog->user_id = Auth::user()->id;
        $blog->titulli = $request->titulli;
        $blog->pershkrimi = $request->pershkrimi;
        $blog->img=$blog_path;
        $blog->aktive=$blog->aktive;
        $blog->save();
        return back();
    }else{
        $request->validate([
            'titulli' => ['required','max:40','min:4'],
            'pershkrimi' => ['required','max:250','min:10'],
        ]);
        $blog = blog::findOrFail($id);
        $blog->user_id = Auth::user()->id;
        $blog->titulli = $request->titulli;
        $blog->pershkrimi = $request->pershkrimi;
        $blog->img=$blog->img;
        $blog->aktive=$blog->aktive;
        $blog->save();
        return back();
    }
    }

  
    public function destroy($id)
    {
        $blog = blog::findOrFail($id);
        Storage::delete($blog->img);
        Storage::delete("storage/app/".$blog->img);
        $blog->delete();
        return back()->with('msg','Blogu u fshi me sukses!');
    }
}
