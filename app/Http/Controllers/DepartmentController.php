<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $title = 'List Departments';
        $departments = Department::paginate(10);
        return view('departments.index', compact('departments','title'));
    }

    public function create()
    {
       $title = 'Create Department';
        return view('departments.create',compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:departments|max:255',
             'description' => 'nullable',
        ]);

        Department::create($validatedData);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function show(Department $department)
    {
        $title = 'Department Detail';
        return view('departments.show', compact('department','title'));
    }

    public function edit(Department $department)
    {
        $title = 'Edit Department';
        return view('departments.create', compact('department','title'));
    }

    public function update(Request $request, Department $department)
    {
         $validatedData = $request->validate([
            'name' => 'required|unique:departments,name,' . $department->id . '|max:255',
            'description' => 'nullable',
        ]);

        $department->update($validatedData);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
         return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
}
