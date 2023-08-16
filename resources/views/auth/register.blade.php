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
    <title>Login - Pos admin template</title>

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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="login-logo">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="img">
                            </div>
                            <div class="login-userheading">
                                <h3>Create an Account</h3>
                                <h4>Continue where you left off</h4>
                            </div>
                            <div class="form-login">
                                <label>Full Name</label>
                                <div class="form-addons">
                                    <input  id="name" type="text" name="name" :value="{{old('name')}}"
                                    required autofocus autocomplete="name" >
                                    <img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img">
                                </div>
                                @if ($errors->get('name'))
                                <code>{{ $errors->get('name') }}</code>
                                @endif
                            </div>
                            <div class="form-login">
                                <label for="email" :value="{{__('Email')}}">Email</label>
                                <div class="form-addons">
                                    <input id="email" type="email" name="email" :value="{{old('email')}}"
                                    required autocomplete="username">
                                    @if ($errors->get('email'))
                                    <code>{{ $errors->get('email') }}</code>
                                    @endif
                                    <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                            </div>

                            <div class="form-login">
                                <label for="password" :value="{{__('Password')}}">Password</label>
                                <div class="pass-group">
                                    <input class="pass-input"  id="password"  type="password" name="password" required
                                    autocomplete="new-password">
                                    @if ($errors->get('password'))
                                    <code>{{ $errors->get('password') }}</code>
                                    @endif
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>

                            <div class="form-login">
                               <button class="btn btn-login" value="submit" type="submit">Register</button>
                            </div>
                            <div class="signinform text-center">
                                <h4>Already a user? <a href="{{ route('login') }}" class="hover-a">Sign In</a></h4>
                            </div>
                            <div class="form-setlogin">
                                <h4>Or sign up with</h4>
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







