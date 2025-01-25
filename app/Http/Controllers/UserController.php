<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Show list of users
    public function index()
    {
        $users = User::with('roles')->get();
// dd($users);
        return view('users.index', compact('users'));
    }

    // Show create form
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    // Store a new user
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        // Set default password if not provided
        $password = $request->password ?? '12345678';

        $userData = $request->all();
        $userData['password'] = bcrypt($password);
        $userData['user_id'] = Auth::id();

        User::create($userData);

        return redirect()->route('users.index');
    }

    // Show edit form
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.create', compact('user'));
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
