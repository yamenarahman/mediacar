@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <h3>{{ $driver->name }}</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card card-accent-info">
            <div class="card-body">
                <table class="table table-striped table-hover table-responsive">
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
                                    <td scope="row">{{ $shift->created_at->format('d-m-Y') }}</td>
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