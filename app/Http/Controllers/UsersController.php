<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as IlluminateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



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
            'phone' => 'required|numeric',
            'user_type' => 'required',
            'password' => 'required|min:8',
            'discount' => 'required|numeric',
        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user->update($validatedData);

        return redirect()->route('users')->with('success', 'User updated successfully');
    }

    public function create()
    {
        $user = new User(); // Create a new empty user object
        $current_user = Auth::user();
        $user->added_by = $current_user->id; // Set the added_by field to the ID of the current user
        return view('usersEdit', compact('user'), compact('current_user'));
    }

    public function store(IlluminateRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'user_type' => 'required',
            'password' => 'required|min:8',
            'discount' => 'required|numeric',
        ]);


        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Add the current user's ID as the "added_by" value
        $validatedData['added_by'] = Auth::id();

        $user = User::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'user_type' => $validatedData['user_type'],
            'password' => $validatedData['password'],
            'discount' => $validatedData['discount'],
            'added_by' => $validatedData['added_by'],
        ]);

        return redirect()->route('users', $user->id)->with('success', 'User created successfully');
    }

    public function destroy(User $user)
    {
        $current_user = Auth::user();
        // Check if the user is trying to delete their own account
        if ($user->id === $current_user->id) {
            return response()->json(['success' => false, 'message' => 'You cannot delete your own account.']);
   
        }

        // Perform the deletion
        $user->delete();

        return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
}

}