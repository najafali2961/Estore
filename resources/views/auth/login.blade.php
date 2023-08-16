<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="login-logo">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="img">
                            </div>
                            <div class="login-userheading">
                                <h3>Sign In</h3>
                                <h4>Please login to your account</h4>
                            </div>
                            <div class="form-login">
                                <label  for="email" value="{{__('Email')}}">Email</label>
                                <div class="form-addons">
                                    <input id="email" type="email" name="email" :value="old('email')"
                                    required autofocus autocomplete="username" >
                                    <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                                @if ($errors->get('email'))
                                <code>{{ $errors->get('email') }}</code>
                                @endif
                            </div>



                            <div class="form-login">
                                <label  for="password" :value="{{__('Password')}}">Password</label>
                                <div class="pass-group">
                                    <input id="password" type="password" name="password" required
                                    autocomplete="current-password"  class="pass-input">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                @if ($errors->get('password'))
                                <code>{{ $errors->get('password') }}</code>
                                @endif


                            </div>
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>


                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h4>
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="hover-a">Forgot Password?</a>
                                        @endif</h4>
                                </div>
                            </div>
                            <div class="form-login">
                               <button class="submit btn btn-login" value="submit">Login</button>
                            </div>
                            <div class="signinform text-center">
                                <h4>Don’t have an account? <a href="signup.html" class="hover-a">Sign Up</a></h4>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('assets/img/login.jpg') }}" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>



