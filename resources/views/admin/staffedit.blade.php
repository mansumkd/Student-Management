@extends('layouts.admin')
@section('staffedit')

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
<body style="font-family:sans-serif;" class="fw-5 fs-6">
<div class="container">
    <div class="row justify-content-center  p-2">
        <div class="card" style="width: 35rem; height: 36rem;">
            <div class="card-body">
                <h3 class="text-center mb-3">Update Staff</h3>
                <form class="mt-3"action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="mt-3">Role</label>
                        <input type="text" name="role" value="{{$staff->role}}" class="form-control " disabled>
                    </div>
                    <div class="mb-3">
                        <label class="mt-3">Name</label>
                        <input type="text" name="name" value="{{$staff->name}}" class="form-control ">
                    </div>
                    <div class="mb-3">
                        <label class="mt-3">Email</label>
                        <input type="email" name="email" value="{{$staff->email}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="mt-3">Phone Number</label>
                      <input type="text" name="phone" value="{{$staff->phone}}" class="form-control">
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






