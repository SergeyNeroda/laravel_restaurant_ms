@extends('layouts.cook')
@section('title','Панель кухаря')
@section('content')
<div class="block bg-light" style="min-height:100vh">
    <div style="height:45px">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">

                          @forelse ($orders as $element)
                            <div class="row row-order-{{ $element->id }}">
                              <div class="col-md-12">
                                <div class="card" style="margin:10px">
                                  <div class="card-header">
                                    <h4>Замовлення №{{ $element->id }}</h4>
                                  </div>
                                  <div class="card-body">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Назва страви</th>
                                          <th>Кількість</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($element->orderproduct as $products)
                                          <tr>
                                            <td>{{ $products->product_id }}</td>
                                            <td>{{ $products->product->name }}</td>
                                            <td>{{ $products->quantity }}</td>
                                          </tr>
                                          {{-- <p>{{ $products->product_id }},{{ $products->product->name }},{{ $products->quantity }},{{ $products->product->recipes }}</p> --}}

                                        @endforeach
                                      </tbody>
                                    </table>
                                    {{-- @foreach ($element->orderproduct as $products) --}}
                                      {{-- <p>{{ $products->product_id }},{{ $products->product->name }},{{ $products->quantity }},{{ $products->product->recipes }}</p> --}}

                                    {{-- @endforeach --}}
                                    {{-- <p>{{ $element->orderpoduct }}</p> --}}
                                  </div>
                                  <div class="card-footer ">
                                    <div class="row">
                                      <div class="col-md-9">
                                        <p class="card-text">
                                          <small class="text-muted">Час: {{ $element->created_at }} |</small>
                                          <small class="text-muted">Столик: {{ $element->table_id }} |</small>
                                          <small class="text-muted">Офіціант: {{ $element->user->name }}</small>
                                        </p>
                                      </div>
                                      <div class="col-md-3">
                                        <button class="btn btn-success accept-order" type="button" name="button" value="{{ $element->id }}">Прийняти замовлення</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                          @empty
                            <div style="height:15px">

                            </div>
                            <div class="card">

                              <div class="card-header">
                                <h4>Замовлення відсутні!!!</h4>
                              </div>
                              {{-- <div class="card-body">

                              </div> --}}
                            </div>
                          @endforelse

                          <div class="row justify-content-center align-items-center">
                              {{ $orders->links('layouts.paginate') }}
                          </div>



                    </div>

        </div>
    </div>

</div>

<script type="text/javascript">

  //
  $(document).ready(function(){
    $(document).on('click','.accept-order',function(){

      var id = $(this).val();
      var row = " ";
      $.ajax({
        type:'get',
        url:'{!! URL::to('/cook/accept') !!}',
        data:{'id':id},
        success:function (data) {
          //console.log(data);
          var row = '.row-order-'+id+'';
          $(row).remove();
        },
        error:function () {
          console.log("error");
        }
      });
    });
  });

</script>
@endsection
