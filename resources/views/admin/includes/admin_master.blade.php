<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/datatables.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/datepicker.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/style.css">
  </head>
  <body>
    <header>
        <div class="container-fluid header_part no_print">
            <div class="row">
                <div class="col-md-2">
                    <!-- Add the logo inside an anchor tag -->
                    {{-- <a href="{{ route('home') }}"> --}}
                        {{-- <img src="{{asset('images/logo.png')}}" alt="Logo" class="img-fluid"> --}}
                        {{-- <img src="{{asset('logo/img/health.png')}}" alt="" style="height: 50px">


                    </a> --}}
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <span class="text-light fw-bold" style="font-size: 25px;">
                            One
                        </span>
                        <span class="text-light fw-bold" style="font-size: 25px;">
                            -Health
                        </span>
                    </a>
                </div>
                <div class="col-md-7">
                    <!-- This div can now be used for any other content -->
                </div>
                <div class="col-md-3 top_right_menu text-end">
                    <div class="dropdown">
                      <button class="btn dropdown-toggle top_right_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{asset('contents/admin')}}/images/avatar.png" class="img-fluid">
                          {{Auth::user()->name}}
                      </button>
                      <ul class="dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="{{route('profile.edit')}}"><i class="fas fa-user-tie"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Manage Account</a></li> --}}
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>




    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part no_print">
                    <div class="user_part">
                        <img class="" src="{{asset('contents/admin')}}/images/avatar.png" alt="avatar"/>
                        <h5>{{Auth::user()->name}}</h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                        <li><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li><a href="{{url('dashboard/show_apply')}}"><i class="fas fa-user-circle"></i> Appying Doctor</a></li>



                            <li><a href="{{url('dashboard/doctor')}}"><i class="fas fa-user-circle"></i> Doctors</a></li>


                            <li><a href="{{url('dashboard/show_appoint')}}"><i class="fas fa-file-alt"></i> Appointments</a></li>



                            <li><a href="{{url('dashboard/show_contact')}}"><i class="fas fa-user-circle"></i>Contact</a></li>

                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                    </div>
                </div>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part no_print">
                            <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid footer_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p>Copyright &copy; 2022 | All rights reserved by Dashboard | Development By <a href="#">Creative System Limited.</a></p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </footer>
    <script src="{{asset('contents/admin')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/datatables.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom.js"></script>
  </body>
</html>
