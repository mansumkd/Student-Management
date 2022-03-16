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
                   <th></th>
                   <th></th>
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
                   <td>
                    <form action="{{route('parents-list/edit/{id}',$parent->id)}}" method="POST">
                        @method('get')
                        @csrf
                        <button class="btn btn-success" type="submit">Edit</button>
                    </form>
                </td>

                   <td>
                    <form action="{{route('parents-list/delete/{id}',$parent->id)}}" method="POST">
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
<script>
   function handleDelete()
   {

    }
</script>



@endsection
