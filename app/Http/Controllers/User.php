<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class User extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allUsers(){
        if(Auth::user() && Auth::user()->role==='admin'){
        $users = ModelsUser::orderBy('id', 'asc')->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users]);
        }else{
            return redirect('/home');
        }
    }
    public function findUser(Request $request){
        $users=ModelsUser::orderBy('id', 'asc')->where([
            ['emri', '!=' , Null],
            ['mbiemri', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('emri', 'LIKE', '%'.$term.'%')
                    ->orWhere(DB::raw('CONCAT(emri," ",mbiemri)'), 'LIKE', '%' . $term . '%');
                }
                
    }]])->paginate(5);
    return view('Dashboard/users')->with(['users'=>$users]);
    }
    public function getVerifiedUsers(){
        $users = ModelsUser::orderBy('id', 'asc')->where('verifikuar','=','po')->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users]);
    }
    public function getNonVerifiedUsers(){
        $users = ModelsUser::orderBy('id', 'asc')->where('verifikuar','=','jo')->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users]);
    }
    public function getAdmin(){
        $users = ModelsUser::orderBy('id', 'asc')->where('role','=','admin')->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users]);
    }
    public function getDefaultUsers(){
        $users = ModelsUser::orderBy('id', 'asc')->where('role','=','user')->paginate(5);
        return view('Dashboard/users')->with(['users'=>$users]);
    }
    public function dashboard(){
        if(Auth::user() && Auth::user()->role==="admin"){
        return view('dashboard/dashboard');
    }else{
        return redirect('/home');
    }
    }
    public function index(){
        return view('Profile/profile');
    }
    public function changePas(){
        return view('Profile/password');
    }
    public function recentUploads(){
        return view('Profile/AllMyFiles');
    }
    public function upload(){
        return view('Profile/UploadFile');
    }
    public function verifiko($id){
        $user = ModelsUser::findOrFail($id);
        $user->verifikuar='po';
        $user->save();
        return back()->with('msg','User u verifikua me sukses!');
    }
    public function makeAdmin($id){
        $user = ModelsUser::findOrFail($id);
        $user->role='admin';
        $user->save();
        return back()->with('msg','User tani ka aksesin e adminit!');
    }
    public function makeDefault($id){
        $user = ModelsUser::findOrFail($id);
        $user->role='user';
        $user->save();
        return back()->with('msg','User tani eshte user i thjeshte!');
    }
    public function cverifiko($id){
        $user = ModelsUser::findOrFail($id);
        $user->verifikuar='jo';
        $user->save();
        return back()->with('msg',"User u c'verifikua me sukses!");
    }
    public function updateProfile(Request $request, $id)
    {
        $img =  $request->hasFile('img');
        $user = ModelsUser::findOrFail($id);

        if ($img) {
            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/img');
   
   
        $user->rruga = $request->rruga;
        $user->numriTel = $request->numriTel;
        $user->email = $request->email;
        $user->img = $img_path;
        
      
        $user->save();
   
        return back()->with('msg','Te dhenat tuaja jane ndryshuar me sukses!');

        }else{
          
        
            $user->rruga = $request->rruga;
            $user->numriTel = $request->numriTel;
            $user->email = $request->email;
            
            $user->save();
  
            return back()->with('msg','Te dhenat tuaja jane ndryshuar me sukses!');
        }
    }

    public function update_password(Request $request)
    {
        // $request->validate([
        //     'old_password' => 'required',
        //     'new_password' => ['required','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$.%^&*-]).{8,}$/ '],
        // ]);
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }
        if($request->new_password!==$request->new_password_confirmation){
            return back()->with("error", "Confirm Password Doesn't match!");
        }

        ModelsUser::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("msg", "Password-i ndryshoi me sukses!");
    }
}
