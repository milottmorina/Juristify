<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
   
    public function index()
    {
        
        $blogs = blog::with('user')->where('aktive','po')->orderBy('id', 'desc')->paginate(9);
       
        return view('Blog/blog')->with(['blogs'=>$blogs]);
    }

    
    public function create()
    {
        return view('Profile/StoreBlog');
    }

    public function showAll(){
        $blogs = blog::with('user')->orderBy('id', 'asc')->paginate(5);
        return view('dashboard/all-blogs')->with(['blogs'=>$blogs]);
    }
    public function cverifiko($id){
        $blog = blog::findOrFail($id);
        $blog->aktive='jo';
        $blog->save();
        return back()->with('msg',"Blogu u c'verifikua me sukses!");
    }
    public function verifiko($id){
        $blog = blog::findOrFail($id);
        $blog->aktive='po';
        $blog->save();
        return back()->with('msg',"Blogu u verifikua me sukses!");
    }
   
    public function store(Request $request)
    {
        $file = $request->hasFile('img');
        if ($file && Auth::user()->role==="user") {

            $newFile = $request->file('img');
            $file_path = $newFile->store('/public/blog');
            blog::create([
                'titulli' => $request['titulli'],
                'pershkrimi' => $request['pershkrimi'],
                'img' => $file_path,
                'kategoria'=>$request['kategoria'],
                'user_id' => Auth::user()->id,
                'aktive'=>'jo'
            ]);
       return back()->with('msg','Blog juaj u shtua me sukses, por ju duhet te prisni per aprovimin nga admini!');
        }else{
            $newFile = $request->file('img');
            $file_path = $newFile->store('/public/blog');
            blog::create([
                'titulli' => $request['titulli'],
                'pershkrimi' => $request['pershkrimi'],
                'img' => $file_path,
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

  
    public function update(Request $request, $id)
    {
        //
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
