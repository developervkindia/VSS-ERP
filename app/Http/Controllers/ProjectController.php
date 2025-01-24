<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Show list of projects
    public function index()
    {
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