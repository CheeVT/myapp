<form action="{{ route('loginAction') }}" method="POST">
    {{ csrf_field() }}
    <label for="email">Email</label>
    <input type="text" id="email" name="email" />

    <label for="password">Password</label>
    <input type="text" id="password" name="password" />

    <button type="submit">Login</button>
</form>

@if (count($errors->all()) > 0)

@foreach($errors->all() as $error)
<div class="form-group">
    <ul class="alert alert-danger">
        <li>{{ $error }}</li>
    </ul>
</div>
@endforeach

@endif