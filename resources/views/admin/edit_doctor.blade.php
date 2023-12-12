<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<form method="POST" action="{{ route('admin.update', $doctor->doctor_id) }}">
      @csrf
      @method('PUT')
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Doctor Name</label>
        <div class="col-sm-10">
          <input type="text" name="doctor_name" class="form-control" style="color:green;" value="{{ $doctor->doctor_name }}" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Doctor Phone</label>
        <div class="col-sm-10">
          <input type="text" name="doctor_phone" class="form-control" style="color:green;" value="{{ $doctor->doctor_phone }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Doctor Email</label>
        <div class="col-sm-10">
          <input type="text" name="doctor_email" class="form-control" style="color:green;" value="{{ $doctor->doctor_email }}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="margin-right:10px;" for="speciality">Speciality</label>
        <select class="col-sm-2 col-form-label" name="speciality" style="color:black;" id="speciality">
          <option value="Dermatology" @if($doctor->speciality == 'Dermatology') selected @endif>Dermatology</option>
          <option value="Neurology" @if($doctor->speciality == 'Neurology') selected @endif>Neurology</option>
          <option value="Pediatrics" @if($doctor->speciality == 'Pediatrics') selected @endif>Pediatrics</option>
        </select>
      </div>
      <button type="submit" class="btn btn-block btn-success">Update Doctor</button>
    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>