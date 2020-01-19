@extends('layouts.client')
@section('title','Корзина покупок')

@section('content')
@if (Session::has('cart'))


<div class="container">
    <div class="table" style="padding-top:70px">
        <table class="table table-striped table-bordered table-responsive-sm ">
            <thead class="thead-dark">
                <th style="width:20%">Зображення</th>
                <th>Назва</th>
                <th>Ціна</th>
                <th style="width:5%">Кількість</th>
                <th style="width:30%">Дії</th>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td><img src="{{ url('images/products',$product['item']['image']) }}" alt="" width="100"></td>
                    <td>{{ $product['item']['name'] }}</td>
                    <td>{{ $product['item']['price'] }}</td>
                    <td>{{ $product['qty'] }}</td>

                    <td class="hidden-xs text-center">

                        <a class="btn btn-secondary" href="{{ url('/cart/reduce', ['id' => $product['item']['id']])}}"><i class="fas fa-minus"></i></a>

                        <a class="btn btn-secondary" href="{{ url('/cart/add',$product['item']['id']) }}"><i class="fas fa-plus"></i></a>

                        <a class="btn btn-secondary" href="{{ url('/cart/removeItem', ['id' => $product['item']['id']])}}"><i class="fas fa-trash"></i></a>

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
            <tfoot>

                <tr>
                    <td><a href="{{ Redirect::back()->getTargetUrl() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Назад</a></td>

                    <td colspan="3" class="hidden-xs text-center"><strong>Загальна вартість: {{ $totalPrice }} грн</strong></td>
                    <td><a href="{{ url('/checkout') }}" class="btn btn-success btn-block">Замовити <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
        </table>
        <div class="row justify-content-center align-items-center">
            {{-- {{ $products->links('layouts.paginate') }} --}}
        </div>
    </div>
</div>
@else
<h1 style="padding-top:50px">Корзина порожня</h1>
@endif
@endsection
