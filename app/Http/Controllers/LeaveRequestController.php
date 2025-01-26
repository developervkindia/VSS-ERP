<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $title = 'List Leave Requests';
        $leaveRequests = LeaveRequest::with(['user', 'approvedBy'])->paginate(10);
         return view('leave_requests.index', compact('leaveRequests','title'));
    }


    public function create()
    {
        $title = 'Create Leave Request';
        $employees = Employee::all();
        $users = User::all();
        $statuses = LeaveRequest::leaveStatuses();
        return view('leave_requests.create', compact('title','employees', 'users','statuses'));
    }

      public function store(Request $request)
    {
         $validatedData = $request->validate([
            'user_id' => 'required|exists:employees,id',
            'leave_type' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
             'status' => 'required|in:' . implode(',', array_keys(LeaveRequest::leaveStatuses())),
            'approved_by' => 'nullable|exists:users,id',
            'notes' => 'nullable',
        ]);

         LeaveRequest::create($validatedData);

          return redirect()->route('leave_requests.index')->with('success', 'Leave Request created successfully.');
    }


    public function show(LeaveRequest $leaveRequest)
    {
        $title = 'Leave Request Detail';
        $leaveRequest->load(['user','approvedBy']);
         return view('leave_requests.show', compact('leaveRequest','title'));
    }

     public function edit(LeaveRequest $leaveRequest)
     {
         $title = 'Edit Leave Request';
         $employees = Employee::all();
         $users = User::all();
         $statuses = LeaveRequest::leaveStatuses();
         $leaveRequest->setAttribute('start_date',$leaveRequest->getRawOriginal('start_date'));
         $leaveRequest->setAttribute('end_date',$leaveRequest->getRawOriginal('end_date'));
         return view('leave_requests.create', compact('leaveRequest','title','employees', 'users','statuses'));
     }

      public function update(Request $request, LeaveRequest $leaveRequest)
      {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:employees,id',
                'leave_type' => 'required|max:255',
                 'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'status' => 'required|in:' . implode(',', array_keys(LeaveRequest::leaveStatuses())),
                'approved_by' => 'nullable|exists:users,id',
                'notes' => 'nullable',
          ]);

         $leaveRequest->update($validatedData);

         return redirect()->route('leave_requests.index')->with('success', 'Leave Request updated successfully.');
    }


    public function destroy(LeaveRequest $leaveRequest)
    {
         $leaveRequest->delete();
        return redirect()->route('leave_requests.index')->with('success', 'Leave Request deleted successfully');
    }
}
