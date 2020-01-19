@extends('layouts.admin')
@section('title','Список продуктів')
@section('content')
<div style="height:15px">

</div>
<div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-11">
          <h3>Список страв</h3>
        </div>
        <div class="col-md-1">
          <h3><a href="{{ route('product.create') }}" class="badge badge-success">
            <i class="fas fa-plus"></i>
          </a></h3>
        </div>
      </div>
    </div>
    <div class="card-body">
        <div class="table text-center">
            <table class="table table-striped table-bordered table-responsive-sm">
                <thead class="thead-dark text-white">
                    <th>Зображення</th>
                    <th>Назва</th>
                    <th>Ціна</th>
                    <th>Категорія</th>
                    <th colspan="3">Дії</th>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td><img src="{{ url('images/products',$product->image) }}" alt="" width="100"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} грн</td>
                        <td>{{ $product->category->name }}</td>

                        <td width="5%">
                            <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" name="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>

                            </form>
                        </td>
                        <td width="5%">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        </td>
                        <td width="5%">
                            <a class="btn btn-success" href="{{ route('product.edit',$product->id)}}" name="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <h1 class="text-center">Продукти відсутні</h1>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="row justify-content-center align-items-center">
                {{ $products->links('layouts.paginate') }}
            </div>
        </div>
    </div>
</div>


@endsection
