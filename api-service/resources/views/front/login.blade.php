@extends('front.templates.main')

@section('title', 'Giphy List')

@section('css')
    <link rel="stylesheet" href="css/frontend/login.css">
@endsection


@section('content')
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
                <img src="images/logo.svg" alt="Logo GiphiAPP" height="40px;" class="mb-2">
				<h3>
                    Sign In
                </h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                        <input id="email" type="email" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" placeholder="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
                </form>

			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
                    Don't have an account? 
                    <br>Then you must talk with wonka...
				</div>
				{{-- <div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div> --}}
			</div>
		</div>
	</div>
@endsection