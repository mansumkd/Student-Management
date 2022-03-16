@extends('layouts.admin')
@section('staffs')
<div class="container">
    <div class="row text-center">
       <table id="example" class="table table-striped table-bordered" style="width:100%">
           <thead>
               <tr>
                   <th>Name</th>
                   <th>Role</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th></th>
                   <th></th>
               </tr>
           </thead>
           <tbody>
               @foreach($staffs as $staff)
               <tr>

                   <td>{{$staff->name}}</td>
                   <td>{{$staff->role}}</td>
                   <td>{{$staff->email}}</td> 
                   <td>{{$staff->phone}}</td>
                   <td><button class="btn btn-success"><a href="" class="text-decoration-none text-light">Edit</a></button></td>
                   <td><form action="{{route('staffs-list/delete/{id}',$staff->id)}}" method="POST">
                       @method('delete')
                       @csrf
                       <button type="submit" class="btn btn-danger" onclick="handleDelete();">
                        Delete
                    </button></form></td>
               </tr>
               <div id="confirm-delete" class="card" hidden>
                <div class="card-body">
                 <h6>Are you sure want to delete user {{$staff->name}}? <span><div class="btn btn-success">Confirm</div><div class="btn btn-danger">Cancel</div></span></h6>
                </div>
            </div>
               @endforeach
               
           </tbody>
           
       </table>
    </div>
</div>
<script>
   function handleDelete(){
                           
                        }
</script>



@endsection