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
            'emri' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'mbiemri' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'dataLindjes'=>['required'],
            'universiteti' => ['required', 'string', 'max:80'],
            'gjinia' => ['required'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/ ', 'confirmed', Rules\Password::defaults()],
            'id_kartela'=>['required','mimes:pdf,png,jpg','max:2048'],
        ]);
    }

    

   
    protected function create(array $data)
    {
      
            $data= User::create([
            'emri' => $data['emri'],
            'mbiemri' => $data['mbiemri'],
            'dataLindjes' => $data['dataLindjes'],
            'universiteti' => $data['universiteti'],
            'gjinia' => $data['gjinia'],
            'email' => $data['email'],
            'img'=>"public/noProfilePhoto/nofoto.jpg",
            'password' => Hash::make($data['password']),
        ]);
       if(request()->hasFile('id_kartela')){
           $file_path= request()->file('id_kartela')->store('/public/id_kartela');
            $data->update(['id_kartela'=>$file_path]);
        }
   
        return $data;
    
    }
}
