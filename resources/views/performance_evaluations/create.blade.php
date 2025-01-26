@extends('layouts.main')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $title ?? (isset($performanceEvaluation) ? 'Edit Performance Evaluation' : 'Create Performance Evaluation') }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('performance_evaluations.index') }}">Performance Evaluations</a></li>
                        <li class="breadcrumb-item active">{{ isset($performanceEvaluation) ? 'Edit' : 'Create' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="{{ isset($performanceEvaluation) ? route('performance_evaluations.update', $performanceEvaluation->id) : route('performance_evaluations.store') }}"
                            method="POST">
                            @csrf
                            @isset($performanceEvaluation)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Performance Evaluation Information</span></h5>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>User <span class="text-danger">*</span></label>
                                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                                                <option value="">Select User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ old('user_id', isset($performanceEvaluation) ? $performanceEvaluation->user_id : '') == $user->id ? 'selected' : '' }}>
                                                        {{ ucwords($user->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Evaluation Cycle</label>
                                        <input type="text" name="evaluation_cycle"
                                            class="form-control @error('evaluation_cycle') is-invalid @enderror"
                                            placeholder="Enter evaluation cycle" value="{{ old('evaluation_cycle', $performanceEvaluation->evaluation_cycle ?? '') }}" >
                                         @error('evaluation_cycle')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Evaluation Date<span class="text-danger">*</span></label>
                                        <input type="date" name="evaluation_date"
                                            class="form-control @error('evaluation_date') is-invalid @enderror"
                                            value="{{ old('evaluation_date', isset($performanceEvaluation) && $performanceEvaluation->evaluation_date ? \Carbon\Carbon::parse($performanceEvaluation->evaluation_date)->format('Y-m-d') : '') }}" required>
                                        @error('evaluation_date')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label>Overall Rating</label>
                                            <input type="text" name="overall_rating"
                                                class="form-control @error('overall_rating') is-invalid @enderror"
                                                placeholder="Enter overall rating" value="{{ old('overall_rating', $performanceEvaluation->overall_rating ?? '') }}">
                                            @error('overall_rating')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <label>Notes</label>
                                        <textarea name="notes" class="form-control @error('notes') is-invalid @enderror"
                                            placeholder="Enter notes" rows="4">{{ old('notes', $performanceEvaluation->notes ?? '') }}</textarea>
                                        @error('notes')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($performanceEvaluation) ? 'Save' : 'Submit' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
