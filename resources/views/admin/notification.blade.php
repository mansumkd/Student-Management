@extends('layouts.admin')
@section('notification')
<div class="container">
    
      <div class="row justify-content-center">
        <h3 class="">Notifications</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Link</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($notifications as $key => $notification)         
              <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$notification->title}}</td>
                <td>{{$notification->description}}</td>
                <td>{{$notification->link}}</td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          
    </div>
    <div class="row justify-content-end">
    
      <div  class="btn btn-success w-25 align-left"><a class="text-light fw-bold" href="{{route('add-notifications')}}">Add New</a></div>
    </div>
</div>


@endsection