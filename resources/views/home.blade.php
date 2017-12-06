@extends('layouts.app')

@section('content')
    @role('Admin')
        @include('dashboard')
        @section('footer')
            @include('layouts.footer')
        @endsection
    @else
        @include('commercials')
    @endrole
@endsection