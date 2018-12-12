<!DOCTYPE html>
<html>
<head>
	<title>
        Login
    </title>
   
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.0.0/css/bootstrap.css') }}">
</head>
<body>
    
<style>
    /* Made with love by Mutiullah Samim*/

    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,body{
        background-image: url('/images/login-bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }

    .container{
        height: 100%;
        align-content: center;
    }

    .card{
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0,0,0,0.5) !important;
    }

    .social_icon span{
        font-size: 60px;
        margin-left: 10px;
        color: #51ce00;
    }

    .social_icon span:hover{
        color: white;
        cursor: pointer;
    }

    .card-header h3{
        color: white;
    }

    .social_icon{
    position: absolute;
    right: 20px;
    top: -45px;
    }

    .input-group-prepend span{
        width: 50px;
        background-color: #51ce00;
        color: black;
        border:0 !important;
    }

    input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;

    }

    .remember{
        color: white;
    }

    .remember input
    {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    .login_btn{
        color: black;
        background-color: #51ce00;
        width: 100px;
    }

    .login_btn:hover{
        color: black;
        background-color: white;
    }

    .links{
        color: white;
    }

    .links a{
        margin-left: 4px;
    }
</style>

<div class="container">
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

                {!! Form::open(['action'=>'UsersController@login', 'method'=>'POST']) !!}

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
                
                {!! Form::close() !!}

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
</div>

<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-4.0.0/js/bootstrap.js') }}"></script>
<script src="{{ asset('plugins/fontawesome-5.5.0/js/all.js') }}"></script>

</body>
</html>