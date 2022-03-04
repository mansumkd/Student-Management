@extends('layouts.student')
@section('notification')
<div class="container">
    <div class="row justify-content-center">
        <h3 class="mb-3">Notifications</h3>
     
            @foreach ($notifications as $item)
            <a class="text-decoration-none mt-1" @if($item->link) href="//{{$item->link}}" @endif>
               
                <div class="alert alert-secondary" role="alert">
                    
                    <div>
                        <h5><span class="text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                              </svg>
                        </span>{{$item->title}}</h5>
                    </div>
                    <span class="ms-5">
                 {{$item->description}}
                </span>
                </div>
              </a>   
        

            @endforeach
   
    </div>
</div>
@endsection