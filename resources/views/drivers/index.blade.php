@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <b-alert variant="danger"
                    show
                    dismissible>
                    {{ $error }}
                </b-alert>
            @endforeach
        @endif
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#create-driver">
          <i class="fa fa-plus"></i> Add new driver
        </button>

        <!-- Modal -->
        <div class="modal fade" id="create-driver" tabindex="-1" role="dialog" aria-labelledby="create-driver" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="create-driver">Create new driver</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="create-driver-form" action="{{ route('drivers.store') }}">
                            {{ csrf_field() }}

                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                                <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="name" aria-describedby="helpId" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-phone"></i>
                                </span>
                                <input type="text" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="phone"
                                    aria-describedby="helpId" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-credit-card"></i>
                                </span>
                                <input type="text" name="national-id" id="national-id" class="form-control{{ $errors->has('national-id') ? ' is-invalid' : '' }}" placeholder="national-id"
                                    aria-describedby="helpId">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-flag"></i>
                                </span>
                                <input type="text" name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="city" aria-describedby="helpId">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-primary" onclick="event.preventDefault();document.getElementById('create-driver-form').submit();">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-responsive-sm table-striped datatable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>National ID</th>
                    <th>City</th>
                    <th>Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $driver)
                    <tr>
                        <td scope="row">{{ $driver->name }}</td>
                        <td>{{ $driver->phone }}</td>
                        <td>{{ optional($driver->information)->nationalId }}</td>
                        <td>{{ optional($driver->information)->city }}</td>
                        <td>{{ $driver->allHours }} <a href="{{ url('/drivers/'.$driver->id) }}" class="btn btn-outline-primary">view report</a></td>
                        <td>

                            <ul class="list-group" style="list-style: none;">
                                <li>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-default pull-left" data-toggle="modal" data-target="#edit-driver-{{ $driver->id }}">
                                        <i class="fa fa-edit"></i> Edit driver
                                    </button>
                                </li>
                                <li>
                                    <form class="form-inline" action="{{ url('/drivers/'.$driver->id) }}" method="POST">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" id="delete-driver-btn" onclick="return confirm('Confirm, please.');">
                                            <i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="POST" id="edit-driver-form-{{ $driver->id }}" action="{{ url('/drivers/'.$driver->id) }}">
                                        {{ csrf_field() }} {{ method_field('PUT') }}
                                        <input type="hidden" name="reset" value="reset">
                                        <button type="submit" class="btn btn-info" id="reset-driver-btn" onclick="return confirm('Confirm, please.');">
                                            <i class="fa fa-trash"></i> Reset password</button>
                                    </form>
                                </li>
                            </ul>

                            <!-- Modal -->
                            <div class="modal fade" id="edit-driver-{{ $driver->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-driver" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="edit-driver">Edit driver</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="edit-driver-form-{{ $driver->id }}" action="{{ url('/drivers/'.$driver->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}

                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon">
                                                        <i class="icon-user"></i>
                                                    </span>
                                                    <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="name"
                                                        aria-describedby="helpId" required value="{{ $driver->name }}">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon">
                                                        <i class="icon-phone"></i>
                                                    </span>
                                                    <input type="text" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="phone"
                                                        aria-describedby="helpId" required value="{{ $driver->phone }}">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon">
                                                        <i class="icon-credit-card"></i>
                                                    </span>
                                                    <input type="text" name="national-id" id="national-id" class="form-control{{ $errors->has('national-id') ? ' is-invalid' : '' }}"
                                                    placeholder="national-id" aria-describedby="helpId" value="{{ optional($driver->information)->nationalId }}" >
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-addon">
                                                        <i class="icon-flag"></i>
                                                    </span>
                                                    <input type="text" name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="city" aria-describedby="helpId" value="{{ optional($driver->information)->city }}">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a class="btn btn-primary" onclick="event.preventDefault();document.getElementById('edit-driver-form-{{ $driver->id }}').submit();">Save</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    @section('footer')
        @include('layouts.footer')
    @endsection
@endsection
@push('js')
    <script>
        document.addEventListener("turbolinks:load", function(){
            $(".datatable").DataTable();
        });
    </script>
@endpush