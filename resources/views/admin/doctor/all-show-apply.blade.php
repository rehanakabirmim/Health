@extends('admin.includes.admin_master')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All Applying Doctor Information
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
                    <th>Specialty</th>
                    <th>About You</th>
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
                    <td>{{$data->specialty}}</td>
                    <td>{{$data->about}}</td>
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
                          <li><a class="dropdown-item" href="{{url('dashboard/apply/view/'. $data->id)}}">View</a></li>


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
                        <th>Specialty</th>
                        <th>About You</th>
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
