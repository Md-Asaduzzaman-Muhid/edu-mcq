@extends('layouts.app')

@section('content')

<section class="register-section py-5">
    <div class="container">
        <div class="register-container shadow my-5 py-5">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="login-description text-center p-3">
                        <h3>Welcome To Edu MCQ</h3>
                        <p>Large set of question having organized also in readable format, you will get your desire question set here.
                        Free register or login to start exploring, leave us feedback to improve . We are heapy to launch new version as per 
                        what user want.</p>
                        <a class="submit-btn" href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="register-form">
                        @isset($url)
                        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                        @else
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @endisset
                        @csrf
                            <div class="form-group text-center mb-5">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Name ..."autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group text-center mb-5">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email ...">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group text-center mb-5">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password ...">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                            </div>

                            <div class="form-group text-center mb-5">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password ...">
                            </div>

                            <div class="form-group text-center">
                                    <button type="submit" class="submit-btn">
                                        {{ __('Register') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
