<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userList()
    {
        $users = User::all();
        return view('user.users', compact('users'));
    }

    public function userCreate()
    {
        return view('user.create');
    }

    public function userStore(Request $request)
    {
        $validationRules = [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
            'address' => 'nullable',
            'phone' => 'nullable',
            'date' => 'required'
        ];
        if($request->user_id){
            $validationRules['email'] = 'required|email|unique:users,email,' . $request->user_id;
        }
        
        $request->validate( $validationRules );
        $request['name'] = $request->name . ' ' . $request->surname;
        if($request->user_id){
            $user = User::find($request->user_id);
            $user->update($request->all());
            return redirect()->route('user.list')->with('success', 'User updated successfully.');
        }

        $request->merge([
            'password' => Hash::make('admin123')
        ]);
        $user = User::create($request->all());
        return redirect()->route('user.list')->with('success', 'User created successfully.');
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        return view('user.create', compact('user'));
    }
    
}
