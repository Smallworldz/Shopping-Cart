<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Requests\RegisterRequest $registerRequest) {
        $name=$registerRequest['name'];
        $email = $registerRequest['email'];
        $password = bcrypt($registerRequest['user_password']);
        $gender = $registerRequest['gender'];
        $mobile = $registerRequest['mobile'];
        $dob=$registerRequest['dob'];
        $address = $registerRequest['address'];
        $zipcode = $registerRequest['zipcode'];
        $city = $registerRequest['city'];
//        dd($registerRequest->all());
        $insertion = User::create(['name'=>$name,'email'=>$email,'password'=>$password,'mobile'=>$mobile,'gender'=>$gender,'DOB'=>$dob,'address'=>$address,'zipcode'=>$zipcode,'city'=>$city]);
        Auth::login($insertion);
        return redirect()->route('shopping.home');
    }
    public function login(LoginRequest $loginRequest){
        $email_id = $loginRequest['emailid'];
        $login_password=$loginRequest['login_password'];
        //dd($loginRequest->toArray());
        if (Auth::attempt(['email' => $email_id, 'password' => $login_password]))
        {
            return redirect()->intended('home');
        }
        else{
            dd("Not Successful");
        }
    }
}