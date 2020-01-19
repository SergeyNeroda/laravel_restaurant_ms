@extends('layouts.admin')
@section('title','Поставщики')
@section('content')
  <div style="height:15px">

  </div>
  <div class="card">
      <div class="card-header">

        <div class="row">
          <div class="col-md-11">
            <h4>Список постачальників</h4>
          </div>
          <div class="col-md-1">
            <h3><a href="{{ route('suppliers.create') }}" class="badge badge-success">
              <i class="fas fa-plus"></i>
            </a></h3>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered table-responsive-sm text-center">
            <thead>
              <th>#</th>
                <th>Назва постачальника</th>
                <th>Статус</th>
                <th>Місто</th>
                <th>Адреса</th>
                <th>Телефон</th>
                <th>Дії</th>

            </thead>
            <tbody>
                @forelse ($supplier as $element)
                <tr>
                    {{-- <p>{{ $element->ingredient_id }}</p> --}}
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name_supplier }}</td>
                    <td>{{ $element->status }}</td>
                    <td>{{ $element->city }}</td>
                    <td>{{ $element->address }}</td>
                    <td>{{ $element->tel }}</td>

                    <td style="width:15%">
                      <div class="row justify-content-md-center">

                          <a class="btn btn-success" href="{{ route('suppliers.edit',$element->id)}}" name="btn btn-sm btn-danger"><i class="fas fa-marker"></i></a>

                        <form action="{{ route('suppliers.destroy',$element->id) }}" method="post">
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
                    <td colspan="7">
                        <h1 class="text-center">Постачальники відсутні</h1>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="row justify-content-center align-items-center">
            {{ $supplier->links('layouts.paginate') }}
        </div>
      </div>
  </div>
  <div style="height:15px">

  </div>
@endsection
