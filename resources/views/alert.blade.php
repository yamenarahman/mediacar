@if($errors->any())
    @foreach($errors->all() as $error)
        <b-alert variant="danger"
            show
            dismissible>
            {{ $error }}
        </b-alert>
    @endforeach
@endif