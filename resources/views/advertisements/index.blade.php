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
        <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#create-advertisement">
          <i class="fa fa-plus"></i> Add new advertisement
        </button>

        <!-- Modal -->
        <div class="modal fade" id="create-advertisement" tabindex="-1" role="dialog" aria-labelledby="create-advertisement" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="create-advertisement">Create new advertisement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="create-advertisement-form" action="{{ route('advertisements.store') }}">
                            {{ csrf_field() }}

                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="type" value="picture" checked>
                                    Banner
                              </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="type" value="video">
                                    Video
                              </label>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-tag"></i>
                                </span>
                                <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="title" aria-describedby="helpId" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon">
                                    <i class="icon-link"></i>
                                </span>
                                <input type="text" name="source" id="source" class="form-control{{ $errors->has('source') ? ' is-invalid' : '' }}" placeholder="source" aria-describedby="helpId" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-primary" onclick="event.preventDefault();document.getElementById('create-advertisement-form').submit();">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Source</th>
                            <th>Type</th>
                            <th>Preview</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($advertisements as $advertisement)
                            <tr>
                                <td scope="row">{{ $advertisement->title }}</td>
                                <td>{{ $advertisement->source }}</td>
                                @switch($advertisement->type)
                                    @case('video')
                                        <td><i class="fa fa-video-camera" aria-hidden="true"></i></td>
                                        <td>
                                            <iframe src="{{ 'https://www.youtube.com/embed/'.$advertisement->source }} " width="200px" height="200px" frameborder="0"></iframe>
                                        </td>
                                        @break
                                    @case('picture')
                                        <td><i class="fa fa-picture-o" aria-hidden="true"></i></td>
                                        <td>
                                            <img src="{{ $advertisement->source }}" class="img img-responsive" width="200px" height="200px">
                                        </td>
                                        @break
                                    @default

                                @endswitch
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-default pull-left" data-toggle="modal" data-target="#edit-advertisement-{{ $advertisement->id }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit-advertisement-{{ $advertisement->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-advertisement" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="edit-advertisement">Edit advertisement</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" id="edit-advertisement-form-{{ $advertisement->id }}" action="{{ url('/advertisements/'.$advertisement->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}

                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="type" id="type" value="picture" checked> Banner
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="type" id="type" value="video"> Video
                                                            </label>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-addon">
                                                                <i class="icon-tag"></i>
                                                            </span>
                                                            <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="title"
                                                                aria-describedby="helpId" required value="{{ $advertisement->title }}">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-addon">
                                                                <i class="icon-link"></i>
                                                            </span>
                                                            <input type="text" name="source" id="source" class="form-control{{ $errors->has('source') ? ' is-invalid' : '' }}" placeholder="source"
                                                                aria-describedby="helpId" required value="{{ $advertisement->source }}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a class="btn btn-primary" onclick="event.preventDefault();document.getElementById('edit-advertisement-form-{{ $advertisement->id }}').submit();">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="form-inline" action="{{ url('/advertisements/'.$advertisement->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" id="delete-advertisement-btn" onclick="return confirm('Confirm, please.');">
                                            <i class="fa fa-trash"></i> Delete</button>
                                    </form>
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