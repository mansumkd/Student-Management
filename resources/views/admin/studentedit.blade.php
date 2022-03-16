@extends('layouts.admin')
@section('studentedit')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>LOGIN</title>
    <link rel="stylesheet" href="login.css">
</head>
<body style="font-family: sans-serif;">
<div class="container">
    <div class="row justify-content-center  p-2">
        <div class="card" style="width: 35rem; height: 40rem;">
            <div class="card-body">
                <h3 class="text-center mb-5">Update Student</h3>
                <form class="mt-3"action="" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$student->name}}" class="form-control mt-4">
                    </div>
                    <div class="mb-3">
                        <label>Register Number</label>
                      <input type="text" name="regno" value="{{$student->regno}}" class="form-control mt-4">
                    </div>
                    <div class="mb-3">
                        <label>Branch</label>
                      <input type="text" name="branch" value="{{$student->branch}}" class="form-control mt-4">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                      <input type="email" name="email" value="{{$student->email}}" class="form-control mt-4">
                    </div>
                    <div class="mb-3">
                        <label>Phone Number</label>
                      <input type="text" name="phone" value="{{$student->phone}}" class="form-control mt-4">
                    </div>
                      <div class="row justify-content-center">
                        <button class="btn btn-primary w-25 mt-4" type="submit" name="submit">Update</button>
                      </div>
                  </form>
            </div>
          </div>
    </div>
</div>
</body>
</html>
@endsection






