@extends('layouts.client')
@section('title','Домашня сторінка')

@section('content')
<main role="main" style="margin-top:-5px" >



    <div class="album py-4 bg-white" style="min-height:93vh">
        <div class="container">
            <div class="row">

                @forelse ($products as $product)
                {{-- блок з товаром --}}
                <div class="col-md-3">
                    <div class="card mb-4  shadow-sm">

                        <img class="card-img-top" src="{{ url('images/products',$product->image) }}" alt="product" width="100%" height="170">
                        <div class="card-body bg-light">
                            <h5 class="card-title">Card title</h5>
                            {{-- <h6 class="card-title">{{ $product->name }}</h6> --}}
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">

                                    <a class="btn btn-sm btn-success" href="{{ url('/shop/product',$product->id) }}">Детальніше</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ url('/cart/add',$product->id) }}"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                                <button type="button" class="btn btn-sm btn-info">{{ $product->price." грн" }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <h1 class="text-center">Продукти відсутні</h1>
                @endforelse

            </div>
            <div class="row justify-content-center align-items-center">
                {{ $products->links('layouts.paginate') }}
            </div>
        </div>
    </div>

</main>

@endsection
