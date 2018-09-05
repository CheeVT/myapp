@if($errors->has($field))
    @foreach($errors->get($field) as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@endif