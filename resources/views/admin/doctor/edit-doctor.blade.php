@extends('admin.includes.admin_master')
@section('content')
  <div class="row">
      <div class="col-md-12 ">
                        @if(session()->has('message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
  
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          {{ session()->get('message')}}
                          </div>
                          @endif 
          <form method="post" action="{{url('dashboard/doctor/update')}}" enctype="multipart/form-data">
            @csrf
              <div class="card mb-3">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_title_part">
                          <i class="fab fa-gg-circle"></i>Update Doctor Information
                      </div>
                      <div class="col-md-4 card_button_part">
                          <a href="{{url('dashboard/doctor')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Doctor</a>
                      </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        @if(Session::has('success'))
                          <div class="alert alert-success alert_success" role="alert">
                             <strong>Success!</strong> {{Session::get('success')}}
                          </div>
                        @endif
                        @if(Session::has('error'))
                          <div class="alert alert-danger alert_error" role="alert">
                             <strong>Opps!</strong> {{Session::get('error')}}
                          </div>
                        @endif
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                    <div class="row mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Name<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <!-- <input type="hidden" name="slug" value="{{$data->slug}}"> -->
                        <input type="text" class="form-control form_control" id="" name="name" value="{{$data->name}}">
                        @if($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="phone" value="{{$data->phone}}">
                      </div>
                    </div>
                    <div class="row mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control form_control" id="" name="email" value="{{$data->email}}">
                        @if($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3 {{ $errors->has('qualification') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Qualification<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="qualification" class="form-control form_control" id="" name="qualification" value="{{$data->qualification}}">
                        @if($errors->has('qualification'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('qualification') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3 {{ $errors->has('room_no') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Room No<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="room_no" value="{{$data->room_no}}" >
                        @if($errors->has('room_no'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('room_no') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>


                    <div class="row mb-3 {{ $errors->has('time') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Time<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="time" value="{{$data->time}}" >
                        @if($errors->has('time'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('time') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Image:</label>
                      <div class="col-sm-4">
                        <input type="file" class="form-control form_control" id="" name="photo">
                      </div>
                      <div class="col-md-2">
                        @if($data->photo!='')
                          <img height="100" src="{{asset('uploads/users/'.$data->photo)}}" alt="User Photo"/>
                        @else
                          <img height="100" src="{{asset('contents/admin')}}/images/avatar.png" alt="avatar"/>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
                </div>
              </div>
          </form>
      </div>
  </div>
@endsection
