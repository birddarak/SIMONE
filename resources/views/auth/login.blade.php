<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIEMON</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ url('assets/o-logo.png') }}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('templates/panel') }}/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="{{ url('templates/panel') }}/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ url('templates/panel') }}/node_modules/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ url('templates/panel') }}/node_modules/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="{{ url('templates/panel') }}/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ url('templates/panel') }}/dist/css/theme.min.css">
    <script src="{{ url('templates/panel') }}/src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('{{ url('assets/kantor.JPG') }}')">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="text-center">
                            <a href="{{ url('templates/panel') }}/index.html">
                                <img src="{{ url('assets/logo.png') }}" width="200" alt="">
                            </a>
                        </div>
                        <p class="text-center"><b>S</b>istem <b>I</b>nformasi <b>E</b>valuasi dan
                            <b>Mon</b>itoring
                        </p>
                        <br>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}" required autofocus autocomplete="username">
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    required autocomplete="current-password" />
                                <i class="ik ik-lock"></i>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember_me"
                                            name="remember" />
                                        <span class="custom-control-label">&nbsp;Remember Me</span>
                                    </label>
                                </div>
                                {{-- <div class="col text-right">
                                    <a href="forgot-password.html">Forgot Password ?</a>
                                </div> --}}
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-theme">Sign In</button>
                            </div>
                        </form>
                        <div class="register">
                            {{-- <p>Don't have an account? <a href="register.html">Create an account</a></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write(
            '<script src="{{ url('templates/panel') }}/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="{{ url('templates/panel') }}/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ url('templates/panel') }}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ url('templates/panel') }}/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="{{ url('templates/panel') }}/node_modules/screenfull/dist/screenfull.js"></script>
    <script src="{{ url('templates/panel') }}/dist/js/theme.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
</body>

</html>


{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}