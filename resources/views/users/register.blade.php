<form action="{{ route('registerAction') }}" method="POST">
    {{ csrf_field() }}
    
    <p>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" />
        @include('partials.error-message', ['field' => 'email'])
    </p>

    <p>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" />
        @include('partials.error-message', ['field' => 'password'])
    </p>

    <p>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" />
        @include('partials.error-message', ['field' => 'password_confirmation'])
    </p>

    <p>
        <label for="first_name">First name</label>
        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" />
        @include('partials.error-message', ['field' => 'first_name'])
    </p>

    <p>
        <label for="last_name">Last name</label>
        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" />
        @include('partials.error-message', ['field' => 'last_name'])
    </p>

    <p>
        <label for="company">Company</label>
        <input type="text" id="company" name="company" value="{{ old('company') }}" />
        @include('partials.error-message', ['field' => 'company'])
    </p>

    <p>
        <label for="company">Country</label>
        <select name="country">
            <option value="">Choose country</option>
            @foreach($countries as $country)                
                <option value="{{ $country['name'] }}" {{ old('country') == $country['name'] ? 'selected': '' }}>{{ $country['name'] }}</option>
            @endforeach
        </select>
        @include('partials.error-message', ['field' => 'country'])
    </p>

    <p>
        <button type="submit">Register</button>
    </p>
</form>