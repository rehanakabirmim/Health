@extends('includes.master')
@section('content')

  <div class="page-hero bg-image overlay-dark" style="background-image: url({{asset('frontend')}}/assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make your life happier</span>
        <h1 class="display-4">Healthy Living</h1>
        <a href="#" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-chatbubbles-outline"></span>
              </div>
              <p><span>Chat</span> with a doctors</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-shield-checkmark"></span>
              </div>
              <p><span>One</span>-Health Protection</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-accent text-white">
                <span class="mai-basket"></span>
              </div>
              <p><span>One</span>-Health Pharmacy</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Welcome to Your Health <br> Center</h1>
            <p class="text-grey mb-4">Our hospital management system seamlessly integrates patient care, appointment scheduling, and resource allocation, fostering an efficient and patient-centric healthcare environment.With real-time data access, our hospital management system empowers administrators to make informed decisions, optimize workflows, and enhance overall operational efficiency.</p>
            <a href="{{url('/doctor/about')}}" class="btn btn-primary">Learn More</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{asset('frontend')}}/assets/img/bg-doctor.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->


  @php
  use App\Models\Doctor;
  $all=Doctor::Latest()->Limit(6)->get();
  @endphp


  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

      @foreach ($all as $item)

      <div class="item">
        <div class="card-doctor">
          <div class="header">
            <img src="{{asset('uploads/users/'.$item->photo)}}" alt="">
            <div class="meta">
              <a href="#"><span class="mai-call"></span></a>
              <a href="#"><span class="mai-logo-whatsapp"></span></a>
            </div>
          </div>
          <div class="body">
            <p class="text-xl mb-0">{{ $item->name }}</p>
            <span class="text-sm text-grey">{{ $item->specialty}}</span>
          </div>
        </div>
      </div>
      @endforeach

      </div>
    </div>
  </div>



  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" method="POST" action="{{route('appointment')}}" >
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name">
            @error('name')
              {{ $message }}
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address..">
            @error('email')
              {{ $message }}
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
            @error('phone')
                {{ $message }}
              @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            
            <select name="doctor" id="departement" name= "specialty_id" class="custom-select" onchange="findDoctors()">
                @php
                    $speciality = App\Models\Speciality::latest()->get();
                @endphp
            <option value=" ">---Select Specialty---</option>
            @foreach ($speciality as $item)
                <option value="{{$item->id}}">{{$item->speciality_name}}</option>
            @endforeach

            </select>
            @error('specialty_id')
                {{ $message }}
              @enderror
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="doctors" class="custom-select" >
            {{-- add doctor with ajax here  --}}
            </select>
            @error('doctor')
                {{ $message }}
              @enderror
          </div>

          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->

   <!-- .banner-home -->



   <script>

function findDoctors(){
    var specialty_id = document.getElementById('departement').value;
    var doctors = " "
    $.ajax({
        type: "get",
        url: "/find/doctor/" + specialty_id,
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
