<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*public function home(){ return view('hello'); }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create(){ return view('users.create'); }

    public function store(Request $request){

        $data = $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('/users');
    }

    public function edit($id)
    {
        $user =  User::findOrFail($id);
        echo $user;
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:users,email' . $id
        ]);

        $user->update($data);
        return redirect('/users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users');
    }
       */ 
}
