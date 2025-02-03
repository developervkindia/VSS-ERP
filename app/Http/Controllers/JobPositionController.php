<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('department')->paginate(10);

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $departments = Department::all();

       return view('jobs.form', compact('departments'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $request->validate([
            'title' => 'required',
            'department_id' => 'nullable|exists:departments,id',
             'description' => 'nullable',
              'location_type' => 'nullable',
             'address' => 'nullable',
                'city'=> 'nullable',
              'state'=> 'nullable',
              'country'=>'nullable',
               'postal_code' =>'nullable',
              'employment_type' => 'nullable',
             'experience_required'=> 'nullable|integer|min:0',
                 'salary_min'=>'nullable|numeric',
             'salary_max' =>'nullable|numeric',
             'opening_date'=> 'nullable|date',
               'closing_date' => 'nullable|date',
              'publish_date'=> 'nullable|date',
             'is_active'=>'boolean'


           ]);

           $job = Job::create($request->all());
            //generate unique Slug
            $job->slug = Str::slug($request->title) . '-' . $job->id;
            $job->save();

         return redirect()->route('jobs.index')->with('success','Job Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
         //details not needed in UI or we create specific action
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
           $departments = Department::all();
         return view('jobs.form', compact('job','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
           $request->validate([
               'title' => 'required',
             'department_id' => 'nullable|exists:departments,id',
             'description' => 'nullable',
              'location_type' => 'nullable',
            'address' => 'nullable',
           'city'=> 'nullable',
           'state'=> 'nullable',
            'country'=>'nullable',
             'postal_code' =>'nullable',
           'employment_type' => 'nullable',
               'experience_required'=> 'nullable|integer|min:0',
               'salary_min'=>'nullable|numeric',
            'salary_max' =>'nullable|numeric',
            'opening_date'=> 'nullable|date',
           'closing_date' => 'nullable|date',
           'publish_date'=> 'nullable|date',
            'is_active'=>'boolean'


         ]);


        $job->update($request->all());

           $job->slug = Str::slug($request->title) . '-' . $job->id;
            $job->save();



       return redirect()->route('jobs.index')->with('success','Job Updated successfully.');
    }
    public function jobOpenings(){
        $jobs = Job::where('is_active', true)->with('department')->orderBy('publish_date','desc')->paginate(10);
            return view('jobs.job-openings', compact('jobs'));

          }


          public function jobDetails(Job $job){ //for single job, when user views through the slug page entries using details using a separate controller.. with Model based binding...
            return view('jobs.job-details', compact('job'));

   }
   public function showApplicationForm(Job $job) {

    return view('jobs.job-apply', compact('job'));
}
// In your JobPositionController or a dedicated controller

public function submitApplication(Request $request, Job $job) {
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required',
        'address' => 'required',
        'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'cover_letter' => 'nullable|string',
        'experience' => 'nullable|integer',
        'skills' => 'nullable|string',
        'linkedin_profile' => 'nullable|url',
        'portfolio_website' => 'nullable|url',
    ]);
    // dd($job->id); // Add this line to check the job id
    // Handle file upload
    $resumePath = $request->file('resume')->store('resumes', 'public');

    // Create a new Candidate record
    $candidate = new Candidate();
    $candidate->job_id = $job->id; // Assuming you have a job_id field
    $candidate->full_name = $request->full_name;
    $candidate->email = $request->email;
    $candidate->phone = $request->phone;
    $candidate->address = $request->address;
    $candidate->resume_path = $resumePath;
    $candidate->cover_letter = $request->cover_letter;
    $candidate->experience = $request->experience;
    $candidate->skills = $request->skills;
    $candidate->linkedin_profile = $request->linkedin_profile;
    $candidate->portfolio_website = $request->portfolio_website;

    $candidate->save();

    // Optionally, send a confirmation email to the candidate

    return redirect()->route('job_openings_page')->with('success', 'Application submitted successfully!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {

         $job->delete();

        return redirect()->route('jobs.index')->with('success','Job Deleted successfully.');
    }
}
