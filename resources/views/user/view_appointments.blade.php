<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
    <h2>Appointments</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user_appointments as $appointment)
                <tr>
                    <th scope="row">{{ $appointment->appointment_id }}</th>
                    <td>{{ $appointment->full_name }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->message }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        @if($appointment->status !== 'Approved')
                            <a href="{{ route('appointment.edit', ['id' => $appointment->appointment_id]) }}" class="btn btn-warning">Edit</a>
                        @endif
                    </td>
                    <td>
                    <form action="{{ route('appointment.destroy', ['id' => $appointment->appointment_id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
