<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ $job->title }} - Job Details</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">  {{-- Make sure to include animate.css for WOW animations --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<div class="main-wrapper">
    @include('components.public-header')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title wow fadeInUp" data-wow-delay="0.2s">{{ $job->title }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('job_openings_page') }}">Job Openings</a></li>
                            <li class="breadcrumb-item active">Job Details</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2"> {{-- Center the card --}}
                    <div class="card wow fadeIn" data-wow-delay="0.4s"> {{-- Add shadow and animation --}}
                        <div class="card-body">
                            <div class="blog-image">
                                <img class="img-fluid" src="{{ asset('assets/img/category/blog-1.jpg') }}" alt="Post Image">
                            </div>
                            <h3 class="blog-title mt-4">{{ $job->title }}</h3>
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a>
                                            <span>
                                                <span class="post-date"><i class="far fa-clock"></i> {{ $job->created_at->format('d M Y') }}</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <div class="mt-4">
                                <h6 class="card-title">Job Description</h6>
                                <p class="text-justify">{{ $job->description }}</p>
                                <ul class="list-group list-group-flush mt-4">
                                    <li class="list-group-item"><b>Department:</b> {{ $job->department?->name ?? "N/A" }}</li>
                                    <li class="list-group-item"><b>Location:</b> {{ $job->address }}, {{ $job->city }}, {{ $job->state }}, {{ $job->country }}, {{ $job->postal_code }}</li>
                                    <li class="list-group-item"><b>Experience Required:</b> {{ $job->experience_required }} years</li>
                                    <li class="list-group-item"><b>Employment Type:</b> {{ $job->employment_type }}</li>
                                    <li class="list-group-item"><b>Salary:</b> {{ $job->salary_min }} to {{ $job->salary_max }}</li>
                                    <li class="list-group-item"><b>Location Type:</b> {{ $job->location_type }}</li>
                                </ul>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <a href="{{ route('job.apply.form', $job->slug) }}" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js')}}"></script>  {{-- Include WOW.js --}}
<script>
    new WOW().init();
</script>
</body>
</html>
