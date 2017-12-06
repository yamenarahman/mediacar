@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#modelId">
          <i class="fa fa-plus"></i> Add new driver
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId">Modal title</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Body
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-responsive-sm table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $driver)
                    <tr>
                        <td scope="row">{{ $driver->name }}</td>
                        <td>{{ $driver->phone }}</td>
                        <td></td>
                        <td>
                            <form class="form-inline">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            </form>
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