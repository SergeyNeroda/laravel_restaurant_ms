@extends('layouts.admin')
@section('title','Замовлення')
@section('content')
  <div style="height:15px">

  </div>
  <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-11">
            <h4>Список замовлень</h4>
          </div>
          <div class="col-md-1">
            {{-- <h3><a href="{{ route('orders.create') }}" class="badge badge-success">
              <i class="fas fa-plus"></i>
            </a></h3> --}}
          </div>
        </div>

      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered table-responsive-sm text-center">
            <thead>
                <th>#</th>
                <th>Користувач</th>
                <th>Статус</th>
                <th>Стіл</th>
                <th>Сумма</th>
                <th>Дата</th>
                <th>Дії</th>

            </thead>
            <tbody>
              @php
                // dd($orders);
              @endphp
                @forelse ($orders as $element)
                <tr>
                    {{-- <p>{{ $element->ingredient_id }}</p> --}}
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->user->name }}</td>
                    <td>{{ $element->status->name }}</td>
                    <td>{{ $element->table_id }}</td>
                    <td>{{ $element->summ }}</td>
                    <td>{{ $element->created_at }}</td>
                    <td style="width:15%">
                      <div class="row justify-content-md-center">

                          {{-- <a class="btn btn-success" href="{{ route('orders.edit',$element->id)}}" name="btn btn-sm btn-danger"><i class="fas fa-marker"></i></a> --}}

                        <form action="{{ route('orders.destroy',$element->id) }}" method="post">
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
                        <h1 class="text-center">Замовлення відсутні</h1>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="row justify-content-center align-items-center">
            {{ $orders->links('layouts.paginate') }}
        </div>
      </div>
  </div>
  <div style="height:15px">

  </div>
@endsection
