<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller
{
    public function __construct() {
        return [
            new Middleware('permission:show-permissions', ['only' => ['index', 'show']]),
            new Middleware('permission:create-permissions', ['only' => ['create', 'store']]),
            new Middleware('permission:update-permissions', ['only' => ['edit', 'update']]),
            new Middleware('permission:destroy-permissions', ['only' => ['destroy']]),
        ];
    }

    // Show list of permissions
    public function index()
    {
        $permissions = Permission::latest()->get();

        return view('permissions.index', compact('permissions'));
    }

    // Show create form
    public function create()
    {
        return view('permissions.create');
    }

    // Store a new permission
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
        ]);

        Permission::create($request->all());

        return redirect()->route('permissions.index');
    }

    // Show edit form
    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('permissions.create', compact('permission'));
    }

    // Update a permission
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->update($request->all());

        return redirect()->route('permissions.index');
    }

    // Delete a permission
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return redirect()->route('permissions.index');
    }
}
