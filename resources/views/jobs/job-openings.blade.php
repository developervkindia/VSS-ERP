<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Job Openings</title>

    <link rel="shortcut icon" href="{{asset('assets/img/favicon1.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/plugins/feather/feather.css')}}">
     <link rel="stylesheet" href="{{asset('assets/plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body>
    {{--Include new Header component--}}
       @include('components.public-header')
         {{-- Above included all bootstrap / icon styles and scripts to be correctly used  using component from file path (check this exists correctly).. All links to layout from available assets is given with paths here to maintain structure if styles are required for this component in pages too where you reuse. Also layouts must inherit/ include style before all content starts to enable component css style to reflect too, inside body or other layout divs/tags of each HTML content area/sections.. if page have any specific container element design/tags that may override components default styles please double check your code where content rendering happens or layout elements that are added with components to ensure proper view rendering for css design rules of components used.--}}


<div class="page-wrapper">
        <div class="content container-fluid">
             {{--All sections below now displays data using new components on correct html or css tags too for page views. including `content` block of section data and its design, ensure the links / route to data source too. (Controllers, model , data record display for this view.)
      All links used are from  previous pages layout for list views and other page navigation components etc . Please refer all available files and resources path or linked file using same directory where files previously exist . as design style --}}


              <div class="row">
                      @if ($jobs->count() > 0)
                         @foreach ($jobs as $job)
                            <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                              <div class="blog grid-blog flex-fill">
                                  <div class="blog-image">

                                       <a href="job-openings/{{$job->slug}}"> <img class="img-fluid" src="{{asset('assets/img/category/blog-1.jpg')}}" alt="Post Image"></a>
                                    <div class="blog-views">
                                      <i class="feather-eye me-1"></i> 225  {{-- dynamic number needed from other context, using counters , if used any on models or components--}}
                                    </div>
                                  </div>
                                  <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                         <li>
                                            <div class="post-author">
                                                <a href="#">  {{-- optional to reuse author page view for employee --}}

                                                   <span>
                                                      <span class="post-title">{{$job->title}}</span>  {{--short data record title using html with CSS attribute with text, from tables etc--}}
                                                        <span class="post-date"> <i class="far fa-clock"></i> {{ $job->created_at->format('d M Y') }}</span>   {{-- model object creation date of the tables entry used with layout tags as text and with styling as css..  --}}
                                                     </span>
                                                </a>
                                            </div>
                                       </li>
                                   </ul>

                                     <h3 class="blog-title"> <a href="job-openings/{{$job->slug}}">{{ $job->title}}</a></h3>
                                      <p>
                                          {{Str::limit($job->description,150) }} {{-- string truncate the text with certain number from field descriptions etc with character numbers (limit it). or just use the normal full text descriptions if your view requires--}}
                                        </p>
                                  </div>

                             </div>
                           </div>
                        @endforeach
                         @else
                          <div class="col-12">No records available..</div>
                     @endif

              </div>
          {{-- <div class="row ">
             <div class="col-md-12">
                <div class="pagination-tab  d-flex justify-content-center">
                       {{ $jobs->links() }}
                </div>
               </div>
           </div> --}}
       </div>
 </div>

 <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('assets/js/feather.min.js')}}"></script>
   <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
   <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>

</body>
</html>
