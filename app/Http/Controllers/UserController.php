<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages.user.user',compact('users'));
    }

    public function create() {
        $users = User::all();
        return view('pages.user.tambahuser', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email', // Added 'email' validation rule
            'password' => 'required',
            'role' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah ada', // Fixed typo 'unoque' to 'unique'
            'password.required' => 'Password harus diisi',
            'role.required' => 'Role harus diisi', // Added missing validation message
        ]);

        $storeDataUser = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];

        User::create($storeDataUser);
        return redirect('/user')->with('success', 'User berhasil ditambahkan'); // Optional: added success message
    }




    public function editUser($id)
    {
        $dataUser = User::find($id);
        return view('pages.user.edituser',compact('dataUser'));
    }

    public function updateUser(Request $request, $id)
{
    $request->validate([
        'nama'  => 'required',
        'email' => 'required|unique:users,email,' . $id,
        'password' => 'nullable',
        'role' => 'required',
    ], [
        'nama.required' => 'Nama harus diisi',
        'email.required' => 'Email harus diisi',
        'email.unique' => 'Email sudah ada',
        'role.required' => 'Role harus diisi',
    ]);

    $user = User::findOrFail($id);
    $user->nama = $request->input('nama');
    $user->email = $request->input('email');
    $user->role = $request->input('role');

    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    $user->save();

    return redirect('/user')->with('success', 'User updated successfully.');
}



    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/user')->with('success','User berhasil dihapus.');
    }


}


