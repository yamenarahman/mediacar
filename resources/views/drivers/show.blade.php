@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <h3>{{ $driver->name }}</h3>
        <a href="{{ url('/drivers/'.$driver->id.'/shifts') }}" class="btn btn-success pull-right" data-turbolinks="false"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export data</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        @if ($errors->any())
            @foreach ($errors as $error)
                <div class="alert alert-danger" role="alert">
                    <strong>danger</strong> {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="card card-accent-info">
            <div class="card-body">
                <table class="table table-striped table-hover table-responsive datatable">
                    <thead class="thead-default">
                        <tr>
                            <th>Date</th>
                            <th>Hours</th>
                            <th>Ads</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($driver->shifts as $shift)
                            <tr>
                                <td>{{ $shift->created_at->format('d-m-Y') }}</td>
                                <td>{{ floor($shift->minutes / 60).' hours, '.($shift->minutes % 60).' minutes.' }}</td>
                                <td>
                                    <h5>
                                        <span class="badge badge-primary">{{ $shift->adsCount }}</span>
                                    </h5>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    @section('footer')
        @include('layouts.footer')
    @endsection
@endsection
@push('js')
    <script>
        document.addEventListener("turbolinks:load", () => {
            var table = $('.datatable').DataTable({
                lengthChange: false,
                buttons: [{
                    extend: 'pdf',
                    title: '{{ $driver->name.' '.now()->toDateString() }}'
                }]
            });
            table.buttons().container().appendTo('.card-body .col-md-6:eq(0)');
        });
    </script>
@endpush