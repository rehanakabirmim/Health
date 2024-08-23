@extends('admin.includes.admin_master')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All User Information
                  </div>
                  <!-- <div class="col-md-4 card_button_part">
                      <a href="{{url('dashboard/doctor/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Doctor</a>
                  </div> -->
              </div>
            </div>
            <div class="card-body">
              <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>User Name</th>
                    <!-- <th>Email</th> -->
                    <th>Phone</th>

                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Approve</th>
                    <th>Canceled</th>
                    <th>Send Mail</th>


                  </tr>
                </thead>
                <tbody>
                  @foreach($all as $data)
                  <tr>
                    <td>{{$data->name}}</td>
                    <!-- <td>{{$data->email}}</td> -->
                    <td>{{$data->phone}}</td>
                    <td>{{$data->doctor}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->message}}</td>
                    <td>{{$data->status}}</td>
                    <td><a class="btn btn-success" href="{{url('dashboard/approved',$data->id)}}">Approved</a></td>

                    <td><a class="btn btn-danger" href="{{url('dashboard/canceled',$data->id)}}">Canceled</a></td>


                    <td><a class="btn btn-primary" href="{{url('dashboard/emailView',$data->id)}}">Send Mail</a></td>

                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>User Name</th>
                        <!-- <th>Email</th> -->
                        <th>Phone</th>

                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Approve</th>
                        <th>Canceled</th>
                        <th>Send Mail</th>

                        
                    </tr>
                </tfoot>

              </table>
            </div>

          </div>
      </div>
  </div>
 @endsection
