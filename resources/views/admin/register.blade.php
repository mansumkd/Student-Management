@extends('layouts.admin')

@section('register')
<div class="container py-5">
    <div class="row justify-content-center ">
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Add New User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register-user') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user-role" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                            <div class="col-md-6">
                                <select id="selection" class="form-select form-control" aria-label="Default select example"  name="role">
                                    <option selected>Please Choose Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
                                    <option value="student">Student</option>
                                    <option value="parent">Parent</option>
                                  </select>
                            </div>
                        </div>
                        <div id="student">
                        <div class="row mb-3" id="parent">
                            <label for="register-number" class="col-md-4 col-form-label text-md-end">{{ __('Student Reg-No') }}</label>

                            <div class="col-md-6">
                                <input id="regno" type="text" class="form-control" name="regno" > 
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="branch" class="col-md-4 col-form-label text-md-end">{{ __('Branch') }}</label>

                            <div class="col-md-6">
                                <select id="branch" type="text" class="form-select form-control" name="branch" >
                                    <option selected>Select Branch</option>
                                    @foreach ($branchs as $branch)
                                     <option value="{{$branch->branch}}">{{$branch->branch}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>

                    </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                               
                            </div>
                        </div>
                    </form>
                    
                </div>
                @if (session()->has('message'))
                <div class="alert alert-success mt-3 text-center">
                    {{session()->get('message')}}
                </div>
            @endif
            </div>
            
        </div>
    </div>
</div>
@endsection


