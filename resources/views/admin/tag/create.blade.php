@extends('layouts.admin')
@section('title','Створити тег')
@section('content')
  <div class="container">
      <h2>Додати новий тег</h2>
      <div class="col-md-12">
          <div class="panel-body">
              <form action="{{ route('tag.store') }}" method="POST" role="form" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('name')?' has-error':'' }}">
                      <label for="name">Назва</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="name...">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>

                  <div class="form-group{{ $errors->has('slug')?' has-error':'' }}">
                      <label for="slug">Опис</label>
                      <input type="text" class="form-control" name="slug" id="slug" placeholder="slug...">
                      <span class="text-danger">{{ $errors->first('slug') }}</span>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>

              </form>
          </div>
      </div>
  </div>
@endsection
