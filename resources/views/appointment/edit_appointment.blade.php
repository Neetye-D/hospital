<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp" style="text-size:20px;"><strong>Edit Appointment</strong></h1>

        <form class="main-form" action="{{ route('appointment.update', $appointment->appointment_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mt-5">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="full_name" class="form-control" placeholder="Full name" value="{{ $appointment->full_name }}">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="email" class="form-control" placeholder="Email address.." value="{{ $appointment->email }}">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="date" class="form-control" value="{{ $appointment->date }}">
                </div>
                <div class="col-12 col-sm-3 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor_id_1" id="doctor1" class="custom-select" style="font-size:0.7rem;">
                    <option>Select Doctor</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->doctor_id }}" @if($doctor->doctor_id == $appointment->doctor_id_1) selected @endif>Dr {{ $doctor->doctor_name }} in {{ $doctor->speciality }}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-12 col-sm-3 py-2 wow fadeInRight" data-wow-delay="300ms">
                <select name="doctor_id_2" id="doctor2" class="custom-select" style="font-size:0.7rem;">
                    <option>Select Doctor2(optional)</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->doctor_id }}" @if($doctor->doctor_id == $appointment->doctor_id_2) selected @endif>Dr {{ $doctor->doctor_name }} in {{ $doctor->speciality }}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message..">{{ $appointment->message }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="background-color:green">Update Request</button>
        </form>
    </div>
</div>
