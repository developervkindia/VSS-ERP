<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;

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
    public function show(User $user)
    {
        $user->load(['roles', 'employee.department', 'addresses']);
        return view('users.show', compact('user'));
    }
    // Show list of users
    // public function index()
    // {
    //     $users = User::with('roles')->get();
    //     return view('users.index', compact('users'));
    // }
    public function index()
    {
        $users = User::with(['roles', 'employee.department', 'addresses'])
            ->paginate(10);

        return view('users.index', compact('users'));
    }
    // Show create form
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    // Store a new user
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'  => 'required',
    //         'email' => 'required|email|unique:users,email',
    //     ]);

    //     // Set default password if not provided
    //     $password = $request->password ?? '12345678';

    //     $userData = $request->all();
    //     $userData['password'] = bcrypt($password);
    //     $userData['user_id'] = Auth::id();

    //     User::create($userData);

    //     return redirect()->route('users.index');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string',
            'hire_date' => 'required|date',
            'job_title' => 'nullable|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'street_address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
             'postal_code' => 'nullable|string|max:20',
             'country' => 'nullable|string|max:255',
        ]);

        try {
             $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make('password'), // You might want a better way to handle passwords
        ]);

            $user->assignRole($request->role);


           $employee = $user->employee()->create([
             'hire_date' => $request->hire_date,
             'job_title' => $request->job_title,
             'department_id' => $request->department_id,
         ]);


            $user->addresses()->create([
              'street_address' => $request->street_address,
               'city' => $request->city,
               'state' => $request->state,
              'postal_code' => $request->postal_code,
              'country' => $request->country,
         ]);


            return redirect()->route('users.index')->with('success', 'User created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error'=> 'An error occurred. Please try again.']);
        }
    }
    // Show edit form
    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     $roles = Role::all();
    //     $hasRole = $user->roles->pluck('id');
    //     return view('users.create', compact('user', 'roles', 'hasRole'));
    // }
    public function edit(User $user)
    {
        $roles = Role::all();
        $employee = Employee::where('user_id',$user->id)->first();
        $address = Address::where('user_id',$user->id)->first();
        return view('users.create', compact('user','roles','employee','address'));
    }
    // Update a user
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name'  => 'required',
    //         'email' => 'required|email|unique:users,email,' . $id.',id',
    //     ]);

    //     $user = User::find($id);
    //     $user->update($request->all());

    //     if (isset($request->role)) {
    //         $user->syncRoles($request->role);
    //     }
    //     return redirect()->route('users.index');
    // }
    public function update(Request $request, User $user)
    {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
             'phone' => 'nullable|string|max:20',
             'role' => 'required|string',
              'hire_date' => 'required|date',
              'job_title' => 'nullable|string|max:255',
              'department_id' => 'nullable|exists:departments,id',
              'street_address' => 'nullable|string|max:255',
               'city' => 'nullable|string|max:255',
               'state' => 'nullable|string|max:255',
               'postal_code' => 'nullable|string|max:20',
               'country' => 'nullable|string|max:255',
        ]);

           try {
              $user->updateOrCreate([
                 'name' => $request->name,
                  'email' => $request->email,
                   'phone' => $request->phone,
              ]);

            $user->syncRoles([$request->role]);

            $user->employee()->updateOrCreate([
                  'hire_date' => $request->hire_date,
                  'job_title' => $request->job_title,
                   'department_id' => $request->department_id,
            ]);


            $user->addresses()->updateOrCreate([
                'street_address' => $request->street_address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
            ]);

             return redirect()->route('users.index')->with('success', 'User updated successfully.');

         } catch (\Exception $e) {
             return redirect()->back()->withInput()->withErrors(['error'=> 'An error occurred. Please try again.']);
        }
    }
    // Delete a user
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
