@extends('layouts.admin')

@section('add-subjects')

<div class="container">

    <div class="row justify-content-center mt-3  p-5">
        <h2 class="text-center mb-5">Add New Subjects</h2>

        <div class="card" style="width: 25rem; height: 23rem;">

            <div class="card-body">
                <form class="mt-4" method="POST" action="{{route('add-subjects')}}">
                    @csrf

                    <div class="mb-3">
                        <input type="text" placeholder="Semester" name="semester" class="form-control mt-4" id="exampleInputLink">
                    </div>

                    <div class="mb-3">
                        <select name="branch" id="" class="form-select form-control" aria-label="Default select example">
                            <option selected>Please Choose Branch</option>
                            @foreach ($branchs as $branch)
                            <option value="{{$branch->branch}}">{{$branch->branch}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" placeholder="Subject Name" name="subject" class="form-control mt-4" id="exampleInputLink">
                    </div>

                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary mt-4 w-25"style="width: 180px;">Add Subject</button>
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
