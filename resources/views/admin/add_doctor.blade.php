<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
           
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
<div class="container-fluid page-body-wrapper ">



  <div class="container" align="center" style="margin: 15px">
  @if(session()->has('message'))

<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">x</button>
{{session()->get('message')}}

</div>

@endif
  
  <form method="POST" action="{{ route('admin.store') }}">
  @csrf
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Doctor Name</label>
        <div class="col-sm-10">
          <input type="text" name="doctor_name" class="form-control" style="color:green;" placeholder="" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Doctor Phone</label>
        <div class="col-sm-10">
          <input type="text"  name="doctor_phone" class="form-control" style="color:green;" placeholder="">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Doctor Email</label>
        <div class="col-sm-10">
          <input type="text"  name="doctor_email" class="form-control" style="color:green;" placeholder="">
        </div>
      </div>
      <div class="form-group row ">
        <label class="col-sm-2 col-form-label"style="margin-right:10px;" for="">Speciality</label>
          <select class="col-sm-2 col-form-label" name="speciality" style="color:black;" id="speciality">
            <option>Select</option>
            <option value="Dermatology">Dermatology</option>
            <option value="Neurology">Neurology</option>
            <option value="Pediatrics">Pediatrics</option>
          </select>
      </div>
      <button type="submit" class="btn btn-block btn-success">Create Doctor</button>
    </form>
  </div>
</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
 @include('admin.script')
  </body>
</html>