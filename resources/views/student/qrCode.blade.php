@extends('layouts.student')
@section('qr-code')

    <div class="container mt-4">
        <div class="row justify-content-center ">

  
                <h2>{{ auth()->user()->name }}</h2>
        
            <div class="card-body mt-5 text-center">
                {!! QrCode::size(300)->generate('name :'.$student->name.' regNo: '.$student->regno) !!}
            </div>

        </div>
    </div>
@endsection
