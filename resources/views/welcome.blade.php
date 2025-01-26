<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2050</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" src="{{ asset('assets/css/animate.css')}}">
    <link rel="stylesheet" src="{{ asset('assets/css/mystyle.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  </head>

  <body>

    <div>
      <img class="image0" src="{{ asset('assets/images/dashboard2-slider-img.jpg') }}" alt="">

      <!-- Navbar start -->
      <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Your Logo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Logo -->
          <div class="col-xl-3 col-lg-2 col-md-3 col-sm-3 col-4">
            <div class="logo d-inline-block">
              <a href="index.html"><img class="image-logo" src="{{ asset('assets/images/logo-white.png" alt="Your Logo')}}"></a>
            </div>
          </div>
          <!-- /Logo -->

          <!-- Navigation Links -->
          <div class="collapse navbar-collapse m-auto nb-2 mb-lg-0" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
          <!-- /Navigation Links -->

          <!-- Social Media Icons -->
          <div class="social-icons">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
              <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
              <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
            </svg>
          </div>
          <!-- /Social Media Icons -->
        </div>
      </nav>
      <!-- /Navbar -->
    </div>


    <!-- navbar end -->

      <!--banner start  -->
      <section>
        <div class="container">
          <div class="row">
            <div class="col-5">

              <h1 class="text-white  pb-15">
                The Futire of your Digital Life
              </h1>
              <a href="">
                Full Story
              </a>
            </div>
            <div class="col-2">
              <span class="f-600 text-white d-block mb-45">
                <img src="{{ asset('assets/images/dashboard2-slider-icon.png')}}" alt="">
              </span>
            </div>
            <div class="col-5"></div>
          </div>
        </div>
      </section>
      <!-- about-area-start -->
    <div class="container my-5">
        <div class="row align-items-center py-5">
            <div class="col-lg-5">
                <div class="about-image text-center wow slideInLeft  data-wow-delay=2s data-wow-duration=2s">
                    <img src="{{ asset('assets/images/about-img.png')}}" alt="">
                </div>
                <!-- image -->
            </div>
            <!-- /col -->
            <div class="col-lg-7">
               <h4 class="sub-heading mt-5">About Us</h4>
                <h1 class="titel-style mb-5 mt-4">We Innovate Digital Goods</h1>
                <div class="row ">
                  <div class="col-lg-6">
                    <p class="subtitle-style">
                      Topre eohen derit in voluptate velit esse cillum Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod te mpor incididunt ut labore et dolore ma gna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco
                    </p>
                  </div>
                    <div class="col-lg-6">
                      <p class="subtitle-style">
                        Topre eohen derit in voluptate velit esse cillum Lorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod te mpor incididunt ut labore et dolone
                      </p>
                    </div>
                  </div>
                  <a class="link-style mt-5" href="">More about us </a>
                </div>
              </div>
                </div>
                <!-- /about content -->
            </div>
<!-- about-area-end -->

<!-- =====service-area-start======================================= -->
<div class="container my-5">
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
</div>


<!-- /service-area-end -->

<!-- ====== feauture-area-start========================================================= -->
<section class="full-width-section py-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-6">
        <img class="Why-Choose-img wow slideInLeft  data-wow-delay=2s data-wow-duration=2s" src="{{ asset('assets/images/feature-img.png')}}" alt="">
      </div>
      <div class="why-style col-lg-6 py-5 ">
        <h4 class="sub-heading mt-5">Why Choose Us</h4>
        <h1 class="titel-style mb-5 mt-3">Never compromise with Quality</h1>
        <div class="row">
          <div class="col-lg-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#6c63ff" class="bi bi-check2" viewBox="0 0 16 16">
              <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
          </div>
          <div class="col-lg-11">
            <p class="subtitle-style">Dunt ut labore et dolore ma gna aliquaim ad minim vul koreo amare ki mone pore na ami todiba.</p>
          </div>

          <div class="col-lg-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#6c63ff" class="bi bi-check2" viewBox="0 0 16 16">
              <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
          </div>
          <div class="col-lg-11">
            <p class="subtitle-style">Praesent mattis, orci in vulputate ultrices, turpis ipsum imp erdiet nibh, in porta lectus diam non nis.</p>
          </div>

          <div class="col-lg-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#6c63ff" class="bi bi-check2" viewBox="0 0 16 16">
              <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
          </div>
          <div class="col-lg-11">
            <p class="subtitle-style">Vamus ut massa non felis fermentum convallis at ac urna. Sed vitae purus soda.</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- /feauture-area-end -->

<!-- products start -->
<div class="container my-5">
  <div class="row py-5 text-center">
    <div class="col-lg-6 mx-auto">
      <h4 class="sub-heading mt-5">Our Product</h4>
      <h1 class="titel-style mb-5 mt-3">We Develope Amazing Products</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 my-4">
      <div class="mycard text-center p-5 shadow">
        <h1 class="sub-heading text-dark">Custom CMS</h1>
        <img class="my-5 " src="{{ asset('assets/images/product-icon1.png')}}" alt="">
        <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
        <a href="" class="link-style mt-5">View Details</a>
      </div>
    </div>
    <div class="col-lg-4 my-4">
      <div class="mycard text-center p-5 shadow">
        <h1 class="sub-heading text-dark">Blogging Tool</h1>
        <img class="my-5" src="{{ asset('assets/images/product-icon2.png')}}" alt="">
        <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
        <a href="" class="link-style mt-5">View Details</a>
      </div>
    </div>
    <div class="col-lg-4 my-4">
      <div class="mycard text-center p-5 shadow">
        <h1 class="sub-heading text-dark">Photo Editor</h1>
        <img class="my-5" src="{{ asset('assets/images/product-icon3.png')}}" alt="">
        <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
        <a href="" class="link-style mt-5">View Details</a>
      </div>
    </div>
    <div class="col-lg-4 my-4">
      <div class="mycard text-center p-5 shadow">
        <h1 class="sub-heading text-dark">Accounting App</h1>
        <img class="my-5" src="{{ asset('assets/images/product-icon4.png')}})" alt="">
        <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
        <a href="" class="link-style mt-5">View Details</a>
      </div>
    </div>
    <div class="col-lg-4 my-4">
      <div class="mycard text-center p-5 shadow">
        <h1 class="sub-heading text-dark">Keyword Tool</h1>
        <img class="my-5" src="{{ asset('assets/images/product-icon5.png')}}" alt="">
        <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
        <a href="" class="link-style mt-5">View Details</a>
      </div>
    </div>
    <div class="col-lg-4 my-4">
      <div class="mycard text-center p-5 shadow">
        <h1 class="sub-heading text-dark">Social Media Tool</h1>
        <img class="my-5" src="{{ asset('assets/images/product-icon6.png')}}" alt="">
        <p class="subtitle-style mb-4">Ovitae purus sodaDuis eu eros auctor augue ultricies bibend um. Phasellus semattis</p>
        <a href="" class="link-style mt-5">View Details</a>
      </div>
    </div>
  </div>
</div>
<!-- products end -->

<!-- feauture2 start -->
<div class="container my-5">
  <div class="row">
      <div class="col-lg-6">
          <h4 class="sub-heading mt-5"> Features </h4>
          <h1 class="title-style mb-5 mt-3"> Top Features that Keep Us Ahed</h1>
          <p class="subtitle-style">Phasellus seiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
          <div class="row mt-5">
              <div class="col-lg-2">
                  <div class="feature-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-lightbulb" viewBox="0 0 16 16">
                      <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
                    </svg>
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
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-lightbulb" viewBox="0 0 16 16">
                          <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
                      </svg>
                  </div>
              </div>
              <div class="col-lg-10">
                  <h1 class="sub-heading text-dark"> Best User Experience</h1>
                  <p class="subtitle-style mb-4">Phasellus seiusmod tempor incididunt ut labore et dolore magna aliqu ad minim veniam </p>
              </div>
          </div>
      </div>
      <div class="col-lg-6 wow slideInRight  data-wow-delay=1s data-wow-duration=2s">
          <img src="{{ asset('assets/images/feature2-img.png')}}" alt="">
      </div>
  </div>
</div>
<!-- feauture2 end -->

<!--blog start -->
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
          <a class="link-style blog-link " href="">Lets make the begging to mankind to save the world again</a>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- blog end -->

    <a href="#" class="totop" onclick="document.body.scrollTop=0;document.documentElement.scrollTop=0;event.preventDefault()"><i class="fa-solid fa-angles-up"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script>
    new WOW().init();
    </script>
  </body>


</html>
