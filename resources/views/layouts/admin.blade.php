<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/png">
    <title>@yield('title','Адмін-шаблон')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- datepicker --}}

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- Icon -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('/js/jquery-3.4.1.js') }}" type="text/javascript" charset="utf-8"></script>
    {{-- --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">


</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark shadow">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <a class="navbar-brand" href="#"><img src="{{ asset('images/logo/logo.png') }}" alt="" width="75" height="30"></a>

                </ul>
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

                            {{-- <a class="dropdown-item" href="#">Керування</a>
                            <a class="dropdown-item" href="#">Редагувати</a>
                            <a class="dropdown-item" href="#">Налаштування</a>
                            <div class="dropdown-divider text-light"></div> --}}

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



    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                {{-- --}}
                {{-- --}}
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ url('/') }}">
                                <i class="fas fa-home"></i>
                                Головна <span class="sr-only">(current)</span>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav flex-column">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Керування</span>
                            <a class="d-flex align-items-center text-muted" href="https://getbootstrap.com/docs/4.3/examples/dashboard/#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="16"></line>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                            </a>
                        </h6>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('product') ? 'active' : '' }}" href="{{ url('product/') }}">
                                <i class="fas fa-shopping-basket"></i>
                                Страви
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('test') ? 'active' : '' }}" href="{{ url('test/') }}">
                                <i class="fas fa-book"></i>
                                Рецепти
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('category') ? 'active' : '' }}" href="{{ url('category/') }}">
                                <i class="far fa-list-alt"></i>
                                Категорії
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ request()->is('tag') ? 'active' : '' }}" href="{{ url('tag') }}">
                                <i class="fas fa-tag"></i>
                                Теги
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user') ? 'active' : '' }}" href="{{ url('user') }}">
                                <i class="fas fa-users"></i>
                                Користувачі
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('orders') ? 'active' : '' }}" href="/orders">
                                <i class="fas fa-clipboard-list"></i>
                                Замовлення
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('tables') ? 'active' : '' }}" href="/tables">
                                <i class="fas fa-wine-glass-alt"></i>
                                Столи
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ request()->is('statuses') ? 'active' : '' }}" href="/statuses">
                                <i class="fas fa-wine-glass-alt"></i>
                                Статуси замовлень
                            </a>
                        </li> --}}

                          <li class="nav-item">
                              <a class="nav-link {{ request()->is('suppliers') ? 'active' : '' }}" href="/suppliers">
                                  <i class="fas fa-briefcase"></i>
                                  Постачальники
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link {{ request()->is('ingredients') ? 'active' : '' }}" href="/ingredients">

                                  <i class="fas fa-boxes"></i>
                                  Інгредієнти
                              </a>
                          </li>
                          {{-- <li class="nav-item">
                              <a class="nav-link {{ request()->is('recipes') ? 'active' : '' }}" href="/recipes">
                                  <i class="fas fa-book"></i>
                                  Рецепти
                              </a>
                          </li> --}}
                          <li class="nav-item">
                              <a class="nav-link {{ request()->is('units') ? 'active' : '' }}" href="/units">
                                  <i class="fas fa-pencil-ruler"></i>
                                  Одиниці вимірювання
                              </a>
                          </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ request()->is('posts') ? 'active' : '' }}" href="{{ url('posts') }}">
                                <i class="far fa-newspaper"></i>
                                Новини
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('daterange') ? 'active' : '' }}" href="{{ url('daterange') }}">
                                <i class="far fa-newspaper"></i>
                                Новини 2
                            </a>
                        </li> --}}

                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Медіа</span>
                        <a class="d-flex align-items-center text-muted" href="https://getbootstrap.com/docs/4.3/examples/dashboard/#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        {{-- лінки для старого файлового менеджера --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/laravel-filemanager?type=Images">
                                <i class="far fa-file-image"></i>
                                Менеджер зображень
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/laravel-filemanager?type=Files">
                                <i class="far fa-file"></i>
                                Менеджер файлів
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/file">
                                <i class="far fa-file"></i>
                                Менеджер файлів
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adminer" target="_blank ">
                                <i class="fas fa-database"></i> Менеджер БД</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ request()->is('file') ? 'active' : '' }}" href="/file">
                                <i class="fas fa-poll"></i>
                                Витрати
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('file') ? 'active' : '' }}" href="/file">
                                <i class="fas fa-chart-line"></i>
                                Дохід
                            </a>
                        </li> --}}

                    </ul>


{{--  --}}

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Панель керування</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Поділитися</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Експорт</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            Цей тиждень
                        </button>
                    </div>
                </div> --}}
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>

</body>

</html>
