@extends('layouts.admin')
@section('title','Список категорій')
@section('content')
  <main>
    <div class="card">
      <div class="card-header">
        <div style="height:10px">

        </div>
          <form action="{{ route('category.store') }}" method="post" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" value="" placeholder="Введіть назву категорії">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Додати</button>
            </div>
            </div>
          </form>
          <div style="height:15px">

          </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-responsive-sm">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Назва</th>
                <th>Дії</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                      <form action="{{ route('category.destroy',$category->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" name="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                          </button>

                      </form>
                  </td>
                </tr>


              @empty
                <tr>Категорії відсутні</tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="row justify-content-center align-items-center">
            {{ $categories->links('layouts.paginate') }}
        </div>
      </div>
    </div>


    {{-- <h3>Список категорій:</h3> --}}



  </main>

@endsection
