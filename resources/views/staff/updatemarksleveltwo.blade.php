@extends('layouts.staff')
@section('update-marks-level-two')
<form method="POST" action="{{ route('update-marks') }}" >
  @csrf
   <section class="h-100 h-custom">
     <div class="container py-3 h-100">
       <div class="row d-flex justify-content-center align-items-center h-100">
         <div class="col-lg-8 col-xl-6">
           <div class="card rounded-3">
             <div class="card-body p-4 p-md-5">
               <h2 class="mb-4 pb-2 mb-md-3 text-center">Add Marks</h2>

               <div class="mb-3">
                 <input type="text" class="form-control" value="{{ $semester }}" name="semester">
               </div>

               <div class="mb-3">
                 <input type="text" class="form-control" value="{{ $branch }}" name="branch">
               </div>

               <div class="mb-3">
                 <input type="text" class="form-control mt-4" placeholder="Register Number" name="regno">
                 </div>

                <select name="exam" class="form-select form-select-lg" id="">
                 <option selected>Select Exam</option>
                 @foreach ($exams as $exam)
                     <option value="{{$exam->exam}}">{{$exam->exam}}</option>
                 @endforeach
                </select>

                <div class="mb-3">
                  @foreach ($subjects as $key=> $subject)
                   <h6>{{$subject->name}}</h6>
                   <input type="text" name="mark{{$key+1}}">
                  @endforeach
                </div>



                <div class="row justify-content-center mt-2">
                    <button type="submit" class="btn btn-primary  mb-1 mt-3 w-25">Submit</button>
                </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
 </form>

@endsection
