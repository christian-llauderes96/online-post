<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SignIn Llauderes Project </title>
    <link rel="icon" type="image/x-icon" href="{{ asset("src/assets/img/favicon.ico") }}"/>
    <link href="{{ asset("layouts/modern-dark-menu/css/light/loader.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("layouts/modern-dark-menu/css/dark/loader.css") }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset("layouts/modern-dark-menu/loader.js") }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset("src/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset("layouts/modern-dark-menu/css/light/plugins.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("src/assets/css/light/authentication/auth-boxed.css") }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset("layouts/modern-dark-menu/css/dark/plugins.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("src/assets/css/dark/authentication/auth-boxed.css") }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-xxl-8 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <form action="{{ route("validate.signup") }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        
                                        <h2>Sign Up</h2>
                                        <p>Enter valid information to continue!</p>
                                        
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Firstname</label>
                                            <input type="text" name="fname" class="form-control" value="{{ old("fname") }}">
                                            @error('fname')
                                            <div class="text-danger p-2"> Firstname field is required</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Lastname</label>
                                            <input type="text" name="lname" class="form-control" value="{{ old("lname") }}">
                                            @error('lname')
                                            <div class="text-danger p-2"> Lastname field is required</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" name="user_name" class="form-control" value="{{ old("user_name") }}">
                                            @error('user_name')
                                            <div class="text-danger p-2"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ old("email") }}">
                                            @error('email')
                                            <div class="text-danger p-2"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="text" name="password" class="form-control">
                                            @error('password')
                                            <div class="text-danger p-2"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="text" name="confirm_password" class="form-control">
                                            @error('confirm_password')
                                            <div class="text-danger p-2"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-check form-check-primary form-check-inline">
                                                <input class="form-check-input me-3" type="checkbox" name="term_condition" id="form-check-default">
                                                <label class="form-check-label" for="form-check-default">
                                                    I agree the <a href="javascript:void(0);" class="text-primary">Terms and Conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button class="btn btn-secondary w-100">SIGN UP</button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mb-4">
                                        <div class="">
                                            <div class="seperator">
                                                <hr>
                                                <div class="seperator-text"> <span>Or continue with</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-4">
                                            <button class="btn  btn-social-login w-100 ">
                                                <img src="{{ asset("src/assets/img/google-gmail.svg") }}" alt="" class="img-fluid">
                                                <span class="btn-text-inner">Google</span>
                                            </button>
                                        </div>
                                    </div>
        
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-4">
                                            <button class="btn  btn-social-login w-100">
                                                <img src="{{ asset("src/assets/img/github-icon.svg") }}" alt="" class="img-fluid">
                                                <span class="btn-text-inner">Github</span>
                                            </button>
                                        </div>
                                    </div>
        
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-4">
                                            <button class="btn  btn-social-login w-100">
                                                <img src="{{ asset("src/assets/img/twitter.svg") }}" alt="" class="img-fluid">
                                                <span class="btn-text-inner">Twitter</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-center">
                                            <p class="mb-0">Already have an account ? <a href="{{ route("auth.login") }}" class="text-warning">Sign in</a></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
    
      
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset("src/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>