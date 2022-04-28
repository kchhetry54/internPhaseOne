<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.Login");
    }

    public function register()
    {
        return view("auth.register");
    }
    public function store(Request $request)
    {
        $data   =   $request->validate([
            'name'      =>  ['required', 'max:20'],
            'email'     =>  ['required', 'email', 'unique:users,email'],
            'password'  =>  ['required', 'confirmed', Password::min(8)],
        ]);

        $data['password']   =   bcrypt($data['password']);

        User::create($data);

        return redirect()->route('register')
        ->with('success','Registerd Successfuly');
    }

    public function loginuser(Request $request)
    {
        $request->validate([
            'email'     =>  ['required', 'email'],
            'password'  =>  ['required'],
        ]);

        $user = User::where('email', '=' , $request->email)->first();
        
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId', $user->id);

            return redirect()->route('dashboard')
             ->with('success', 'you are log in');

            }else{
            return back()->with('fail', 'Password is incorrect');

            }
        }else{
            return back()->with('fail', 'This email is  not registered');
        }
    }

    public function dashboard()
    {
        $data = array();

        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('users.dashboard',compact('data'));
    }

    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        return redirect('login');
    }

    public function changepassword(User $user)
    {
        $user = array();

        if(Session::has('loginId')){
            $user = User::where('id', '=', Session::get('loginId'))->first();
        }
        
        return view('auth.updatepassword', compact('user'));
    }

    public function updatepassword(Request $request)
    {
        $user = array();

        if(Session::has('loginId')){
            $user = User::where('id', '=', Session::get('loginId'))->first();
        }
  
        $data   =  $request->validate([
            'current_password'  =>  ['required'],
            'new_password'      =>  ['required', 'confirmed','min:2'],
        ]);

        if (!(Hash::check($request->get('current_password'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }
     
        $user->password  =   bcrypt($request->new_password);
        $user->save();
    

        return redirect()->route('dashboard')
            ->with('success', 'password updated successfully');
    }

    public function verifyAccount($token)

    {

        $verifyUser = UserVerify::where('token', $token)->first();
        $message = 'Sorry your email cannot be identified.';
        if(!is_null($verifyUser) ){

            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }

        }

  

      return redirect()->route('login')->with('message', $message);

    }
}
