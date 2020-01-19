<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style media="screen">
        :root {
--input-padding-x: 1.5rem;
--input-padding-y: 0.75rem;
}

.login,
.image {
min-height: 91vh;
}

.bg-image {
background-image: url('/images/login.jpg');
background-size: cover;
background-position: center;
}

.login-heading {
font-weight: 300;
}

.btn-login {
font-size: 0.9rem;
letter-spacing: 0.05rem;
padding: 0.75rem 1rem;
border-radius: 2rem;
}

.form-label-group {
position: relative;
margin-bottom: 1rem;
}

.form-label-group>input,
.form-label-group>label {
padding: var(--input-padding-y) var(--input-padding-x);
height: auto;
border-radius: 2rem;
}

.form-label-group>label {
position: absolute;
top: 0;
left: 0;
display: block;
width: 100%;
margin-bottom: 0;
/* Override default `<label>` margin */
line-height: 1.5;
color: #495057;
cursor: text;
/* Match the input under the label */
border: 1px solid transparent;
border-radius: .25rem;
transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
color: transparent;
}

.form-label-group input:-ms-input-placeholder {
color: transparent;
}

.form-label-group input::-ms-input-placeholder {
color: transparent;
}

.form-label-group input::-moz-placeholder {
color: transparent;
}

.form-label-group input::placeholder {
color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
padding-top: calc(var(--input-padding-y) / 3);
padding-bottom: calc(var(--input-padding-y) / 3);
font-size: 12px;
csolor: #777;
}


    #cashier-container {
      height: 91vh; /* 100vh - 100% от высоты viewport(окна браузера) */
    }



    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="" width="65" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Вхід') }}</a>
                        </li> --}}
                        @if (Route::has('register'))
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Реєстрація') }}</a>
                        </li> --}}
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


            @yield('content')

    </div>
</body>

</html>
