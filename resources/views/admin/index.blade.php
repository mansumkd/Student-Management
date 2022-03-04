@extends('layouts.admin')
@section('index')
<div class="container">
    <div class="row mt-t py-5 text-center">
     <h1>Hi, {{Auth::user()->name}} </h1>
     <br>
     <h1>This is Admin Home page</h1>
    </div>
</div>
@endsection