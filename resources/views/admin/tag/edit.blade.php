@extends('layouts.admin')
@section('title','Редагувати тег')
@section('content')
  <div class="container">
      <h2>Редагувати тег</h2>
      <div class="col-md-12">
          <div class="panel-body">
              <form action="{{ route('tag.update', $tag->id) }}" method="POST" role="form" enctype="multipart/form-data">

                  @method('PATCH')
                  @csrf
                  <div class="form-group{{ $errors->has('name')?' has-error':'' }}">
                      <label for="name">Назва</label>
                      <input type="text" class="form-control" name="name" value={{ $tag->name }} id="name" placeholder="name...">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  </div>

                  <div class="form-group{{ $errors->has('slug')?' has-error':'' }}">
                      <label for="slug">Опис</label>
                      <input type="text" class="form-control" name="slug" value={{ $tag->slug }} id="slug" placeholder="slug...">
                      <span class="text-danger">{{ $errors->first('slug') }}</span>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>

              </form>
          </div>
      </div>
  </div>
@endsection
