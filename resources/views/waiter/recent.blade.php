@extends('layouts.waiter')
@section('title','Отримані замовлення')
@section('content')
<div class="block bg-light" style="min-height:100vh">
    <div style="height:45px">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">

                        {{-- 2 --}}


                            @forelse ($readyOrders as $element)
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="card" style="margin:10px">
                                    <div class="card-header bg-dark text-white">
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

                                          @endforeach
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="card-footer ">
                                      <div class="row">
                                        <div class="col-md-9">
                                          <p class="card-text">
                                            <small class="text-muted">Час виконання: {{ $element->updated_at }} |</small>
                                            <small class="text-muted">Столик: {{ $element->table_id }} |</small>
                                            <small class="text-muted">Офіціант: {{ $element->user->name }}</small>
                                          </p>
                                        </div>
                                        <div class="col-md-3">
                                          {{-- <button class="btn btn-primary ready-order" type="button" name="button" value="{{ $element->id }}">Клієнт отримав замовлення</button> --}}
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
                                {{ $readyOrders->links('layouts.paginate') }}
                            </div>
                          </div>
                        </div>
                        {{-- 3 --}}
                        <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">


                        </div>

            </div>
        </div>
    </div>

</div>

{{-- <script type="text/javascript">
//
  $(document).ready(function(){
    $(document).on('click','.accept-order',function(){

      var id = $(this).val();
      $.ajax({
        type:'get',
        url:'{!! URL::to('/cook/accept') !!}',
        data:{'id':id},
        success:function (data) {
          console.log(data);
        },
        error:function () {
          console.log("error");
        }
      });
    });
  });

  $(document).ready(function(){
    $(document).on('click','.ready-order',function(){

      var id = $(this).val();
      $.ajax({
        type:'get',
        url:'{!! URL::to('/cook/ready') !!}',
        data:{'id':id},
        success:function (data) {
          console.log(data);
        },
        error:function () {
          console.log("error");
        }
      });
    });
  });
</script> --}}
@endsection
