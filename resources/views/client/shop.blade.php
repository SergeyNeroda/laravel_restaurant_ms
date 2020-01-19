@extends('layouts.client')
@section('title','Каталог товарів')

@section('content')

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">
                            Список категорій: <span class="sr-only">(current)</span>
                        </a>
                    </li>

                </ul>
                <div class="list-group" style="margin-left:10px;margin-right:10px;margin-top:5px">

                    @forelse ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ url('/shop/category',$category->id) }}" class="">
                            {{ ucwords($category->name) }}
                        </a>
                        <span class="badge badge-primary badge-pill">{{ $category->products->count() }}</span>
                    </li>
                    @empty
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="#" class="">
                            Категорії відсутні
                        </a>
                        <span class="badge badge-primary badge-pill">14</span>
                    </li>
                    @endforelse

                </div>


            </div>
        </nav>
    </div>
</div>

{{-- --}}

<div class="row " style="margin:0px;padding:0px;padding-top:5px;margin-top:45px;min-height:90vh">
    <div class="col-2">

    </div>
    <div class="col-10">
        <div class="album   " style="padding-top:20px">
            <div class="container">
                <div class="row">

                    @forelse ($products as $product)
                    {{-- блок з товаром --}}
                    <div class="col-md-4">
                        <div class="card mb-4  shadow-sm">

                            <img class="card-img-top" src="{{ url('images/products',$product->image) }}" alt="product" width="100%" height="225">
                            <div class="card-body bg-light">
                                <h5 class="card-title">Card title</h5>
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
    </div>
</div>

@endsection
