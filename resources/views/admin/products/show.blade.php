@extends('layouts.admin')
@section('title','Перегляд продукту')
@section('content')
  <div class="card">
      <div class="card-body">
        {{-- --}}
        <div class="container">
            <div class="row">
                <!-- Image -->
                <div class="col-12 col-lg-6">
                    <div class="card bg-light mb-3">
                        <div class="card-body" style="height:410px">
                            <a href="" data-toggle="modal" data-target="#productModal">
                                <img height="800" class="img-fluid" src="{{ url('images/products',$product->image) }}" />
                                <p class="text-center">Zoom</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Add to cart -->
                <div class="col-12 col-lg-6 add_to_cart_block h-100" style="height:500px">
                    <div class="card bg-light mb-3 h-100" style="height:500px">
                        <div class="card-body" style="height:410px">
                            <p class="price">{{ $product->name }}</p>
                            <p class="price_discounted">{{ $product->price }} грн</p>


                            <div class="reviews_product p-3 mb-2 ">

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <!-- Description -->
                <div class="col-12">
                    <div class="card border-light mb-3">
                        <div class="card-header bg-dark text-white text-uppercase"><i class="fa fa-align-justify"></i> Опис страви</div>
                        <div class="card-body">
                            {!! $product->info !!}
                        </div>
                    </div>
                </div>

        <!-- Modal image -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <img height="350" class="img-fluid" src="{{ url('images/products',$product->image) }}" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection
