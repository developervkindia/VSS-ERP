<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Apply for Job</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    {{-- Add any additional CSS files here --}}

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>

@include('components.public-header')

<div class="content container-fluid" style="margin-top: 80px;"> {{-- Adjust margin-top as needed --}}

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Apply for {{ $job->title }}</h4>
                      <form action="{{ route('job.apply.submit', $job->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
  <input type="hidden" name="job_id" value="{{ $job->id }}">

                       <div class="form-group">
                         <label for="full_name">Full Name</label>
                         <input type="text" id="full_name" name="full_name" class="form-control" required>
                          </div>

                       <div class="form-group">
                         <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                        <div class="form-group">
                           <label for="phone">Phone</label>
                          <input type="tel" id="phone" name="phone" class="form-control" required>
                       </div>

                    <div class="form-group">
                         <label for="address">Address</label>
                         <input type="text" id="address" name="address" class="form-control" required>
                      </div>
                       <div class="form-group">
                         <label for="resume">Resume/CV</label>
                        <input type="file" id="resume" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                          </div>

                      <div class="form-group">
                         <label for="cover_letter">Cover Letter (Optional)</label>
                       <textarea id="cover_letter" name="cover_letter" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                   <label for="experience">Years of Experience</label>
                    <input type="number" id="experience" name="experience" class="form-control" min="0">
                        </div>

                    <div class="form-group">
                 <label for="skills">Skills (comma-separated)</label>
              <input type="text" id="skills" name="skills" class="form-control">
                 </div>

                 <div class="form-group">
              <label for="linkedin_profile">LinkedIn Profile (Optional)</label>
             <input type="url" id="linkedin_profile" name="linkedin_profile" class="form-control">
                   </div>

                  <div class="form-group">
                <label for="portfolio_website">Portfolio Website (Optional)</label>
              <input type="url" id="portfolio_website" name="portfolio_website" class="form-control">
                      </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit Application</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
 <script src="{{ asset('assets/js/wow.min.js')}}"></script>
   <script>   new WOW().init(); </script>  {{-- Add more custom JavaScript if needed --}}
</body>
</html>
