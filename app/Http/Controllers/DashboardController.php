<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\PayrollDetail;
use App\Models\PerformanceEvaluation;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;


class DashboardController extends Controller
{
    public function adminDashboard()
    {
       $totalUsers = User::count();
       $totalEmployees = User::whereHas('employee')->count();
       $totalProjects = Project::count();
       $totalTasks = Task::count();
         $recentActivities = Activity::orderBy('created_at', 'desc')->take(5)->get();
       return view('dashboards.admin_dashboard', compact('totalUsers', 'totalEmployees', 'totalProjects', 'totalTasks','recentActivities'));
   }

    public function hrDashboard()
     {
        $totalEmployees = User::whereHas('employee')->count();
         $activeEmployees = User::whereHas('employee')->count();
        $pendingLeaveRequests = LeaveRequest::where('status', 'pending')->count();
          $pendingPerformanceEvaluations = PerformanceEvaluation::count();
           $newHires = User::whereHas('employee', function($query){
                $query->whereMonth('created_at', date('m'));
            })->count();
         $leaveRequests = LeaveRequest::with('user')->where('status', 'pending')->get();
         return view('dashboards.hr_dashboard', compact('totalEmployees','activeEmployees','pendingLeaveRequests','pendingPerformanceEvaluations','newHires','leaveRequests'));
    }

    public function managerDashboard()
     {
        $totalTeamMembers = User::whereHas('employee')->count();
           $ongoingProjects = Project::count();
           $pendingLeaveRequests = LeaveRequest::where('status', 'pending')->count();
         $tasks = Task::with(['project', 'assignedToUser'])->get();
        return view('dashboards.manager_dashboard', compact('totalTeamMembers','ongoingProjects','pendingLeaveRequests','tasks'));
    }

    public function employeeDashboard()
    {
        $user = Auth::user();
        $totalTasks = Task::where('assigned_to', $user->id)->count();
         $payrollDetails = PayrollDetail::where('user_id', $user->id)->orderBy('pay_date','desc')->take(5)->get();
        return view('dashboards.employee_dashboard', compact('user','totalTasks','payrollDetails'));
    }
}
