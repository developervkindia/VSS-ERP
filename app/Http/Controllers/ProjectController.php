<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProjectController extends Controller implements HasMiddleware
{

    public static function middleware() {
        return [
            new Middleware('permission:show-projects', ['only' => ['index', 'show']]),
            new Middleware('permission:create-projects', ['only' => ['create', 'store']]),
            new Middleware('permission:update-projects', ['only' => ['edit', 'update']]),
            new Middleware('permission:destroy-projects', ['only' => ['destroy']]),
        ];
    }
    // Show list of projects
    public function index(User $user)
    {
        // dd(auth()->user()->name);
        dd($user->hasPermissionTo('show-projects'));
        $projects = Project::latest()->get();

        return view('projects.index', compact('projects'));
    }

    // Show create form
    public function create()
    {
        return view('projects.create');
    }

    // Store a new project
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable',
        ]);

        $request['user_id'] = Auth::id();
        Project::create($request->all());

        return redirect()->route('projects.index');
    }

    // Show edit form
    public function edit($id)
    {
        $project = Project::find($id);

        return view('projects.create', compact('project'));
    }

    // Update a project
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable',
        ]);

        $project = Project::find($id);
        $project->update($request->all());

        return redirect()->route('projects.index');
    }

    // Delete a project
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('projects.index');
    }
}
