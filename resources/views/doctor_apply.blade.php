@extends('includes.master')
@section('content')
        @if(session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
        @endif
    <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Apply to serve with us!</h1>

      <form class="main-form"   method="POST" action="{{ route('appointment.submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Doctor name">
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="number" name="phone" class="form-control" placeholder="Phone">
          </div>


          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address..">
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="specialty" class="form-control" placeholder="Specialty">
          </div>

          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="about" id="about" class="form-control" rows="6" placeholder="About You"></textarea>
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="file" name="photo" class="form-control" placeholder="Specialty">
          </div>




        </div>

        {{-- <button type="submit" class="btn btn-primary mt-3">Submit Request</button> --}}

        <button type="submit" class="btn btn-primary mt-3">Submit Request</button>

        {{-- <a href="{{ url('home') }}" class="btn btn-primary mt-3" role="button">
            Submit Request
        </a> --}}
      </form>
    </div> <!-- .container -->
  </div> <!-- .page-section -->




  @endsection
