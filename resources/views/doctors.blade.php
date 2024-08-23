@extends('includes.master')
@section('content')

  <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('frontend')}}//assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Our Doctors</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="row">

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
                <span class="text-sm text-grey">{{$item->specialityInfo->speciality_name}}</span>
              </div>
            </div>
          </div>
          @endforeach

        
          </div>

        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" method="POST" action="{{route('appointment')}}" >
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select" onchange="findDoctors()">

            <option value=" ">---Select Specialty---</option>
            @foreach ($all as $item)

              <option value="{{$item->specialty}}">{{$item->specialty}}</option>
              @endforeach

            </select>
          </div>
          
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="doctors" class="custom-select" >
            {{-- add doctor with ajax here  --}}
            </select>
          </div>

          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
  
  <script>

function findDoctors(){
    var specialty = document.getElementById('departement').value;
    var doctors = " "
    $.ajax({
        type: "get",
        url: "/find/doctor/" + specialty,
        dataType: "json",
        success: function (response) {

            $doctors = $('#doctors').html('');
            $('#doctors').empty();

            $.each(response, function (key, value) {

              $doctors.append('<option value = "' +
                    value.name + '">' +
                    value.name + '---'+ value.designation +'</option>');

            });
        }
    });
}

</script>


 
@endsection
