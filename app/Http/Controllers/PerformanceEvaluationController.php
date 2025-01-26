<?php

namespace App\Http\Controllers;

use App\Models\PerformanceEvaluation;
use App\Models\User;
use Illuminate\Http\Request;

class PerformanceEvaluationController extends Controller
{
    public function index()
    {
        $title = 'List Performance Evaluations';
        $evaluations = PerformanceEvaluation::with('user')->paginate(10);
        return view('performance_evaluations.index', compact('evaluations','title'));
    }

     public function create()
    {
        $title = 'Create Performance Evaluation';
        $users = User::all();
        return view('performance_evaluations.create', compact('title','users'));
    }

    public function store(Request $request)
    {
          $validatedData = $request->validate([
             'user_id' => 'required|exists:users,id',
            'evaluation_cycle' => 'nullable|max:255',
            'evaluation_date' => 'required|date',
            'overall_rating' => 'nullable',
            'notes' => 'nullable',
        ]);

        PerformanceEvaluation::create($validatedData);

        return redirect()->route('performance_evaluations.index')->with('success', 'Performance Evaluation created successfully.');
    }

    public function show(PerformanceEvaluation $performanceEvaluation)
    {
        $title = 'Performance Evaluation Detail';
        $performanceEvaluation->load('user');
        return view('performance_evaluations.show', compact('performanceEvaluation','title'));
    }

    public function edit(PerformanceEvaluation $performanceEvaluation)
    {
        $title = 'Edit Performance Evaluation';
        $users = User::all();
        $performanceEvaluation->setAttribute('evaluation_date', $performanceEvaluation->getRawOriginal('evaluation_date'));
        return view('performance_evaluations.create', compact('performanceEvaluation','title','users'));
    }

     public function update(Request $request, PerformanceEvaluation $performanceEvaluation)
     {
           $validatedData = $request->validate([
               'user_id' => 'required|exists:users,id',
                'evaluation_cycle' => 'nullable|max:255',
                'evaluation_date' => 'required|date',
                'overall_rating' => 'nullable',
                'notes' => 'nullable',
          ]);

         $performanceEvaluation->update($validatedData);

         return redirect()->route('performance_evaluations.index')->with('success', 'Performance Evaluation updated successfully.');
     }

    public function destroy(PerformanceEvaluation $performanceEvaluation)
    {
        $performanceEvaluation->delete();
         return redirect()->route('performance_evaluations.index')->with('success', 'Performance Evaluation deleted successfully');
    }
}
