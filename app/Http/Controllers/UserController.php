<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUsers(){
        $users = User::all();
        return view('users.index', compact('users'));
        }

    public function createUser(){

        $regions = Facility::distinct()->pluck('snu_region'); // Example regions

        return view('users.create', compact('regions'));
    }

    public function storeUser(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'region' => 'required|string',
            'country' => 'required|string',
            //'profile_photo_path' => 'nullable|image|max:2048',
            'two_factor_enabled' => 'nullable|boolean',
            'is_admin' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'is_verified' => 'nullable|boolean',
            'is_banned' => 'nullable|boolean',
            'is_suspended' => 'nullable|boolean',
            'is_uploader' => 'nullable|boolean',
            'is_query_admin' => 'nullable|boolean',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->region = $request->region;
        $user->country = $request->country;
        $user->two_factor_enabled = $request->two_factor_enabled ?? false;
        $user->is_admin = $request->is_admin ?? false;
        $user->is_active = $request->is_active ?? false;
        $user->is_verified = $request->is_verified ?? false;
        $user->is_banned = $request->is_banned ?? false;
        $user->is_suspended = $request->is_suspended ?? false;
        $user->is_uploader = $request->is_uploader ?? false;
        $user->is_query_admin = $request->is_query_admin ?? false;
        $user->save();

        return redirect()->route('users.list')->with('success', 'User created successfully.');
    }

    public function editUser(Request $request){
        $user = User::findOrFail($request->id);
        $regions = Facility::distinct()->pluck('snu_region'); // Example regions
        return view('users.edit', compact('user', 'regions'));
    }

    public function updateUser(Request $request){
        $user = User::findOrFail($request->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'region' => 'required|string',
            'country' => 'required|string',
            //'profile_photo_path' => 'nullable|image|max:2048',
            'two_factor_enabled' => 'nullable|boolean',
            'is_admin' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'is_verified' => 'nullable|boolean',
            'is_banned' => 'nullable|boolean',
            'is_suspended' => 'nullable|boolean',
            'is_uploader' => 'nullable|boolean',
            'is_query_admin' => 'nullable|boolean',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->region = $request->region;
        $user->country = $request->country;
        $user->two_factor_enabled = $request->two_factor_enabled ?? false;
        $user->is_admin = $request->is_admin ?? false;
        $user->is_active = $request->is_active ?? false;
        $user->is_verified = $request->is_verified ?? false;
        $user->is_banned = $request->is_banned ?? false;
        $user->is_suspended = $request->is_suspended ?? false;
        $user->is_uploader = $request->is_uploader ?? false;
        $user->is_query_admin = $request->is_query_admin ?? false;
        $user->save();

        return redirect()->route('users.list')->with('success', 'User updated successfully.');
    }
    
    public function deleteUser(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->route('users.list')->with('success', 'User deleted successfully.');
    }
}
