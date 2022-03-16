@extends('layouts.staff')
@section('add-assignment')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add Assignment</title>

</head>
<body>
<div class="container" style="font-family: sans-serif;">
    <div class="row justify-content-center mt-2 p-5">
        <div class="card" style="width: 25rem; height: 32rem;">
            <div class="card-body">
                <form class="mt-4" action="{{route('add-assignment')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                         <input type="text"  class="form-control" value="{{$semester}}" name="semester" >
                    </div>

                    <div class="mb-3">
                      <input type="text"  class="form-control" value="{{$branch}}"name="branch" >
                    </div>

                    <div class="mb-3">

                        <select class="form-select form-select-lg" name="subject">
                            <option>Select Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{$subject->name}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                      <div class="form-group">
                        <label for="comment">Title:</label>
                        <textarea class="form-control" rows="1" id="comment" name="question"></textarea>
                      </div>
                    </div>

                    <input type="file" placeholder="file" class="form-control mt-4" id="exampleInputPassword1" name="file">
                    <input type="date" placeholder="date" class="form-control mt-4" id="exampleInputPassword1" name="date">
                    <div class="row justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary mt-4 w-50">Add</button>
                    </div>
                </form>
            </div>
          </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>

@endsection

