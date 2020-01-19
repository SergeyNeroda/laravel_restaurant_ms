@extends('layouts.app')

@section('content')

{{-- --}}
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">

        </div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Вхід в систему</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-label-group">
                                    {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}


                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Імейл" required autofocus>
                                    <label for="email">Імейл</label>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-label-group">
                                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}


                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Пароль" required>
                                    <label for="password">Пароль</label>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>


                                <div class="custom-control custom-checkbox mb-3">
                                  <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                  <label class="custom-control-label" for="remember">
                                      {{ __("Запам'ятати мене") }}
                                  </label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2">
                                    {{ __('Вхід') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                  <div class="text-center">
                                <a class="small" href="{{ route('password.request') }}">
                                    {{ __('Забули пароль?') }}
                                </a>
                              </div>
                                @endif --}}

                                {{-- --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
