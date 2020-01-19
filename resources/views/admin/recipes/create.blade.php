@extends('layouts.admin')
@section('title','Додати рецепт')
@section('content')
<div style="height:15px">

</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3>Додати до рецепту</h3>
            </div>
            <div class="col-md-2">
                <a href="{{ Redirect::route('recipes.index') }}" class="btn btn-info">Назад</a>
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
                        <form action="{{ route('recipes.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group{{ $errors->has('select_product')?' has-error':'' }}">
                                        <label for="select_product">Продукт</label>
                                        <select name="select_product" class="form-control" id="select_product">
                                            <option value="0" disabled selected>Оберіть продукт</option>
                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('select_product') }}</span>

                                    </div>

                                    <div class="form-group{{ $errors->has('select_ingredient')?' has-error':'' }}">
                                        <label for="select_ingredient">Інгредієнт</label>
                                        <select name="select_ingredient" class="form-control" id="select_ingredient">
                                            <option value="" disabled selected>Оберіть інгредієнт</option>
                                            @foreach ($ingredients as $ingredient)
                                            <option value="{{ $ingredient->id }}">{{ $ingredient->name_ingredient }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('select_ingredient') }}</span>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('select_unit')?' has-error':'' }}">
                                        <label for="select_unit">Одиниця виміру</label>
                                        <select name="select_unit" class="form-control" id="select_unit">
                                            <option value="" disabled selected>Оберіть одиницю виміру</option>
                                            @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name_unit }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('select_unit') }}</span>
                                    </div>

                                    <div class="form-group{{ $errors->has('quantity')?' has-error':'' }}">
                                        <label for="quantity">Кількість</label>
                                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity...">
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
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
