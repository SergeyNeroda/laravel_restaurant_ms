@extends('layouts.admin')
@section('title','Столи')
@section('content')
  <div style="height:15px">

  </div>
  <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-11">
            <h4>Список столів</h4>
          </div>
          <div class="col-md-1">
            <h3><a href="{{ route('tables.create') }}" class="badge badge-success">
              <i class="fas fa-plus"></i>
            </a></h3>
          </div>
        </div>

      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered table-responsive-sm text-center">
            <thead>
                <th>#</th>
                <th>Назва столу</th>
                <th>Дії</th>

            </thead>
            <tbody>
                @forelse ($tables as $element)
                <tr>
                    {{-- <p>{{ $element->ingredient_id }}</p> --}}
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name }}</td>
                    <td style="width:15%">
                      <div class="row justify-content-md-center">

                          <a class="btn btn-success" href="{{ route('tables.edit',$element->id)}}" name="btn btn-sm btn-danger"><i class="fas fa-marker"></i></a>

                        <form action="{{ route('tables.destroy',$element->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" name="button">
                              <i class="fas fa-trash"></i>
                            </button>

                        </form>
                      </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <h1 class="text-center">Столи відсутні</h1>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="row justify-content-center align-items-center">
            {{ $tables->links('layouts.paginate') }}
        </div>
      </div>
  </div>
  <div style="height:15px">

  </div>
@endsection
