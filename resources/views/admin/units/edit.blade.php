@extends('layouts.admin')
@section('title','Редагувати одиницю виміру')
@section('content')
  <div style="height:15px">

  </div>
  <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col-md-10">
                  <h3>Редагувати одиницю виміру</h3>
              </div>
              <div class="col-md-2">
                  <a href="/units" class="btn btn-info">Назад</a>
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
                          <form action="{{ route('units.update',$units->id) }}" method="POST" role="form" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('code_unit')?' has-error':'' }}">
                                        <label for="code_unit">Код</label>
                                        <input type="text" class="form-control" name="code_unit" id="code_unit"  value="{{ $units->code_unit }}">
                                        <span class="text-danger">{{ $errors->first('code_unit') }}</span>
                                    </div>

                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('name_unit')?' has-error':'' }}">
                                        <label for="name_unit">Назва</label>
                                        <input type="text" class="form-control" name="name_unit" id="name_unit"  value="{{ $units->name_unit}}">
                                        <span class="text-danger">{{ $errors->first('name_unit') }}</span>
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
