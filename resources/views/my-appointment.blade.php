@extends('includes.master')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All User Information
                  </div>
                  
              </div>
            </div>
            <div class="card-body">
              <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Cancel Appointment</th>
                   
                    
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach($app as $data)
                  <tr>
                    <td>{{$data->doctor}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->message}}</td>
                    <td>{{$data->status}}</td>
                    <td><Cancel class="bt btn-danger" onclick="return confirm('Are you sure to delete this')" href="{{url('cancel_appoint',$data->id)}}">Cancel</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
           
            </div>
          </div>
      </div>
  </div>
 @endsection 