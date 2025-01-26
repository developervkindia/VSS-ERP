<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $title = 'List Projects';
        $projects = Project::with('user')->paginate(10);
        return view('projects.index', compact('projects','title'));
    }

    public function create()
    {
        $title = 'Create Project';
        $users = User::all();
        $types = Project::projectTypes();
        $statuses = Project::projectStatuses();
        return view('projects.create',compact('title','users','types','statuses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable',
            'type' => 'required|in:' . implode(',', array_keys(Project::projectTypes())),
            'status' => 'required|in:' . implode(',', array_keys(Project::projectStatuses())),
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $title = 'Project Detail';
        $project->load('user');
         return view('projects.show', compact('project','title'));
    }


    public function edit(Project $project)
    {
        $title = 'Edit Project';
        $users = User::all();
        $types = Project::projectTypes();
        $statuses = Project::projectStatuses();
        $project->setAttribute('start_date', $project->getRawOriginal('start_date'));
        $project->setAttribute('end_date', $project->getRawOriginal('end_date'));
        return view('projects.create', compact('project', 'title', 'users', 'types', 'statuses'));
    }

    public function update(Request $request, Project $project)
    {
         $validatedData = $request->validate([
             'title' => 'required|max:255',
             'user_id' => 'required|exists:users,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
             'description' => 'nullable',
             'type' => 'required|in:' . implode(',', array_keys(Project::projectTypes())),
             'status' => 'required|in:' . implode(',', array_keys(Project::projectStatuses())),
         ]);

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }


    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
