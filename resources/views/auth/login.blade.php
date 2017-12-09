@extends('layouts.app')

@section('content')
<div class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <form action="{{ route('login') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group mb-3">
                                    <span class="input-group-addon">
                                        <i class="icon-user"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="01111@mediacar.com" required autofocus>
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-addon">
                                        <i class="icon-lock"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary px-4">Login</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('password.request') }}" class="btn btn-link px-0">Forgot password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Mediacar helps you make profit through your Uber or Careem account.</p>
                                <a href="{{ url('/register') }}" class="btn btn-primary active mt-3">Register Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <div class="form-group row">
        <div class="col-lg-6 offset-lg-4">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div> --}}
