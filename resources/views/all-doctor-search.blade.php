
  
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"  >

    <title>One Health - Medical Center</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-3 text-center offset-4">
        <h1>Doctor Information</h1>
        </div>
</div>
<div  class="row">
        <div class="col-md-8 mt-3 text-center offset-2">
        <table class="table table-success table-striped">
          <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <!-- <th>Specialty</th> -->
                    <th>Designation</th>
                    <th>Room No</th>
                    <th>Time</th>
                    
                  </tr>
          </thead>
          <tbody>
                  @foreach($all as $data)
                  <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->email}}</td>

                    <!-- <td>{{$data->specialityInfo->speciality_name}}</td> -->
                   
                    <td>{{$data-> designation}}</td>
                    <td>{{$data->room_no}}</td>
                    <td>{{$data->time}}</td>
                   
                  </tr>
                  @endforeach
            </tbody>
        </table>  
        </div>
      </div>
    </div>
    
     

   
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

    
    
  </body>
</html>

            
 
 