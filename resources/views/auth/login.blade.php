@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center mt-5 p-5">
        <div class="card" style="width: 25rem; height: 25rem;">
            <div class="card-body">
                <form class="mt-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="text-center ">Please Login</h2>
                    <div class="mb-3 mt-5">
                      <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="mb-3">
                      <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary mt-4 w-25">LOG IN</button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <div class="mt-4 text-center btn">
                        
                    </div>
                    </div>
                  </form>
            </div>
          </div>
    </div>
</div>
<style>
    .card{
    box-shadow: 0px 15px 10px 6px rgb(207, 207, 207);
}
.btn a{
    text-decoration: none;
    color: rgb(49, 0, 0);
}
</style>
@endsection
