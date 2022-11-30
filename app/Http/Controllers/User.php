<?php

namespace App\Http\Controllers;

use App\Mail\UserDeactivated;
use App\Mail\UserVerification;
use App\Models\User as ModelsUser;
use App\Models\Blog;
use App\Models\contact;
use App\Models\files;
use App\Models\information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class User extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allUsers(){
        if(Auth::user() && Auth::user()->role===true){
        $us=ModelsUser::count();
        $usAc=ModelsUser::where('verified',true)->count();
        $usNac=ModelsUser::where('verified',false)->count();
        $users = ModelsUser::select(['id','name','surname','birthday','university','gender','phoneNo','street','verified','email','img','id_card','role'])->latest()->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users,'us'=>$us,'usAc'=>$usAc,'usNac'=>$usNac]);
        }else{
            return redirect('/home');
        }
    }
    public function findUser(Request $request){
        $us=ModelsUser::count();
        $usAc=ModelsUser::where('verified',true)->count();
        $usNac=ModelsUser::where('verified',false)->count();
        $users=ModelsUser::orderBy('id', 'asc')->where([
            ['name', '!=' , Null],
            ['surname', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('name', 'LIKE', '%'.$term.'%')
                    ->orWhere(DB::raw('CONCAT(name," ",surname)'), 'LIKE', '%' . $term . '%');
                }
                
    }]])->paginate(5);
    return view('Dashboard/users')->with(['users'=>$users,'us'=>$us,'usAc'=>$usAc,'usNac'=>$usNac]);
    }
    public function getVerifiedUsers(){
        
        $us=ModelsUser::count();
        $usAc=ModelsUser::where('verified',true)->count();
        $usNac=ModelsUser::where('verified',false)->count();
        $users = ModelsUser::orderBy('id', 'asc')->where('verified',true)->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users,'us'=>$us,'usAc'=>$usAc,'usNac'=>$usNac]);
    }
    public function getNonVerifiedUsers(){
        $us=ModelsUser::count();
        $usAc=ModelsUser::where('verified',true)->count();
        $usNac=ModelsUser::where('verified',false)->count();
        $users = ModelsUser::orderBy('id', 'asc')->where('verified',false)->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users,'us'=>$us,'usAc'=>$usAc,'usNac'=>$usNac]);
    }
    public function getAdmin(){
        $us=ModelsUser::count();
        $usAc=ModelsUser::where('verified',true)->count();
        $usNac=ModelsUser::where('verified',false)->count();
        $users = ModelsUser::orderBy('id', 'asc')->where('role',true)->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users,'us'=>$us,'usAc'=>$usAc,'usNac'=>$usNac]);
    }
    public function getDefaultUsers(){
        $us=ModelsUser::count();
        $usAc=ModelsUser::where('verified',true)->count();
        $usNac=ModelsUser::where('verified',false)->count();
        $users = ModelsUser::orderBy('id', 'asc')->where('role',false)->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users,'us'=>$us,'usAc'=>$usAc,'usNac'=>$usNac]);
    }
    public function dashboard(){
        if(Auth::user() && Auth::user()->role===true){
            $us=ModelsUser::count();
            $usAc=ModelsUser::where('verified',true)->count();
            $usNac=ModelsUser::where('verified',false)->count();
            $blog=Blog::count();
            $blogAc=Blog::where('active',true)->count();
            $blogNac=Blog::where('active',false)->count();
            $files=files::count();
            $infos=information::count();
            $contact=contact::count();
        return view('Dashboard/dashboard')->with(['contact'=>$contact,'infos'=>$infos,'us'=>$us,'usAc'=>$usAc,'usNac'=>$usNac,'blog'=>$blog,'blogAc'=>$blogAc,'blogNac'=>$blogNac,'file'=>$files]);
    }else{
        return redirect('/home');
    }
    }
    public function index(){
        return view('Profile/Profile');
    }
    public function changePas(){
        return view('Profile/Password');
    }
    public function recentUploads(){
        return view('Profile/AllMyFiles');
    }
    public function upload(){
        return view('Profile/UploadFile');
    }
    public function verifiko($id){
        $user = ModelsUser::findOrFail($id);
        $user->verified=true;
        $user->save();
        $email=ModelsUser::select('email')->where('id',$id)->get();
        Mail::to($email)->send(new UserVerification($email));
        return back()->with('msg','User verified successfully!');
    }
    public function makeAdmin($id){
        $user = ModelsUser::findOrFail($id);
        $user->role=true;
        $user->save();
        return back()->with('msg','User has access of admin!');
    }
    public function makeDefault($id){
        $user = ModelsUser::findOrFail($id);
        $user->role=false;
        $user->save();
        return back()->with('msg','User is now default user!');
    }
    public function cverifiko($id){
        $user = ModelsUser::findOrFail($id);
        $user->verified=false;
        $user->save();
        $email=ModelsUser::select('email')->where('id',$id)->get();
        Mail::to($email)->send(new UserDeactivated($email));
        return back()->with('msg',"User is un-verified successfully!");
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
                'email' => 'required','unique',
                'phoneNo' => 'required','unique',
                'street' => 'required',
            ]);
        $img =  $request->hasFile('img');
        $user = ModelsUser::findOrFail($id);

        if ($img) {
            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/img');
            $user->street = $request->street;
            $user->phoneNo = $request->phoneNo;
            $user->email = $request->email;
            $user->img = $img_path;
        
            $user->save();
            return back()->with('msg','Your profile data has been successfully updated!');

        }else{
            $user->street = $request->street;
            $user->phoneNo = $request->phoneNo;
            $user->email = $request->email;
            
            $user->save();
            return back()->with('msg','Your profile data has been successfully updated!');
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$.%^&*-]).{8,}$/','different:old_password'],
            'new_password_confirmation' => ['required'],
        ]);
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }
        if($request->new_password!==$request->new_password_confirmation){
            return back()->with("error", "Confirm Password Doesn't match!");
        }
        ModelsUser::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("msg", "Your password changed successfully!");
    }
}
