<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $title = 'List Tasks';
        $tasks = Task::with(['project','assignedToUser'])->paginate(10);
        return view('tasks.index', compact('tasks','title'));
    }

    public function create()
    {
        $title = 'Create Task';
        $projects = Project::all();
        $users = User::all();
        $statuses = Task::taskStatuses();
        return view('tasks.create', compact('title','projects','users','statuses'));
    }

    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'assigned_to' => 'nullable|exists:users,id',
            'due_date' => 'nullable|date',
             'status' => 'required|in:' . implode(',', array_keys(Task::taskStatuses())),
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        $title = 'Task Detail';
        $task->load(['project', 'assignedToUser']);
        return view('tasks.show', compact('task','title'));
    }

    public function edit(Task $task)
    {
        $title = 'Edit Task';
        $projects = Project::all();
        $users = User::all();
        $statuses = Task::taskStatuses();
        $task->setAttribute('due_date', $task->getRawOriginal('due_date'));
        return view('tasks.create', compact('task', 'title','projects', 'users','statuses'));
    }

    public function update(Request $request, Task $task)
    {
         $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'assigned_to' => 'nullable|exists:users,id',
            'due_date' => 'nullable|date',
            'status' => 'required|in:' . implode(',', array_keys(Task::taskStatuses())),
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
         return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
