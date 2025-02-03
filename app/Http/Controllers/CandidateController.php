<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use App\Models\User;
use App\Notifications\NewCandidateApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $candidates = Candidate::with(['job', 'notes.user']) // Eager load the job and notes with user
            ->where('status', 'Applied')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('candidates.index', compact('candidates'));
    }

    // ... other methods for showing the form, etc. ...

    public function updateStatus(Request $request, Candidate $candidate)
    {
        $request->validate([
            'status' => 'required|in:Applied,Reviewed,Shortlisted,Contacted,Rejected',
        ]);

        $candidate->update(['status' => $request->status]);

        return response()->json(['message' => 'Candidate status updated successfully.']);
    }

    public function addNote(Request $request, Candidate $candidate)
    {
        $request->validate([
            'note' => 'required|string',
        ]);

        $candidate->notes()->create([
            'user_id' => Auth::id(),
            'note' => $request->note,
        ]);

        return response()->json(['message' => 'Note added successfully.']);
    }

    public function updateRating(Request $request, Candidate $candidate)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $candidate->update(['rating' => $request->rating]);

        return response()->json(['message' => 'Rating updated successfully.']);
    }
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

            try {
                // Handle file upload
                $resumePath = $request->file('resume')->store('resumes', 'public');

                // Create a new Candidate record
                $candidate = new Candidate();
                $candidate->job_id = $job->id; // Use the job_id from the route model binding
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
                $hrUsers = User::where('role', 'hr')->get(); // Assuming you have an 'hr' role
                Notification::send($hrUsers, new NewCandidateApplication($candidate));
                // Optionally, send a confirmation email to the candidate

                return redirect()->route('job_openings_page')->with('success', 'Application submitted successfully!');

            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->getCode() === '23000') { // Integrity constraint violation
                    return redirect()->back()->with('error', 'The job you were applying for no longer exists.');
                } else {
                    // Handle other potential database errors
                    return redirect()->back()->with('error', 'An error occurred while submitting your application.');
                }
            }
    }
}
