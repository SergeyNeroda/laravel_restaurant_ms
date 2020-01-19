@extends('layouts.admin')
@section('title','Додати користувача')
@section('content')
<div class="card">
  <div class="card-header">

    <div class="row">
        <div class="col-md-10">
            <h4>Додати нового користувача</h4>
        </div>
        <div class="col-md-2">
            <a href="{{ Redirect::back()->getTargetUrl() }}" class="btn btn-info">Назад</a>
        </div>
    </div>
  </div>
  <div class="card-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <form action="{{ route('user.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group{{ $errors->has('role')?' has-error':'' }}">
                                    <label for="role">Роль</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value="0" disabled selected>Оберіть роль</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('role') }}</span>

                                </div>
                                <div class="form-group{{ $errors->has('name')?' has-error':'' }}">
                                    <label for="name">Ім'я</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Ім'я">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>




                            </div>
                            <div class="col-md-6">


                                <div class="form-group{{ $errors->has('email')?' has-error':'' }}">
                                    <label for="email">Імейл</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Імейл">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group{{ $errors->has('password')?' has-error':'' }}">
                                    <label for="password">Пароль</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Пароль">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary">Зберегти зміни</button>

                    </form>
            </div>
        </div>
    </div>
  </div>
</div>
{{--  --}}

@endsection
