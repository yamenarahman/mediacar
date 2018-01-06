@extends('layouts.app')

@section('content')
<div class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <h1>Register</h1>
                        <p class="text-muted">Create your account</p>
                        <form method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="Username">
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-phone"></i>
                                </span>
                                <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required placeholder="phone">
                                @if ($errors->has('phone'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </div>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-flag"></i>
                                </span>
                                <select name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
                                    <option value="Alexandria">Alexandria</option>
                                    <option value="Aswan">Aswan</option>
                                    <option value="Asyut">Asyut</option>
                                    <option value="Beheira">Beheira</option>
                                    <option value="Beni Suef">Beni Suef</option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Dakahlia">Dakahlia</option>
                                    <option value="Damietta">Damietta</option>
                                    <option value="Faiyum">Faiyum</option>
                                    <option value="Gharbia">Gharbia</option>
                                    <option value="Giza">Giza</option>
                                    <option value="Ismailia">Ismailia</option>
                                    <option value="Kafr El Sheikh">Kafr El Sheikh</option>
                                    <option value="Luxor">Luxor</option>
                                    <option value="Matruh">Matruh</option>
                                    <option value="Minya">Minya</option>
                                    <option value="Monufia">Monufia</option>
                                    <option value="New valley">New valley</option>
                                    <option value="North Sinai">North Sinai</option>
                                    <option value="Port said">Port said</option>
                                    <option value="Qalyubia">Qalyubia</option>
                                    <option value="Qena">Qena</option>
                                    <option value="Red sea">Red sea</option>
                                    <option value="Sharqia">Sharqia</option>
                                    <option value="Sohag">Sohag</option>
                                    <option value="South sinai">South sinai</option>
                                    <option value="Suez">Suez</option>
                                </select>
                                @if ($errors->has('city'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </div>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-credit-card"></i>
                                </span>
                                <input type="text" class="form-control{{ $errors->has('national-id') ? ' is-invalid' : '' }}" name="national-id" value="{{ old('national-id') }}"
                                    required placeholder="national-id"> @if ($errors->has('national-id'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('national-id') }}</strong>
                                </div>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-lock"></i>
                                </span>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                                @endif
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-addon">
                                    <i class="icon-lock"></i>
                                </span>
                                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required placeholder="Confirm password">
                                @if ($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Create Account</button>
                            <hr>
                            <a href="{{ url('/login') }}">Already have an account ? Sign in</a>
                        </form>
                    </div>
                    {{--  <div class="card-footer p-4">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-facebook" type="button">
                                    <span>facebook</span>
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-twitter" type="button">
                                    <span>twitter</span>
                                </button>
                            </div>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
