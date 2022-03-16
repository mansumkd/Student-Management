@extends('layouts.admin')
@section('students')
<div class="container">
     <div class="row text-center">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>

                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>RegNo</th>
                    <th>Branch</th>
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
                    <td>
                        <td>
                            <form action="{{route('students-list/edit/{id}',$student->id)}}" method="POST">
                                @method('get')
                                @csrf
                                <button class="btn btn-success" onclick="handleDelete()" type="submit">Edit</button>
                            </form>
                        </td>

                    </td>

                    <td>
                        <form action="{{route('students-list/delete/{id}',$student->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="handleDelete();">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

     </div>
 </div>


@endsection
