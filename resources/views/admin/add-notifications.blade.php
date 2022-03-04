@extends('layouts.admin')
@section('add-notification')
<div class="container">
    <h5><a class="text-primary text-decoration-none" href="{{route('notifications')}}">Go back</a></h5>
    <div class="row justify-content-center mt-3  p-5">
        <h2 class="text-center mb-5">Add New Notification</h2>
        <div class="card" style="width: 25rem; height: 23rem;">
            <div class="card-body">
                <form class="mt-4" method="POST" action="{{route('add-notifications')}}">
                    @csrf
                    <div class="mb-3">
                      <input type="text" placeholder="Title" name="title" class="form-control mt-5" id="exampleInputTitle" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <input type="text" placeholder="Description" name="description" class="form-control mt-4" id="exampleInputDescription">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Link" name="link" class="form-control mt-4" id="exampleInputLink">
                      </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary mt-4 w-25">Add New</button>
                    
                    </div>
                  </form>
                 
            </div>
          </div>
          @if (session()->has('message'))
            <div class="alert alert-success mt-3 text-center">
                {{session()->get('message')}}
            </div>
        @endif
    </div>
</div>
@endsection