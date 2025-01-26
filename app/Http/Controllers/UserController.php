<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware() {
        return [
            new Middleware('permission:show-users', ['only' => ['index', 'show']]),
            new Middleware('permission:create-users', ['only' => ['create', 'store']]),
            new Middleware('permission:update-users', ['only' => ['edit', 'update']]),
            new Middleware('permission:destroy-users', ['only' => ['destroy']]),
        ];
    }

    // Show list of users
    public function index()
    {
        $users = User::with('roles')->get();
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
        $roles = Role::all();
        $hasRole = $user->roles->pluck('id');
        return view('users.create', compact('user', 'roles', 'hasRole'));
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $id.',id',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        if (isset($request->role)) {
            $user->syncRoles($request->role);
        }
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
