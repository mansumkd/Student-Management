@extends('layouts.admin')
@section('parents')
<div class="container">
    <div class="row text-center">
       <table id="example" class="table table-striped table-bordered" style="width:100%">
           <thead>
               <tr>
                   <th>Name</th>
                   <th>Role</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>Student Reg.No</th>
                   
               </tr>
           </thead>
           <tbody>
               @foreach($parents as $parent)
               <tr>

                   <td>{{$parent->name}}</td>
                   <td>{{$parent->role}}</td>
                   <td>{{$parent->email}}</td> 
                   <td>{{$parent->phone}}</td>
                   <td>{{$parent->regno}}</td>

                   
               </tr>
              
         
               @endforeach
               
           </tbody>
           <tfoot>
               
               <tr>
                   <th></th>
                   <th></th>
                   <th></th>
               </tr>
               
           </tfoot>
       </table>
    </div>
</div>
<script>
   function handleDelete(){
                           
                        }
</script>



@endsection