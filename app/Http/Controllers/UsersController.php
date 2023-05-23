<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as IlluminateRequest;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $current_user = Auth::user();

        return view('users', compact('users'), compact('current_user'));
    }

    public function edit(User $user)
    {
        $current_user = Auth::user();
        return view('usersEdit', compact('user'), compact('current_user'));
    }

    public function update(IlluminateRequest $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'user_type' => 'required',
            'password' => 'required|min:8',
            'discount' => 'required|numeric',
        ]);

        $user->update($validatedData);
            
        return redirect()->route('users')->with('success', 'User updated successfully');
    }

    public function create()
    {
    $user = new User(); // Create a new empty user object
    $current_user = Auth::user();
    $user->added_by = $current_user->id; // Set the added_by field to the ID of the current user
    return view('usersEdit', compact('user'));
    }

        
}
