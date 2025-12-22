<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    //
     // Dashboard home
    public function index()
    {
        $UserList = User::all();
        return view('Dashboard.index',compact('UserList'));
    }

    public function MyAccount(){
        $users = Auth::user();
        return view('Dashboard.Users.account',compact('users'));
    }

    public function MyAccountPost(Request $request){
         $user = Auth::user();

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        $user->activities()->create([
            'activity' => 'Password Updated',
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

         // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save(); // Save changes to the database

        return redirect()
            ->route('myaccount')
            ->with('success', 'Account updated successfully.');

    }

    // User activity page
    public function userActivity()
    {
        $users = UserActivity::all();
        return view('Dashboard.activity',compact('users'));
    }

    // Show create user form
    public function userCreate()
    {
        return view('Dashboard.create');
    }

    // Handle create user POST
    public function userCreatePost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // IMPORTANT: hash password
            'created_by' => Auth::user()->name,
        ]);

        // Optional: Track activity
        $user->activities()->create([
            'activity' => 'Created by admin',
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return redirect()->route('createUser')->with('success', 'User created successfully!');
    }

    // Show edit user form
    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('Dashboard.edit', compact('user'));
    }

    // Handle edit user POST
    public function userEditPost(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Optional: Track activity
        $user->activities()->create([
            'activity' => 'Updated by admin',
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return redirect()->route('editUser', $user->id)->with('success', 'User updated successfully!');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Optional: track deletion before deleting
        $user->activities()->create([
            'activity' => 'Deleted by admin',
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully!');
    }
}
