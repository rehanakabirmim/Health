@extends('admin.includes.admin_master')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All Doctor Information
                  </div>
                  <div class="col-md-4 card_button_part">
                      <a href="{{url('dashboard/doctor/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Doctor</a>
                  </div>
              </div>
            </div>
            <div class="card-body">
              <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Qualification</th>
                    <th>Specialty</th>
                    <th>Room No</th>
                    <th>Time</th>
                    <th>Admission Fee</th>
                    <th>Doctor Image</th>

                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($all as $data)
                  <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->qualification}}</td>
                    <td>{{$data->specialityInfo->speciality_name}}</td>
                    <td>{{$data->room_no}}</td>
                    <td>{{$data->time}}</td>
                    <td>{{$data->admission_fee}}</td>
                    <td>
                      @if($data->photo!='')
                        <img height="30" src="{{asset('uploads/users/'.$data->photo)}}" alt="User Photo"/>
                      @else
                        <img height="30" src="{{asset('contents/admin')}}/images/avatar.png" alt="avatar"/>
                      @endif
                    </td>
                    <td>
                        <div class="btn-group btn_group_manage" role="group">
                          <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url('dashboard/doctor/view/'.$data->id)}}">View</a></li>
                          <li><a class="dropdown-item" href="{{url('dashboard/doctor/edit/'.$data->id)}}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{url('dashboard/user/delete/'.$data->id)}}">Delete</a></li>

                          </ul>
                          </ul>
                        </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Qualification</th>
                        <th>Specialty</th>
                        <th>Room No</th>
                        <th>Time</th>
                        <th>Admission Fee</th>
                        <th>Doctor Image</th>

                        <th>Manage</th>
                      </tr>


                </tfoot>
              </table>
            </div>

          </div>
      </div>
  </div>
 @endsection
