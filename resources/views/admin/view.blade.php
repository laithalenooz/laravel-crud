<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Update</title>
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
            </ul>
        </div>
    </div>
</nav>



<h1 style="text-align:center;margin-bottom:20px">{{$user->name}}</h1>

<form action="../finishUpdate/{{$user->applicantID}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card" style="width: 30rem;margin:auto">

        <img src='{{asset("storage/coverImages/$user->image")}}' class="card-img-top" alt="..."
             style="width: 20rem;margin:auto">

        <div class="card-body">

            <label class="card-title">Update Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Update Full Name" value="{{$user->name}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <p class="card-text"></p>

        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><label class="card-title">Update National ID</label>
                <input type="text" name="NID" class="form-control" placeholder="Update NID" value="{{$user->NID}}">
                @error('NID')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror</li>

            <li class="list-group-item"><label class="card-title">Update Email</label>
                <input type="email" name="email" class="form-control" placeholder="Update email" value="{{$user->email}}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror</li>

            <li class="list-group-item"><label class="card-title">Update Address</label>
                <input type="text" name="address" class="form-control" placeholder="Update address" value="{{$user->address}}">
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror</li>

            <li class="list-group-item"><label class="card-title">Update Mobile</label>
                <input type="text" name="mobile" class="form-control" placeholder="Update Mobile" value="{{$user->mobile}}">
                @error('mobile')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror</li>

            <li class="list-group-item"><label class="card-title">Update Image</label>
                <input type="file" name="image" class="form-control" placeholder="Update Image">
        </ul>



        <div class="card-body" >
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </div>

</form>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
