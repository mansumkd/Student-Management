@extends('layouts.student')
@section('listassignmentfirst')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>View Assignment </title>

</head>
<body>
    <div class="container" style="font-family: sans-serif;">
        <div class="row justify-content-center mt-2 p-5">
            <div class="card mt-5" style="width: 30rem; height: 15rem;">
                <div class="card-body" >
                    <form method="POST" action="{{route('listassignmentfirst')}}" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <div class="mb-3">

                                <select class="form-select form-select-lg" name="semester">
                                    <option selected>Choose Semester</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>

                            </div>
                            <select class="form-select form-select-lg" name="branch">
                                <option selected>Select branch</option>
                                @foreach ($branches as $branch)
                                    <option value="{{$branch->branch}}">{{$branch->branch}}</option>
                                @endforeach
                            </select>

                            <div class="row justify-content-center">
                                <button class="btn btn-primary mt-4 w-50" type="submit"><a type="submit"  >Next</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success mt-3 text-center">
                    {{session()->get('message')}}
                </div>
            @endif

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
@endsection
