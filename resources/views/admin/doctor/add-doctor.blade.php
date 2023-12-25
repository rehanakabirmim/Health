
@extends('admin.includes.admin_master')
@section('content')
                    <div class="row">
                        <div class="col-md-12 ">
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
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="phone">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="email" class="form-control form_control" id="" name="email">
                                        </div>
                                      </div>

                                      
                                     
                                     
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Specialty<span class="req_star">*</span>:</label>
                                        <div class="col-sm-4">
                                          <select class="form-control form_control" id="" name="specialty">
                                            <option>---Select Specialty---</option>
                                            <option value="Eye">Eye</option>
                                            <option value="Liver">Liver</option>
                                            <option value="Cancer">Cancer</option>
                                            <option value="Nose">Nose</option>
                                          </select>
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