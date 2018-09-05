@include('partials.header')
<h2 class="bd-title">Login</h2>
<div class="row">    
    <form action="{{ route('loginAction') }}" method="POST" class="col-4">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" name="email" />
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div class="form-group">
            <a class="badge badge-secondary" href="{{ route('register') }}">Register</a>
        </div>
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

</div>
@include('partials.footer')