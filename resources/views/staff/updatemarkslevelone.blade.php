@extends('layouts.staff')
@section('update-marks-level-one')
<div class="container">
  <div class="row justify-content-center mt-5 p-5">
      <div class="card" style="width: 25rem; height: 14rem;">
          <div class="card-body">
              <form method="POST" action="{{ route('update-marks-level-one') }}" class="mt-4">
                  @csrf
                <div class="mb-3">
                    <div class="mb-3">

                        <select class="form-select form-select-lg" name="semester">
                          <option>Select semester</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>

                        </select>

                    </div>
                    <select class="form-select form-select-lg" name="branch">
                      <option>Select branch</option>
                      @foreach ($branches as $branch)
                      <option value="{{ $branch->branch }}">{{ $branch->branch }}</option>>
                      @endforeach
                    </select>

                    <div class="row text-center">
                        <button class="btn btn-primary mt-3" type="submit"><a type="submit">Next</a></button>
                    </div>


                  </form>
              </div>
            </div>
      </div>
  </div>
    
@endsection