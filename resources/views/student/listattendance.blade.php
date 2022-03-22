@extends('layouts.student')
@section('listattendance')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>List Assignments</title>

</head>
<body>
<div class="container" >
    <div class="row">

            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" colspan="2" class="text-center">Register Number: {{ auth()->user()->regno }}</th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 100px;">Date</th>
                        <th scope="col" style="width: 100px;">Monthly Attendance Percentage</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            @foreach ($attendances as  $key=>$attendance )
                            <h6>{{$attendance->date}}</h6>
                            @endforeach
                        </td>

                        <td>
                            @foreach ($attendances as  $key=>$attendance )
                            <h6>{{$attendance->status}}</h6>
                            @endforeach
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>

@endsection
