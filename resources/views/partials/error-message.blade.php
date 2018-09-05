@if($errors->has($field))
    @foreach($errors->get($field) as $error)
        <p style="font-size: 10px; color: #F00;">{{ $error }}</p>
    @endforeach
@endif