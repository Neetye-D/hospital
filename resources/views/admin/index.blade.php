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

                <table class="table  table-light table-bordered">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Doctor Email</th>
                            <th scope="col">Doctor Phone</th>
                            <th scope="col">Speciality</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->doctor_name }}</td>
                                <td>{{ $doctor->doctor_email }}</td>
                                <td>{{ $doctor->doctor_phone }}</td>
                                <td>{{ $doctor->speciality }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', ['doctor_id' => $doctor->doctor_id]) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('admin.destroy', ['doctor_id' => $doctor->doctor_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="background-color:red">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $doctors->links() }}

            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>
</html>
