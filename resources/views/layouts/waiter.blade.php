<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>@yield('title','layout-client')</title>
    <script src="{{ asset('/js/jquery-3.4.1.js') }}" type="text/javascript" charset="utf-8"></script>
    <style media="screen">

    </style>
</head>

<body>
    <div class="container">
{{--  --}}

{{--  --}}
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-dark fixed-top bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <a class="navbar-brand" href="{{ url('waiter') }}"><img src="{{ asset('images/logo/logo.png') }}" alt="" width="65" height="30"></a>
                    <li class="nav-item">
                            <a class="nav-link {{ request()->is('waiter') ? 'active' : '' }}" href="{{ url('/waiter') }}">
                              @lang('home.home_menu')
                            </a>
                    </li>
                    <li class="nav-item">

                            <a class="nav-link {{ request()->is('waiter/cooked') ? 'active' : '' }}" href="{{ url('/waiter/cooked') }}">
                                Приготовані замовлення
                            </a>
                    </li>
                    <li class="nav-item">

                            <a class="nav-link {{ request()->is('waiter/cook') ? 'active' : '' }}" href="{{ url('/waiter/cook') }}">
                                Отримані замовлення
                            </a>
                    </li>
                </ul>


                {{-- localization --}}
                <form class="form-inline">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="locale/en">EN</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="locale/ua">UA</a>
                        </li>
                    </ul>
                </form>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav justify-content-end col-md-1">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                      <li class="nav-item dropdown ">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu  bg-white  dropdown-menu-right" aria-labelledby="navbarDropdown">


                              {{-- <div class="dropdown-divider text-light"></div> --}}

                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                  <i class="fas fa-sign-out-alt"></i> {{ __('Вихід') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>

                          </div>
                      </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>

    @yield('content')
    <!-- Optional JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
