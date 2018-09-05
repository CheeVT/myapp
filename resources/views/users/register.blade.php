@include('partials.header')
<h2 class="bd-title">Register</h2>
<div class="row">
    <form action="{{ route('registerAction') }}" method="POST" class="col-4">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}" />
            @include('partials.error-message', ['field' => 'email'])
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" />
            @include('partials.error-message', ['field' => 'password'])
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
            @include('partials.error-message', ['field' => 'password_confirmation'])
        </div>

        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}" />
            @include('partials.error-message', ['field' => 'first_name'])
        </div>

        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}" />
            @include('partials.error-message', ['field' => 'last_name'])
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" id="company" class="form-control" name="company" value="{{ old('company') }}" />
            @include('partials.error-message', ['field' => 'company'])
        </div>

        <div class="form-group">
            <label for="company">Country</label>
            <select class="custom-select mr-sm-2" name="country">
                <option value="">Choose country</option>
                @if($countries)
                    @foreach($countries as $country)                
                        <option value="{{ $country['name'] }}" {{ old('country') == $country['name'] ? 'selected': '' }}>{{ $country['name'] }}</option>
                    @endforeach
                @endif
            </select>
            @include('partials.error-message', ['field' => 'country'])
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>

</div>
@include('partials.footer')