@extends('layouts.student')
@section('upload-resume')




    <body style="font-family: sans-serif;">
        <div class="container">
            <div class="row justify-content-center mt-5 p-5">
                <div class="card" style="width: 25rem; height: 14rem;">
                    <div class="card-body">
                        <form method="POST" action="{{ route('upload-resume') }}" enctype="multipart/form-data" class="mt-4">
                            @csrf

                          <div class="mb-3">


                            <div class="col-md-6">
                                <input type="file" name="file" class="form-control" style="width: 350px">
                            </div>

                            <div class="col-md-6" style="margin-left: 130px">
                                <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Upload</button>
                            </div>

                            </form>
                        </div>
                      </div>
                </div>
                @if(session()->has('message'))
                               <div class="alert alert-info text-center"><h5>{{session()->get('message')}}</h5></div>
                 @endif
            </div>
            </body>


@endsection
