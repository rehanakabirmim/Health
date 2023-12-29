
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

                            <form method="post" action="{{url('dashboard/sendemail',$data->id)}}">
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <!-- <i class="fab fa-gg-circle"></i>User Registration -->
                                        </div>
                                        <!-- <div class="col-md-4 card_button_part">
                                            <a href="{{url('dashboard/doctor')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Doctor</a>
                                        </div> -->
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Greeting<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="greeting">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Body</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="body">
                                        </div>
                                      </div>
                    

                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Action Text<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="actiontext">
                                        </div>
                                      </div>

                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Action Url<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="actionurl">
                                        </div>
                                      </div>

                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">End Part<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="endpart">
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