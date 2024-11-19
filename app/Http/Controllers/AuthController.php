<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function register()
    {
        return view('auth.register');
    }



    public function storeregister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
       
        User::create([
            'nama' => $request->nama,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'role'   => 'user'
        ]);

        return redirect('/login')->with('success','registration successful. Plase login.');
    }







    public function login()
{
    return view('auth.login');
}

public function storelogin(Request $request)
{
    // Validate email and password input
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/dashboard/user')->with('success', 'Login successful.');
    } else {
        // If authentication fails, return back with an error message and retain the email input
        return back()->withErrors(['email' => 'Email or password is incorrect.'])
                    ->onlyInput('email');
    }
}


        public function logout(){

            Auth::logout();
            return redirect('/login')->with('success','logout successful,');     
        }
        
        public function profile(){
            $users = User::all();
            return view('pages.user.profile',compact('users'));
        }
}




 
    