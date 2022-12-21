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
       if(request()->hasFile('id_card')){
        $s3 = new S3Client([
            'region'  => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => "AKIAYI7C65632AHOGP4K",
                'secret' => "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",
            ]
        ]);	 
        $newImg = request()->file('id_card');
        $fileName=Str::random(30).$newImg->getClientOriginalName();
        $result = $s3->putObject([
            'Bucket' => 'juristify',
            'Key'    => $fileName,
            'SourceFile' => $newImg,	
            'ACL' => 'public-read'	
        ]);
            $data->update(['id_card'=>$result['ObjectURL']]);
        }
   
        return $data;
    
    }
}
