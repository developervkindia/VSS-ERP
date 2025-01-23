<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Show list of records
    public function index()
    {
        $records = Project::all();
        return view('Projects.index', compact('records'));
    }

    // Show create form
    public function create()
    {
        return view('Projects.create');
    }

    // Store a new record
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Project::create($request->all());
        return redirect()->route('Projects.index');
    }

    // Show edit form
    public function edit($id)
    {
        $record = Project::find($id);
        return view('Projects.edit', compact('record'));
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
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