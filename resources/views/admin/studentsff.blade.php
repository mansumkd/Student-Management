@extends('layouts.admin')
@section('students')
<div class="container">
     <div class="row text-center">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr><th>No</th>
                    <th>Name</th>
                    <th>RegNo</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $key => $student)
                <tr>
                     <td>{{++$key}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->regno}}</td>
                    <td>{{$student->branch}}</td>
                    <td>{{$student->email}}</td> 
                    <td>{{$student->phone}}</td>
                    <td><button class="btn btn-success"><a href="" class="text-decoration-none text-light">Edit</a></button></td>
                    <td><button class="btn btn-danger"><a href="" class="text-decoration-none text-light">Delete</a></button></td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
     </div>
 </div> 


@endsection