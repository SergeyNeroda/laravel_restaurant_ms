@extends('layouts.admin')
@section('title','Редагувати продукт')
@section('content')
  <div style="height:15px">

  </div>
  <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-10">
            <h3>Редагувати страву</h3>
          </div>
          <div class="col-md-2">
            <a href="{{ Redirect::back()->getTargetUrl() }}" class="btn btn-info">Назад</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="col-md-12">
            <div class="panel-body">
                <form action="{{ route('product.update',$product->id) }}" method="POST" role="form" enctype="multipart/form-data">
                  @method('PATCH')
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('name')?' has-error':'' }}">
                          <label for="name">Назва</label>
                          <input type="text" class="form-control" name="name" value={{ $product->name }} id="name" placeholder="name...">
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                      </div>

                      <div class="form-group{{ $errors->has('code')?' has-error':'' }}">
                          <label for="code">Код</label>
                          <input type="text" class="form-control" name="code" value={{ $product->code }} id="code" placeholder="code...">
                          <span class="text-danger">{{ $errors->first('code') }}</span>
                      </div>

                      <div class="form-group{{ $errors->has('price')?' has-error':'' }}">
                          <label for="price">Ціна</label>
                          <input type="text" class="form-control" name="price" value={{ $product->price }} id="price" placeholder="price...">
                          <span class="text-danger">{{ $errors->first('price') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('id_category')?' has-error':'' }}">
                          <label for="id_category">ID Категорії</label>
                          <input type="text" class="form-control" name="id_category" value={{ $product->id_category }} id="id_category" placeholder="id_category...">
                          <span class="text-danger">{{ $errors->first('id_category') }}</span>
                      </div>

                      <div class="form-group{{ $errors->has('image')?' has-error':'' }}">
                          <label for="image">Головна картинка</label>
                          <input type="file" name="image" value={{ $product->image }} class="form-control" />
                          <span class="text-danger">{{ $errors->first('image') }}</span>
                      </div>

                      <div class="form-group{{ $errors->has('spl_price')?' has-error':'' }}">
                          <label for="spl_price">Ціна продажу</label>
                          <input type="text" class="form-control"  value={{ $product->spl_price }} name="spl_price" id="spl_price" placeholder="spl_price...">

                          <span class="text-danger">{{ $errors->first('sale_price') }}</span>
                      </div>
                    </div>
                  </div>


                    <div class="form-group{{ $errors->has('info')?' has-error':'' }}">
                        {{-- <label for="info">Description</label> --}}
                        {{-- <textarea name="info" class="form-control" id="info" rows="500" cols="600"></textarea>
                        <script type="text/javascript">
                            var editor = CKEDITOR.replace('info', {
                              filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                              filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                              filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                              filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                                // uiColor: 'black',

                            });
                        </script> --}}
                        {{-- <span class="text-danger">{{ $errors->first('info') }}</span> --}}
                        <textarea name="info" class="form-control">{{ $product->info }}</textarea>
                        {{-- <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script> --}}
                        <script>
                            CKEDITOR.replace('info', {
                              filebrowserImageBrowseUrl: '/file-manager/ckeditor',
                              // filebrowserImageUploadUrl: '/file-manager/ckeditor/upload?type=Images&_token=',
                            });
                        </script>
                    </div>

                    <button type="submit" class="btn btn-primary">Зберегти зміни</button>

                </form>
            </div>
        </div>
      </div>
  </div>
  <div style="height:15px">

  </div>

@endsection
