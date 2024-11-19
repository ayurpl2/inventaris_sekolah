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
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,user', // Validasi role
        ]);

        // Simpan user ke database
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role, // Simpan role dari input
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Registration successful. Please login.');
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
        return redirect('/')->with('success', 'Login successful.');
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





