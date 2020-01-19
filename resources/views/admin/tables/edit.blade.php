@extends('layouts.admin')
@section('title','Столи')
@section('content')
  <div style="height:15px">

  </div>
  <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col-md-10">
                  <h3>Редагувати стіл</h3>
              </div>
              <div class="col-md-2">
                  <a href="{{ url('/tables') }}" class="btn btn-info">Назад</a>
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
                          <form action="{{ route('tables.update',$table->id) }}" method="POST" role="form" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                              <div class="row">

                                  <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('name_table')?' has-error':'' }}">
                                        <label for="name_table">Назва</label>
                                        <input type="text" class="form-control" name="name_table" id="name_unit" value="{{ $table->name }}">
                                        <span class="text-danger">{{ $errors->first('name_table') }}</span>
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
