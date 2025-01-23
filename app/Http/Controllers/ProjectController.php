<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Show list of records
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    // Show create form
    public function create()
    {
        return view('projects.create');
    }

    // Store a new record
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $request['user_id'] = Auth::id();
        Project::create($request->all());

        return redirect()->route('projects.index');
    }

    // Show edit form
    public function edit($id)
    {
        $record = Project::find($id);
        return view('projects.edit', compact('record'));
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $record = Project::find($id);
        $record->update($request->all());

        return redirect()->route('Projects.index');
    }

    // Delete a record
    public function destroy($id)
    {
        $record = Project::find($id);
        $record->delete();

        return redirect()->route('Projects.index');
    }
}