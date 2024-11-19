<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrangController extends Controller
{
    //
    public function index(){
        
        $users=user::all();
        return view('pages.user.profile',compact('users'));
    }
    public function create(){
        $users = user::all();

        return view('pages.user.profil');
    }

}
