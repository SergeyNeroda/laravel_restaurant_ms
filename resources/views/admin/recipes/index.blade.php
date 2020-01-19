@extends('layouts.admin')
@section('title','Рецепти')
@section('content')
  <div style="height:15px">

  </div>
  <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-11">
            <h4>Список рецептів</h4>
          </div>
          <div class="col-md-1">
            <h3><a href="{{ route('recipes.create') }}" class="badge badge-success">
              <i class="fas fa-plus"></i>
            </a></h3>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="card">
            <div class="card-header">Вибір страви</div>
            <div class="card-body">
              @if(session()->get('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
                  @endif
                <form method="post" action="{{ route('storeRecept') }}">
                    {{-- випадаючий список --}}
                    <div class="form-group">
                        @csrf
                        <select class="form-control custom-select" name="product_id">
                            <option value="" disabled selected>Оберіть страву</option>
                              @foreach ($products as $key => $value)
                              <option value="{{ $key }}">
                                  {{ $value }}
                              </option>
                              @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
        <div style="height:15px">

        </div>
        <div class="card">
            <div class="card-header">Рецепт
              @php
              echo '- '.$product_name;
              @endphp
          </div>
            <div class="card-body">
                @if (Session::has('product_id_session'))
                @if (isset($val))
                <table class="table table-striped table-bordered table-responsive-sm text-center">
                    <thead>
                        <th>Назва інгредієнту</th>
                        <th>Кількість</th>
                        <th>Од. виміру</th>
                        <th>Дії</th>
                    </thead>
                    <tbody>
                        @forelse ($recipe as $element)
                        <tr>
                            {{-- <p>{{ $element->ingredient_id }}</p> --}}
                            <td>{{ $element->ingredient->name_ingredient }}</td>
                            <td>{{ $element->quantity }}</td>
                            <td>{{ $element->unit->name_unit }}</td>
                            <td style="width:15%">
                              <div class="row justify-content-md-center">

                                  <a class="btn btn-success" href="{{ route('recipes.edit',$element->id)}}" name="btn btn-sm btn-danger"><i class="fas fa-marker"></i></a>

                                <form action="{{ route('recipes.destroy',$element->id) }}" method="post">
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
                            <td colspan="3">
                                <h4 class="text-center">Інгредієнти відсутні</h4>
                            </td>
                            <td colspan="1">
                              @php
                                $id = Session::get('product_id_session');
                                // dump($id);
                              @endphp
                              <form method="get" action="{{ route('recipes.create') }}">
                                  @csrf
                                <button type="submit" class="btn btn-success" name="button">
                                  <i class="fas fa-plus"></i>
                                </button>

                              </form>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- @endforeach --}}

                @endif
                @else
                ви не обрали продукт
                @endif

                @php
                Session::forget('product_id_session')
                @endphp
                {{-- --}}

                {{-- --}}
            </div>
        </div>

      </div>
    </div>
    <div style="height:15px">

    </div>
  {{--  --}}



@endsection
