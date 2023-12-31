@extends('admin.includes.admin_master')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Doctor Information
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
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Doctor Name</td>
                          <td>:</td>
                          <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                          <td>:</td>
                          <td>{{$data->phone}}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>:</td>
                          <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                          <td>Specialty</td>
                          <td>:</td>
                          <td>{{$data->specialityInfo->speciality_name}}</td>
                        </tr>
                        <tr>
                          <td>Room No</td>
                          <td>:</td>
                          <td>{{$data->room_no}}</td>
                        </tr>
                        <tr>
                          <td>Time</td>
                          <td>:</td>
                          <td>{{$data->time}}</td>
                        </tr>
                        <tr>
                          <td>Doctor Image</td>
                          <td>:</td>
                          <td>
                            @if($data->photo!='')
                              <img height="100" src="{{asset('uploads/users/'.$data->photo)}}" alt="User Photo"/>
                            @else
                              <img height="100" src="{{asset('contents/admin')}}/images/avatar.png" alt="avatar"/>
                            @endif
                          </td>
                        </tr>
                      </table>
                  </div>
                  <div class="col-md-2"></div>
              </div>
            </div>
            <div class="card-footer">
              <div class="btn-group" role="group" aria-label="Button group">
                <button type="button" class="btn btn-sm btn-dark">Print</button>
                <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                <button type="button" class="btn btn-sm btn-dark">Excel</button>
              </div>
            </div>
          </div>
      </div>
  </div>
@endsection
