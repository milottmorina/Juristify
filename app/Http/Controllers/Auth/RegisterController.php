<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Aws\S3\S3Client;
use Illuminate\Support\Str;



class RegisterController extends Controller
{
  

    use RegistersUsers;

  
    protected $redirectTo = RouteServiceProvider::HOME;

   
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'surname' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'birthday'=>['required'],
            'university' => ['required', 'string', 'max:80'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'id_card'=>['required','mimes:pdf,png,jpg','max:4096'],
        ]);
    }

    

   
    protected function create(array $data)
    {

            $data = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'birthday' => $data['birthday'],
            'university' => $data['university'],
            'gender' => $data['gender'],
            'verified'=>$data['verified'],
            'email' => $data['email'],
            'img'=>"public/noProfilePhoto/nofoto.jpg",
            'password' => Hash::make($data['password']),
        ]);
        $id_card = request()->hasFile('id_card');
        if($id_card){
            $newFile = request()->file('id_card');
            $file_path = $newFile->store('/public/id_card');
            $data->update(['id_card'=>$file_path]);
        }
   
        return $data;
    
    }
}
