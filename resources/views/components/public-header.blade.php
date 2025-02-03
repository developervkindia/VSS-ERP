<header class="header  sticky-top bg-white shadow-sm py-2" >  {{-- Add your preferred top padding. , make sticky, for layout changes, or changes required, to add components before (navbar/menus). Using default styling to be compatible on your previous designs too, including background etc   --}}
    {{--  keep as similar pattern or design , all your CSS for views must be loaded in header tag section of `HTML` from where this components file will be included  as with available bootstrap and assets libraries also available. for all views where these components might exists.. if there are any styles needed those CSS must exists in <head> .. tags on all your pages
--}}

  <div class="container">
     <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="{{url('/')}}">  {{--  assuming route of url('/') exists or add url where the component exists if homepage is not on `/` and using  site front route page (home or whatever).    --}}
                  <img src="{{ asset('assets/img/logo1.jpeg') }}" alt="Logo" style="height:50px;">
             </a>
             {{-- The URL uses blade components (for  front routes) based upon context, You must implement and store these icons etc on correct storage paths too where all css, script, icon libraries or img folder. if you are testing this section out  , or just change based on route URLs accordingly  using relative paths too --}}


       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
       </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
                 <ul class="navbar-nav ms-auto">

                          {{-- Add additional items in list if more options available using below similar elements.. for Menu list etc
                    }}
                   <li class="nav-item">  {{-- for single list no drop down use directly list elements as navigation links , make sure link exists --}}
                      <a class="nav-link"  href="#">Home </a>   {{-- you should correctly replace hrefs to correct url here for each option using `route('')`   --}}

                 </li>

                   <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Jobs
                      </a>
                       <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           <li><a class="dropdown-item" href="{{route('job_openings_page')}}">Job Openings</a></li>
                        {{-- add additional navigation menus here --}}
                     </ul>

                  </li>



                    <li class="nav-item dropdown">   {{--  using user or account, this depends on user, (not guest type login if you need them) (only required for public users and their loggedin UI elements ) --}}
                         <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account  {{-- You can show data based upon user etc here dynamically --}}
                             </a>
                                <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                    {{-- Add action for user menus that exist from other examples such as  My Account Profile view , logout link , login etc . as required ( those action methods are located somewhere with route too if designed)  --}}
                                      <li> <a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                                      {{-- This login, can be other form, with specific login link, where authentication system (from existing files like web middleware etc) is accessed using specific users session variables --}}
                                     <li> <a class="dropdown-item" href="{{ route('register')}}">Register</a></li>

                                  </ul>
                        </li>

                         {{-- all items should be styled with existing bootstrap 5 class attributes using `nav-item`,  and correct Bootstrap dropdown style and CSS, you may use all available properties on HTML such as onclick if java script logic is needed. etc using classes   --}}


                  </ul>
               </div>
          </nav>
       </div>
  </header>
