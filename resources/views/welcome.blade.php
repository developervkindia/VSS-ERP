<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VSS ERP Welcome</title>
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/feather.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div>
    <header class="header sticky-top bg-white shadow-sm py-2">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo1.jpeg') }}" alt="Logo" style="height:50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Products item1</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Team</a>
                            <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item" href="#"> Team view Item 1</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('job_openings_page')}}"> Jobs</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>
                    <div class="ms-4 social-icons">
                        <a href="https://facebook.com"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://twitter.com"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://google.com"><i class="fa-brands fa-google"></i></a>
                        <a href="https://linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                    <a href="{{route('login')}}" class="btn btn-primary btn-sm mx-2">Log In</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">Register</a>
                </div>
            </nav>
        </div>
    </header>

    <div class="image0-container position-relative" style="overflow-x: hidden;">
        <img class="image0 img-fluid w-100" src="{{ asset('assets/images/dashboard2-slider-img.jpg') }}" alt="Welcome Banner">
        <div class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="hero-content text-center" style="width: auto; white-space: nowrap;">
                <h1 class="display-4 font-weight-bold mb-4 animated slideInDown" style="animation-duration: 1s; color: white">The Future of your Digital Life</h1>
                <p class="lead mb-5 animated fadeInUp" style="animation-delay: 0.5s;color: white">A unified platform to manage your business resources</p>
            </div>
        </div>
    </div>

    <section>
        <div class="container my-5">
            <div class="row align-items-center py-5">
                <div class="col-lg-5">
                    <div class="about-image text-center wow slideInLeft" data-wow-delay="2s" data-wow-duration="2s">
                        <img class="img-fluid" src="{{ asset('assets/images/about-img.png')}}" alt="" style="max-width: 80%">
                    </div>
                </div>
                <div class="col-lg-7">
                    <h4 class="sub-heading mt-5 animated fadeInRight" data-wow-duration="1s">About Us</h4>
                    <h1 class="titel-style mb-5 mt-4 wow fadeInRight" data-wow-delay="1s" data-wow-duration="1s">We Innovate Digital Goods</h1>
                    <div class="row">
                        <div class="col-lg-6 animated fadeInRight" data-wow-delay="2s" data-wow-duration="1s">
                            <p class="subtitle-style text-secondary">Topre eohen derit in voluptate velit esse cillum Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod te mpor incididunt ut labore et dolore ma gna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco</p>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="2.5s" data-wow-duration="1s">
                            <p class="subtitle-style text-secondary">Topre eohen derit in voluptate velit esse cillum Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod te mpor incididunt ut labore et dolone</p>
                        </div>
                    </div>
                    <a class="link-style mt-5 wow fadeInUp" data-wow-delay="2.8s" data-wow-duration="1s" href="">More about us</a>
                </div>
            </div>
        </div>
    </section>
    <section class="container my-5">
        <div class="row py-5">
          <div class="col-lg-6">
            <h4 class="sub-heading mt-5">Service</h4>
            <h1 class="titel-style mb-5 mt-3">Industry Standard Service</h1>
            <div class="row">
              <div class="col-lg-6">
                <div class="service-card">
                  <div class="service-icon my-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-stack" viewBox="0 0 16 16">
                      <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
                      <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
                    </svg>
                  </div>
                  <h1 class="sub-heading text-dark">Web Solutions</h1>
                  <p class="subtitle-style">Dunt ut labore et dolore ma gna aliquaim ad minim</p>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="service-card">
                  <div class="service-icon my-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tablet" viewBox="0 0 16 16">
                      <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                      <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                  </div>
                  <h1 class="sub-heading text-dark">Mobile Application</h1>
                  <p class="subtitle-style">Dunt ut labore et dolore ma gna aliquaim ad minim</p>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="service-card">
                  <div class="service-icon my-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                    </svg>
                  </div>
                  <h1 class="sub-heading text-dark">Digital Marketing</h1>
                  <p class="subtitle-style">Dunt ut labore et dolore ma gna aliquaim ad minim</p>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="service-card">
                  <div class="service-icon my-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                      <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg>
                  </div>
                  <h1 class="sub-heading text-dark">Consultancy</h1>
                  <p class="subtitle-style">Dunt ut labore et dolore ma gna aliquaim ad minim</p>
                </div>
              </div>

              </div>
          </div>
          <div class="col-lg-6">
            <div class="service-image wow slideInRight  data-wow-delay=1s data-wow-duration=2s">
              <img class="service-img" src="{{ asset('assets/images/service-img.png')}}" alt="">
            </div>
          </div>
        </div>
      </section>


    <section class="full-width-section py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 wow slideInLeft" data-wow-delay="2s" data-wow-duration="1s">
                    <img class="img-fluid Why-Choose-img" src="{{ asset('assets/images/feature-img.png')}}" alt="">
                </div>
                <div class="why-style col-lg-6 py-5">
                    <h4 class="sub-heading mt-5 animated fadeInRight" data-wow-delay="0.5s" data-wow-duration="1s">Why Choose Us</h4>
                    <h1 class="titel-style mb-5 mt-3 animated fadeInRight" data-wow-delay="0.7s" data-wow-duration="1s">Never compromise with Quality</h1>
                    <div class="row">
                        <div class="col-lg-1">
                            <i class="fa-solid fa-check fa-2xl" style="color: #6c63ff;"></i>
                        </div>
                        <div class="col-lg-11">
                            <p class="subtitle-style">Dunt ut labore et dolore ma gna aliquaim ad minim vul koreo amare ki mone pore na ami todiba.</p>
                        </div>
                        <div class="col-lg-1">
                            <i class="fa-solid fa-check fa-2xl" style="color: #6c63ff;"></i>
                        </div>
                        <div class="col-lg-11">
                            <p class="subtitle-style">Praesent mattis, orci in vulputate ultrices, turpis ipsum imp erdiet nibh, in porta lectus diam non nis.</p>
                        </div>
                        <div class="col-lg-1">
                            <i class="fa-solid fa-check fa-2xl" style="color: #6c63ff;"></i>
                        </div>
                        <div class="col-lg-11">
                            <p class="subtitle-style">Vamus ut massa non felis fermentum convallis at ac urna. Sed vitae purus soda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row py-5 text-center">
            <div class="col-lg-6 mx-auto">
                <h4 class="sub-heading mt-5">Our Product</h4>
                <h1 class="titel-style mb-5 mt-3">We Develop Amazing Products</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 my-4">
                <div class="mycard text-center p-5 shadow">
                    <h1 class="sub-heading text-dark">Custom CMS</h1>
                    <img class="my-5 img-fluid" src="{{ asset('assets/images/product-icon1.png')}}" alt="">
                    <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
                    <a href="" class="link-style mt-5">View Details</a>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="mycard text-center p-5 shadow">
                    <h1 class="sub-heading text-dark">Blogging Tool</h1>
                    <img class="my-5 img-fluid" src="{{ asset('assets/images/product-icon2.png')}}" alt="">
                    <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
                    <a href="" class="link-style mt-5">View Details</a>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="mycard text-center p-5 shadow">
                    <h1 class="sub-heading text-dark">Photo Editor</h1>
                    <img class="my-5 img-fluid" src="{{ asset('assets/images/product-icon3.png')}}" alt="">
                    <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
                    <a href="" class="link-style mt-5">View Details</a>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="mycard text-center p-5 shadow">
                    <h1 class="sub-heading text-dark">Accounting App</h1>
                    <img class="my-5 img-fluid" src="{{ asset('assets/images/product-icon4.png')}}" alt="">
                    <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
                    <a href="" class="link-style mt-5">View Details</a>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="mycard text-center p-5 shadow">
                    <h1 class="sub-heading text-dark">Keyword Tool</h1>
                    <img class="my-5 img-fluid" src="{{ asset('assets/images/product-icon5.png')}}" alt="">
                    <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
                    <a href="" class="link-style mt-5">View Details</a>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="mycard text-center p-5 shadow">
                    <h1 class="sub-heading text-dark">Social Media Tool</h1>
                    <img class="my-5 img-fluid" src="{{ asset('assets/images/product-icon6.png')}}" alt="">
                    <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
                    <a href="" class="link-style mt-5">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="sub-heading mt-5"> Features </h4>
                <h1 class="title-style mb-5 mt-3"> Top Features that Keep Us Ahed</h1>
                <p class="subtitle-style">Phasellus seiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                <div class="row mt-5">
                    <div class="col-lg-2">
                        <div class="feature-icon">
                            <i class="fa-solid fa-lightbulb fa-2xl" style="color: #ffffff;"></i>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="sub-heading text-dark"> Developer Friendly Design</h1>
                        <p class="subtitle-style mb-4">Phasellus seiusmod tempor incididunt ut labore et dolore magna aliqu ad minim veniam </p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-2">
                        <div class="feature-icon">
                            <i class="fa-solid fa-lightbulb fa-2xl" style="color: #ffffff;"></i>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <h1 class="sub-heading text-dark"> Best User Experience</h1>
                        <p class="subtitle-style mb-4">Phasellus seiusmod tempor incididunt ut labore et dolore magna aliqu ad minim veniam </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow slideInRight" data-wow-delay="1s" data-wow-duration="2s">
                <img src="{{ asset('assets/images/feature2-img.png')}}" alt="">
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row py-5 text-center">
            <div class="col-lg-6 mx-auto">
                <h4 class="sub-heading mt-5">Latest News</h4>
                <h1 class="titel-style mb-4 mt-3">Form Our Blog</h1>
                <p class="subtitle-style">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="shadow blog-card">
                    <div class="overflow-hidden">
                        <img src="{{ asset('assets/images/blog-img1.jpg')}}" alt="">
                    </div>
                    <div class="p-4">
                        <p class="subtitle-style text-secondary mb-0">February 04, 2020</p>
                        <a class="link-style blog-link" href="">Lets make the begging to mankind to save the world again</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="shadow blog-card">
                    <div class="overflow-hidden">
                        <img src="{{ asset('assets/images/blog-img2.jpg')}}" alt="">
                    </div>
                    <div class="p-4">
                        <p class="subtitle-style text-secondary mb-0">February 04, 2020</p>
                        <a class="link-style blog-link" href="">Lets make the begging to mankind to save the world again</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="shadow blog-card">
                    <div class="overflow-hidden">
                        <img src="{{ asset('assets/images/blog-img3.jpg')}}" alt="">
                    </div>
                    <div class="p-4">
                        <p class="subtitle-style text-secondary mb-0">February 04, 2020</p>
                        <a class="link-style blog-link" href="">Lets make the begging to mankind to save the world again</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="totop" onclick="document.body.scrollTop=0;document.documentElement.scrollTop=0;event.preventDefault()"><i class="fa-solid fa-angles-up"></i></a>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
  </body>
</html>
