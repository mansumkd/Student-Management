@extends('layouts.staff')
@section('update-marks')
<section class="h-100 h-custom">
    <div class="container py-3 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">  
            <div class="card-body p-4 p-md-5">
              <h2 class="mb-4 pb-2 mb-md-3 text-center">Add Marks</h2>
              
                      <select class="form-select"id="sel1" name="sellist1">
                        <option selected>Select Exam</option>
                        <option>First semester calicut university</option>
                        <option>Second Semester Calicut university</option>
                        <option>Third Semester calicut university</option>
                        <option>Fourth Semester Calicut University</option>
                        <option>Fifth Semester calicut University</option>
                        <option>Sixth Semester Calicut University</option>
                      </select>

                      <input type="text" class="form-control mt-4" id="formGroupExampleInput" placeholder="Register No">

                  <form>
                       <div class="row">
                       <div class="col">
                          <input type="text" class="form-control mt-3" placeholder="Subject">
                       </div>
                       <div class="col">
                          <input type="text" class="form-control mt-3" placeholder="Mark">
                       </div>
                       </div>
                        <div class="row">
                        <div class="col">
                           <input type="text" class="form-control mt-3" placeholder="Subject">
                        </div>
                        <div class="col">
                             <input type="text" class="form-control mt-3" placeholder="Mark">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                             <input type="text" class="form-control mt-3" placeholder="Subject">
                        </div>
                        <div class="col">
                             <input type="text" class="form-control mt-3" placeholder="Mark">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                             <input type="text" class="form-control mt-3" placeholder="Subject">
                        </div>
                        <div class="col">
                             <input type="text" class="form-control mt-3" placeholder="Mark">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <input type="text" class="form-control mt-3" placeholder="Subject">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control mt-3" placeholder="Mark">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <input type="text" class="form-control mt-3" placeholder="Subject">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control mt-3" placeholder="Mark">
                        </div>
                      </div>
                   </form>   

               <div class="row justify-content-center mt-2">
                   <button type="submit" class="btn btn-primary  mb-1 mt-3 w-25">Submit</button>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection