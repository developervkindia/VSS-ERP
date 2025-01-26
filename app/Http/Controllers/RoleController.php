<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware() {
        return [
            new Middleware('permission:show-roles', ['only' => ['index', 'show']]),
            new Middleware('permission:create-roles', ['only' => ['create', 'store']]),
            new Middleware('permission:update-roles', ['only' => ['edit', 'update']]),
            new Middleware('permission:destroy-roles', ['only' => ['destroy']]),
        ];
    }

    // Show list of roles
    public function index()
    {
        $roles = Role::latest()->get();

        return view('roles.index', compact('roles'));
    }

    // Show create form
    public function create()
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('roles.create', compact('permissions'));
    }

    // Store a new role
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|unique:roles',
        ]);

        $role = Role::create($request->all());
        if (isset($request->permissions)) {
            foreach ($request->permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        }
        return redirect()->route('roles.index');
    }

    // Show edit form
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::orderBy('name', 'asc')->get();
        $hasPermissions = $role->permissions->pluck('name');
        return view('roles.create', compact('role', 'permissions', 'hasPermissions'));
    }

    // Update a role
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|unique:roles,name,' . $id.',id',
        ]);

        $role = Role::find($id);
        $role->update($request->all());
        if (isset($request->permissions)) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('roles.index');
    }

    // Delete a role
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('roles.index');
    }
}
