@extends('includes.master')
@section('content')

  <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('frontend')}}/assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">About Us</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-secondary text-white">
              <span class="mai-chatbubbles-outline"></span>
            </div>
            <p><span>Chat</span> with a doctors</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-primary text-white">
              <span class="mai-shield-checkmark"></span>
            </div>
            <p><span>One</span>-Health Protection</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-accent text-white">
              <span class="mai-basket"></span>
            </div>
            <p><span>One</span>-Health Pharmacy</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">
          <h1 class="text-center mb-3">Welcome to Your Health Center</h1>
          <div class="text-lg">
            <p>Our hospital management system seamlessly integrates patient care, appointment scheduling, and resource allocation, fostering an efficient and patient-centric healthcare environment.With real-time data access, our hospital management system empowers administrators to make informed decisions, optimize workflows, and enhance overall operational efficiency.</p>
            <p>From streamlined appointment booking to centralized patient records, our hospital management system is a comprehensive solution designed to elevate healthcare delivery, ensuring a seamless and organized experience for both medical staff and patients.With a user-friendly interface, our hospital management system provides a centralized platform for managing patient records, scheduling appointments, tracking medical inventory, and facilitating seamless communication among healthcare professionals.</p>
          </div>
        </div>
        <div class="col-lg-10 mt-5">
          <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
          <div class="row ">

             @foreach ($all as $item)
          <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
            <div class="card-doctor">
              <div class="header">
                <img src="{{asset('uploads/users/'.$item->photo)}}" alt="">
                <div class="meta">
                  <a href="#"><span class="mai-call"></span></a>
                  <a href="#"><span class="mai-logo-whatsapp"></span></a>
                </div>
              </div>
              <div class="body">
                <p class="text-xl mb-0">{{$item->name}}</p>
                <span class="text-sm text-grey">{{$item->specialty}}</span>
              </div>
            </div>
          </div>
          @endforeach
           

          </div>
        </div>
      </div>
    </div>
  </div>

  

  @endsection  