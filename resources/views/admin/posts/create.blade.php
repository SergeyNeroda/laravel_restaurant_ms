@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Створити новину</div>
                <div class="card-body">
                    <form method="post" action="{{ route('posts.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Заголовок новини: </label>
                            <input type="text" name="title" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="label">Новина: </label>
                            <div class="form-group{{ $errors->has('info')?' has-error':'' }}">
                                <textarea name="body" class="form-control"></textarea>
                                <script>
                                    CKEDITOR.replace('body', {
                                      filebrowserImageBrowseUrl: '/file-manager/ckeditor',
                                    });
                                </script>
                            </div>
                        </div>
                        {{-- випадаючий список --}}

                        <div class="form-group">
                          <select class="form-control custom-select" name="product_id">

                              {{-- <option>Оберіть тег</option> --}}

                              @foreach ($tags as $key => $value)
                              <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}>
                                  {{ $value }}
                              </option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
