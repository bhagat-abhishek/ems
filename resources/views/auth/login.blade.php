<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Employees Record Management System for Sikkim">
        <meta name="keywords" content="ems, employees management systems, sikkim ems">
        <meta name="author" content="iambhagatt">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>{{ config('app.name', 'EMS Sikkim') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">

        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/lime.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page err-500">
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="container">
            <div class="login-container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-9 lfh">
                        <div class="card login-box">
                            <div class="card-body">
                                <h5 class="card-title">Sign In</h5>
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="custom-control custom-checkbox form-group">
                                        <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                        <label class="custom-control-label" for="exampleCheck1">Remember</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right m-l-xxs">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        

        <!-- Javascripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/lime.min.js') }}"></script>
    </body>
</html>