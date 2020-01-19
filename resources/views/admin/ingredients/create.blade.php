@extends('layouts.admin')
@section('title','Створити інгредієнт')
@section('content')
<div style="height:15px">

</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3>Додати інгредієнт</h3>
            </div>
            <div class="col-md-2">
                <a href="{{ url('/ingredients') }}" class="btn btn-info">Назад</a>
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
                        <form action="{{ route('ingredients.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('name_ingredient')?' has-error':'' }}">
                                        <label for="name_ingredient">Назва</label>
                                        <input type="text" class="form-control" name="name_ingredient" id="name_ingredient" >
                                        <span class="text-danger">{{ $errors->first('name_ingredient') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group{{ $errors->has('select_supplier')?' has-error':'' }}">
                                      <label for="select_supplier">Вибір постачальника</label>
                                      <select name="select_supplier" class="form-control" id="select_supplier">
                                          <option value="" disabled selected>Оберіть постачальника</option>
                                          @foreach ($suppliers as $supplier)
                                          <option value="{{ $supplier->id }}">{{ $supplier->name_supplier }}</option>
                                          @endforeach
                                      </select>
                                      <span class="text-danger">{{ $errors->first('select_supplier') }}</span>
                                  </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary">Зберегти зміни</button>

                        </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
