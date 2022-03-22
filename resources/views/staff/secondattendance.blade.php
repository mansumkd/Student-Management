@extends('layouts.staff')
@section('store-attendance')

<form method="POST" action="{{ route('store-attendance') }}" >
    @csrf
     <section class="h-100 h-custom">
       <div class="container py-3 h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
           <div class="col-lg-8 col-xl-6">
             <div class="card rounded-3">
               <div class="card-body p-4 p-md-5">
                 <h2 class="mb-4 pb-2 mb-md-3 text-center">Add Attendence</h2>

                 <div class="mb-3">
                   <input type="text" class="form-control" value="{{ $semester }}" name="semester">
                 </div>
                 <div class="mb-3">

                   <input type="text" class="form-control" value="{{ $branch }}" name="branch">
                 </div>

                 <div class="mb-3">
                   <input type="date" class="form-control mt-4" name="date">
                   </div>

                       <div class="mb-3">
                        <select class="form-select form-select-lg" name="regno">
                            <option>Select Register Number</option>
                            @foreach ($registers as $key => $register)
                            <option value="{{ $register->regno }}">{{ $register->regno }}</option>>
                            @endforeach
                          </select>

                        <input type="text" name="status" class="form-control mt-3" placeholder="Attendance Percentage">


                       </div>

                  <div class="row justify-content-center mt-2">
                      <button type="submit" class="btn btn-primary  mb-1 mt-3 w-25">Submit</button>
                  </div>
               </div>
             </div>
           </div>
         </div>
       </div>
@endsection
