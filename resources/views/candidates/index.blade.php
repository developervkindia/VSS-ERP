@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Candidates</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    {{-- Assuming you have a dashboard route --}}
                    <li class="breadcrumb-item active">Candidates</li>
                </ul>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Candidates</h3>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table
                            class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Job Applied For</th>
                                    <th>Status</th>
                                    <th>Rating</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $key => $candidate)
                                <tr>
                                    <td>{{ $candidates->firstItem() + $key }}</td>
                                    <td>{{ $candidate->full_name }}</td>
                                    <td>{{ $candidate->email }}</td>
                                    <td>{{ $candidate->phone }}</td>
                                    <td>{{ $candidate->job->title }}</td>
                                    <td id="status-{{ $candidate->id }}">{{ $candidate->status }}</td>
                                    <td>
                                        <select class="form-select rating-select"
                                            data-candidate-id="{{ $candidate->id }}">
                                            <option value="">Not Rated</option>
                                            @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}" {{ $candidate->rating
                                                == $i ? 'selected' : '' }}>
                                                {{ $i }} stars
                                                </option>
                                                @endfor
                                        </select>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <a href="#" class="btn btn-sm btn-info me-2" data-bs-toggle="modal"
                                                data-bs-target="#viewCandidateModal-{{ $candidate->id }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="btn btn-sm btn-info update-status me-2"
                                                data-candidate-id="{{ $candidate->id }}" data-status="Reviewed">
                                                <i class="fas fa-clipboard-check"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary me-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#addNoteModal-{{ $candidate->id }}">
                                                <i class="fas fa-file-alt"></i>
                                            </button>
                                            <a href="{{ Storage::url($candidate->resume_path) }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Add Note Modal --}}
                                <div class="modal fade" id="addNoteModal-{{ $candidate->id }}" tabindex="-1"
                                    aria-labelledby="addNoteModalLabel-{{ $candidate->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNoteModalLabel-{{ $candidate->id }}">Add
                                                    Note for
                                                    {{ $candidate->full_name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form class="add-note-form" data-candidate-id="{{ $candidate->id }}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="note-content-{{ $candidate->id }}">Note:</label>
                                                        <textarea name="note" id="note-content-{{ $candidate->id }}"
                                                            class="form-control" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary save-note"
                                                        data-candidate-id="{{ $candidate->id }}">Save Note</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- View Candidate Details Modal --}}
                                <div class="modal fade" id="viewCandidateModal-{{ $candidate->id }}" tabindex="-1"
                                    aria-labelledby="viewCandidateModalLabel-{{ $candidate->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"
                                                    id="viewCandidateModalLabel-{{ $candidate->id }}">
                                                    <i class="fas fa-user text-primary"></i> Candidate Details:
                                                    {{ $candidate->full_name }}
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {{-- Personal Information Card --}}
                                                        <div class="card mb-4">
                                                            <div class="card-header bg-light">
                                                                <h5 class="card-title mb-0">Personal Information</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row mb-2">
                                                                    <div class="col-4 fw-bold">Full Name:</div>
                                                                    <div class="col-8">{{ $candidate->full_name }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-4 fw-bold">Email:</div>
                                                                    <div class="col-8"><span
                                                                            class="badge bg-secondary">{{
                                                                            $candidate->email }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-4 fw-bold">Phone:</div>
                                                                    <div class="col-8"><span
                                                                            class="badge bg-secondary">{{
                                                                            $candidate->phone }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-4 fw-bold">Address:</div>
                                                                    <div class="col-8">{{ $candidate->address }}</div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-4 fw-bold">LinkedIn:</div>
                                                                    <div class="col-8">{!! $candidate->linkedin_profile
                                                                        ? '<a href="' .
                                                                                    $candidate->linkedin_profile . '"
                                                                            target="_blank" class="badge bg-primary">' .
                                                                            $candidate->linkedin_profile . '</a>' :
                                                                        'N/A' !!}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-4 fw-bold">Portfolio:</div>
                                                                    <div class="col-8">{!! $candidate->portfolio_website
                                                                        ? '<a href="' .
                                                                                    $candidate->portfolio_website . '"
                                                                            target="_blank" class="badge bg-primary">' .
                                                                            $candidate->portfolio_website . '</a>' :
                                                                        'N/A' !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Application Details Card --}}
                                                        <div class="card mb-4">
                                                            <div class="card-header bg-light">
                                                                <h5 class="card-title mb-0">Application Details
                                                                </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row mb-2">
                                                                    <div class="col-5 fw-bold">Job Applied For:
                                                                    </div>
                                                                    <div class="col-7"><span class="badge bg-info">{{
                                                                            $candidate->job->title }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-5 fw-bold">Status:</div>
                                                                    <div class="col-7"><span
                                                                            id="modal-status-{{ $candidate->id }}"
                                                                            class="badge bg-success">{{
                                                                            $candidate->status }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-5 fw-bold">Rating:</div>
                                                                    <div class="col-7"><span
                                                                            id="modal-rating-{{ $candidate->id }}">
                                                                            @if ($candidate->rating)
                                                                            @for ($i = 1; $i <= 5; $i++) @if ($i
                                                                                <=$candidate->rating)
                                                                                <i class="fas fa-star text-warning"></i>
                                                                                @else
                                                                                <i class="far fa-star text-warning"></i>
                                                                                @endif
                                                                                @endfor
                                                                                @else
                                                                                <span class="badge bg-secondary">Not
                                                                                    Rated</span>
                                                                                @endif
                                                                        </span></div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-5 fw-bold">Experience:</div>
                                                                    <div class="col-7"><span
                                                                            class="badge bg-secondary">{{
                                                                            $candidate->experience ?? 'N/A' }}
                                                                            years</span></div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-5 fw-bold">Skills:</div>
                                                                    <div class="col-7"><span
                                                                            class="badge bg-secondary">{{
                                                                            $candidate->skills ?? 'N/A' }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-5 fw-bold">Resume:</div>
                                                                    <div class="col-7"><a
                                                                            href="{{ Storage::url($candidate->resume_path) }}"
                                                                            target="_blank"
                                                                            class="btn btn-sm btn-outline-primary">View
                                                                            Resume</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header bg-light">
                                                                <h5 class="card-title mb-0">Cover Letter</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                @if ($candidate->cover_letter)
                                                                <p>{{ $candidate->cover_letter }}</p>
                                                                @else
                                                                <p class="text-muted">Not provided.</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header bg-light">
                                                                <h5 class="card-title mb-0">Notes</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <ul id="notes-list-{{ $candidate->id }}"
                                                                    class="list-group">
                                                                    @forelse ($candidate->notes as $note)
                                                                    <li class="list-group-item">
                                                                        <i class="fas fa-comment text-secondary"></i>
                                                                        {{ $note->note }}
                                                                        <span class="text-muted small">- Added
                                                                            by {{ $note->user->name }} on
                                                                            {{ $note->created_at->format('d M Y')
                                                                            }}</span>
                                                                    </li>
                                                                    @empty
                                                                    <li class="list-group-item">No notes yet.
                                                                    </li>
                                                                    @endforelse
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $candidates->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
            // Update Status
            $('.update-status').click(function() {
                let candidateId = $(this).data('candidate-id');
                let newStatus = $(this).data('status');
                let button = $(this);

                $.ajax({
                    url: `/candidates/${candidateId}/update-status`,
                    method: 'POST',
                    data: {
                        status: newStatus,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update the status in the UI (both in the table and the modal)
                        $(`#status-${candidateId}`).text(newStatus);
                        $(`#modal-status-${candidateId}`).text(newStatus); // Update in modal
                        button.text('Status Updated').prop('disabled', true);
                        alert(response.message);
                    },
                    error: function(error) {
                        console.error("An error occurred:", error);
                        alert('Failed to update status.');
                    }
                });
            });

            // Add Note
            $('.add-note-form').on('submit', function(e) {
                e.preventDefault();
                let candidateId = $(this).data('candidate-id');
                let noteContent = $('#note-content-' + candidateId).val();

                $.ajax({
                    url: `/candidates/${candidateId}/add-note`,
                    method: 'POST',
                    data: {
                        note: noteContent,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Close the modal
                        $(`#addNoteModal-${candidateId}`).modal('hide');
                        alert(response.message);

                        // Prepend the new note to the notes list in the modal
                        let newNote = `<li>${noteContent} (Added by: {{ Auth::user()->name }} on {{ now()->format('d M Y') }})</li>`;
                        $(`#notes-list-${candidateId}`).prepend(newNote);

                        $('#note-content-' + candidateId).val(''); // Clear the textarea
                    },
                    error: function(error) {
                        console.error("An error occurred:", error);
                        alert('Failed to add note.');
                    }
                });
            });

            // Update Rating using dropdown
            $('.rating-select').change(function() {
                let candidateId = $(this).data('candidate-id');
                let newRating = $(this).val();

                $.ajax({
                    url: `/candidates/${candidateId}/update-rating`,
                    method: 'POST',
                    data: {
                        rating: newRating,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update the rating display in the modal (if open)
                        let stars = '';
                        for (let i = 1; i <= 5; i++) {
                            stars += i <= newRating ? '<i class="fas fa-star text-warning"></i>' : '<i class="far fa-star text-warning"></i>';
                        }
                        $(`#modal-rating-${candidateId}`).html(stars);

                        alert(response.message);
                    },
                    error: function(error) {
                        console.error("An error occurred:", error);
                        alert('Failed to update rating.');
                    }
                });
            });
        });
</script>
@endsection
