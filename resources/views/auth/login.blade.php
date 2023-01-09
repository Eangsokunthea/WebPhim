@extends('layouts.app')

@section('content')


    <div class="box">
        <form method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
            <h2>Sign in</h2>
            <div class="inputBox">
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span>{{ __('Email Address') }}</span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i></i>
            </div>
            <div class="inputBox">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span>{{ __('Password') }}</span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i></i>
            </div>
            
            <div class="links">
            
                <a href="#">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="form-check-label " for="remember">{{ __('Remember Me') }}</span>
                    </div>
                </a>
                <!-- <a href="#">Forgot Password ?</a> -->
                <a href="#">Signup</a>
            </div>
            <input type="submit" value="{{ __('Login') }}">
                @if (Route::has('password.request'))
                    <div class="links">
                        <a style="text-align:center;"  href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>

                @endif
                
        </form>
	</div>


@endsection

