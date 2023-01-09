@extends('layouts.app')

@section('content')

<style>
	.box {
		position: relative;
		width: 380px;
		height: 570px;
		background: #1c1c1c;
		border-radius: 8px;
		overflow: hidden;
	}
</style>

	<div class="box">
		<form method="POST" action="{{ route('register') }}" autocomplete="off">
			@csrf
			<h2>Sign in</h2>
			<div class="inputBox">
				<input type="text" id="name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
				<span>{{ __('Name') }}</span>
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<i></i>
			</div>
			<div class="inputBox">
				<input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
				<span>{{ __('Email Address') }}</span>
				
				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<i></i>
			</div>
			<div class="inputBox">
				<input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
				<span>{{ __('Password') }}</span>
				
				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<i></i>
			</div>
			<div class="inputBox">
				<input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
				<span>{{ __('Confirm Password') }}</span>
				<i></i>
			</div>
			<div class="links">
				<a href="#">Forgot Password ?</a>
				<a href="#">Signup</a>
			</div>
			<!-- <button type="submit" class="btn btn-primary">
				{{ __('Register') }}
			</button> -->
			<input type="submit" value="{{ __('Register') }}">
		</form>
	</div>
@endsection
