<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Students Table!</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
    <div class="container-fluid">
        <div class="navbar-brand">Task</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin">Applicans</a>
                </li>
                <li class="nav-item">

                <a class="nav-link active" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style=";">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <table class="table table-striped table-hover">

        <thead>

        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">National ID</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Mobile</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
        </tr>

        </thead>

        <tbody>

        @foreach($x as $value)
            <tr>
                <th scope="row">{{$value->applicantID}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->NID}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->address}}</td>
                <td>{{$value->mobile}}</td>
                <td><a href = 'admin/delete/{{ $value->applicantID }}'>Delete</a></td>
                <td><a href = 'admin/update/{{ $value->applicantID }}'>Update</a></td>
            </tr>
        @endforeach

        </tbody>

    </table>

</div>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
