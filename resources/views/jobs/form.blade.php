@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{ isset($job) ? 'Edit Job' : 'Create Job' }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Jobs</a></li>
                    <li class="breadcrumb-item active">{{ isset($job) ? 'Edit' : 'Create' }}</li>
                </ul>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-body">
                     <form action="{{ isset($job) ? route('jobs.update', $job->id) : route('jobs.store') }}" method="POST">
                        @csrf
                        @isset($job)
                         @method('PUT')
                         @endisset
                         <div class="row">
                              <div class="col-12">
                                 <h5 class="form-title"><span>Job Details</span></h5>
                              </div>

                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                   <label>Title<span class="text-danger">*</span></label>
                                   <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Job Title" value="{{old('title', $job->title ?? '') }}" required/>
                                  @error('title')
                                        <span class="text-danger text-sm">{{$message}}</span>
                                   @enderror
                               </div>
                             </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                     <label>Department</label>
                                     <select class="form-control @error('department_id') is-invalid @enderror" name="department_id"   >
                                          <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{old('department_id', $job->department_id ?? '') == $department->id ? 'selected' : ''}} >
                                               {{ ucwords($department->name) }}
                                          </option>
                                       @endforeach
                                     </select>
                                          @error('department_id')
                                               <small class="text-danger">{{ $message }}</small>
                                           @enderror
                                </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group local-forms">
                                      <label>Location Type</label>
                                          <select name="location_type"  class="form-control">
                                                <option value="onsite"  {{old('location_type',$job->location_type??'') == "onsite"  ? 'selected': ''}} >Onsite</option>
                                                 <option value="remote"  {{old('location_type',$job->location_type??'')  == 'remote' ? 'selected' : ''}} >Remote</option>
                                                   <option value="hybrid"  {{old('location_type',$job->location_type??'') == 'hybrid' ? 'selected' : ''}}>Hybrid</option>
                                                  <option value="custom"  {{old('location_type',$job->location_type??'') == "custom" ? 'selected' : ''}} >Custom</option>
                                        </select>
                                    </div>
                             </div>

                             <div class="col-md-6">
                                <div class="form-group local-forms">
                                          <label>Address</label>
                                          <input type="text" name="address"   class="form-control"    placeholder="Enter address"  value="{{ old('address',  $job->address ?? '' )}}" />
                                 </div>
                            </div>

                             <div class="col-md-6">
                                 <div class="form-group local-forms">
                                      <label>City</label>
                                    <input type="text" name="city" class="form-control"   placeholder="Enter city" value="{{ old('city',  $job->city ?? '' ) }}"  />
                                  </div>
                             </div>
                              <div class="col-md-6">
                                <div class="form-group local-forms">
                                   <label>State</label>
                                      <input type="text" name="state" class="form-control"   placeholder="Enter state"  value="{{old('state',  $job->state ?? '')  }}" />
                                </div>
                             </div>
                              <div class="col-md-6">
                                  <div class="form-group local-forms">
                                     <label>Postal Code</label>
                                          <input type="text" name="postal_code" class="form-control"   placeholder="Enter postal code" value="{{ old('postal_code',$job->postal_code ?? '' )  }}" />
                                    </div>
                              </div>
                             <div class="col-md-6">
                                 <div class="form-group local-forms">
                                       <label>Country</label>
                                   <input type="text" name="country"  class="form-control"  placeholder="Enter country" value="{{old('country',  $job->country ?? '' ) }}" />
                                 </div>
                              </div>


                             <div class="col-md-6">
                                  <div class="form-group local-forms">
                                        <label>Employment Type</label>
                                     <select name="employment_type" class="form-control">
                                         <option value="Full Time"  {{old('employment_type', $job->employment_type ?? '') == 'Full Time' ? 'selected' : ''}} >Full Time</option>
                                             <option value="Part Time"  {{ old('employment_type',$job->employment_type?? '')== 'Part Time' ? 'selected': ''}}  >Part Time</option>
                                        <option value="Contract" {{ old('employment_type',$job->employment_type??'')== "Contract" ? "selected" : ""}}>Contract</option>
                                      </select>
                                   </div>
                            </div>

                            <div class="col-md-6">
                                  <div class="form-group local-forms">
                                      <label>Experience Required</label>
                                      <input type="number"  min="0"  max="25" class="form-control" name="experience_required" value="{{ old('experience_required',$job->experience_required ?? '' )}}"/>
                                 </div>
                             </div>

                            <div class="col-md-6">
                                  <div class="form-group local-forms">
                                    <label>Salary Min</label>
                                  <input type="number"  min="0"  name="salary_min"  class="form-control"  placeholder="Minimum Salary" value="{{ old('salary_min', $job->salary_min ?? '')}}"/>
                               </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                   <label>Salary Max</label>
                                    <input type="number"  min="0"  name="salary_max" class="form-control"  placeholder="Maximum Salary"   value="{{ old('salary_max', $job->salary_max ?? '' )}}"/>
                              </div>
                            </div>
                               <div class="col-md-6">
                                  <div class="form-group local-forms">
                                         <label>Opening Date</label>
                                          <input type="date" name="opening_date"  class="form-control"   value="{{ old('opening_date',  $job->opening_date ?? '' )}}"/>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group local-forms">
                                  <label>Closing Date</label>
                                    <input type="date"  name="closing_date" class="form-control"    value="{{old('closing_date',  $job->closing_date ?? '')}}"/>
                                </div>
                             </div>
                             <div class="col-md-6">
                                  <div class="form-group local-forms">
                                   <label>Publish Date</label>
                                       <input type="datetime-local"  name="publish_date"   class="form-control"  value="{{  old('publish_date', $job->publish_date ?? '')}}"   />

                                  </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group local-forms">
                                    <label>Job Description</label>
                                      <textarea  name="description"  class="form-control" rows="4" placeholder="Enter description"  >  {{ old('description',  $job->description ?? '') }}  </textarea>

                                </div>
                             </div>
                             <div class="col-12">
                               <button type="submit" class="btn btn-primary">{{ isset($job) ? 'Update' : 'Submit' }}</button>
                             </div>
                      </div>

                    </form>
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection
