@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            @if($errors->any())
                @foreach($errors->all() as $error)

                    <b-alert show variant="danger">
                        {{ $error }}
                    </b-alert>
                @endforeach
            @endif
            <div class="card">
                <div class="card-header">
                    Settings
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/settings') }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="input-group mb-3">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="name"
                                aria-describedby="helpId" required value="{{ auth()->user()->name }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-addon">
                                <i class="icon-phone"></i>
                            </span>
                            <input type="text" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="phone"
                                aria-describedby="helpId" required value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-addon">
                                <i class="icon-lock"></i>
                            </span>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
                        </div>

                        <div class="input-group mb-4">
                            <span class="input-group-addon">
                                <i class="icon-lock"></i>
                            </span>
                            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm password">
                        </div>

                        <button class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('footer')
        @include('layouts.footer')
    @endsection
@endsection