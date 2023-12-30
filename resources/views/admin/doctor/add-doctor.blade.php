
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

                            <form method="post" action="{{url('dashboard/doctor/submit')}}" enctype="multipart/form-data">
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <!-- <i class="fab fa-gg-circle"></i>User Registration -->
                                        </div>
                                        <div class="col-md-4 card_button_part">
                                            <a href="{{url('dashboard/doctor')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Doctor</a>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Doctor Name<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="name">

                                          @error('name')
                                              <span>{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="phone">
                                          @error('phone')
                                              <span>{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control form_control" id="" name="email">
                                          @error('email')
                                          <span>{{$message}}</span>
                                      @enderror
                                        </div>
                                      </div>


                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Designation<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="designation">
                                        </div>
                                      </div>

                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Specialty<span class="req_star">*</span>:</label>
                                        <div class="col-sm-4">

                                            @php
                                                $speciality = App\Models\Speciality::latest()->get();
                                            @endphp

                                          <select class="form-control form_control" id="" name="specialty_id">
                                            <option value=" ">---Select Specialty---</option>
                                            @foreach ($speciality as $item)
                                                <option value="{{$item->id}}">{{$item->speciality_name}}</option>
                                            @endforeach
                                          </select>
                                          @error('specialty_id')
                                          <span>{{$message}}</span>
                                      @enderror
                                        </div>
                                      </div>

                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Room No<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="number" class="form-control form_control" id="" name="room_no">
                                        </div>
                                      </div>

                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Doctor Image:</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="form-control form_control" id="" name="photo">
                                        </div>
                                      </div>
                                  </div>
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">Submit</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
@endsection
