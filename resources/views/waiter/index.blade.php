@extends('layouts.waiter')
@section('title','Панель офіціанта')
@section('content')

<div class="block bg-light" style="height:100vh">
    <div style="height:45px">

    </div>
    <div class="row" style="margin:5px;">
        <div class="col-md-4">
            <div class="card" style="height:90vh">
                <div class="card-header">
                    <h4>Категорії</h4>

                </div>
                <div class="card-body overflow-auto">
                    <div class="container">
                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-md-4">
                                <button type="button" value="{{ $category->id }}" class="btn btn-dark btn-md button_category" data-toggle="modal"  style="padding:15px;margin:10px;width:100px;height:95px">
                                    {{ $category->name }}
                                </button>
                            </div>
                            @endforeach


                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="height:90vh">
                <div class="card-header">
                    <h4>Страви</h4>
                </div>
                <div class="card-body">
                    <div style="height:15px">

                    </div>
                    <div class="container overflow-auto" style="height:70vh">
                        <table class="table table-bordered mb-0 " id="block-select">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Назва</th>
                                    <th scope="col">Ціна</th>
                                </tr>
                            </thead>
                            <tbody  class="select_product">
                                @forelse ($products as $element)
                                <tr class="product-tr" value="{{ $element->id }}">
                                    <th scope="row">{{ $element->id }}</th>
                                    <td class="element-name">{{ $element->name }}</td>
                                    <td class="element-price">{{ $element->price }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Продукти відсутні</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card " style="height:90vh">
                <div class="card-header">
                    <h4>Сформувати замовлення</h4>
                </div>
                <div class="card-body">
                    {{-- <div class="row" style="margin:2px">
                        <div class="col-md-9">
                          <button type="button" class="btn btn-info btn-sm product-summ" >
                              Додати товар по айді
                          </button>
                        </div>

                        <div class="col-md-3">

                        </div>
                    </div> --}}
                    <div style="height:15px">

                    </div>
                    <div class="container overflow-auto border"style="padding:0;margin:0;height:60vh">
                        <table class="table table-bordered table-striped mb-0" style="width:100%;padding:0;margin:0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Назва</th>
                                    <th scope="col">Кількість</th>
                                    <th scope="col">Ціна</th>
                                    <th scope="col">Дії</th>
                                </tr>
                            </thead>
                            <tbody class="cartItem">
                                {{--  --}}

                            </tbody>
                        </table>
                    </div>
                    <div style="height:15px">

                    </div>
                    <div class="row" style="margin:2px">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success btn-sm order-modal"  style="height:50px">
                                Додати замовлення
                            </button>
                        </div>
                        {{-- столик --}}

                        <div class=" col-md-6" style="height:50px">

                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" style="height:50px;width:160px">
                              <span id="numberTable"><span class="table-id" value="0">Стіл не обрано<span hidden class="table-id-number">0</span></span></span>
                          </button>
                        </div>
                        {{--  --}}
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}


<!-- Модальное окно -->
<div class="modal fade  bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Оберіть солик з переліку</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="container">
                    @foreach ($tables as $table)
                    <button type="button" class="btn btn-primary btn-md table-button" data-toggle="modal" value="{{ $table->id }}" data-target="#myModal" style="padding:15px;margin:15px">
                        {{ $table->name }}
                    </button>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary">Обрати</button>


            </div>
        </div>
    </div>
</div>

<!-- Модальное окно 2 -->
<div class="modal fade  bd-example-modal-lg" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Попередній перегляд замовлення</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="container">
                  <table class="table  table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Назва</th>
                        <th>Кількість</th>
                        <th>Ціна за штуку (грн)</th>
                        <th>Загальна ціна (грн)</th>
                      </tr>
                    </thead>
                    <tbody class="order-preview">

                    </tbody>
                  </table>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                    <button type="button" class="btn btn-success  create_order" >
                        Підтвердити
                    </button>

            </div>
        </div>
    </div>
</div>

{{-- <script type="text/javascript">
    $('#myModal').data('bs.modal').handleUpdate(); --}}
<script type="text/javascript">

//підрахувати сумму в корзині, відкрити модальне вікно
  $(document).ready(function(){
    //$(document).on('input','.counter-input',function () {
    $(document).on('click','.order-modal',function(){
        var sum = 0;
        var summa = 0;
        var id_table = $(".table-id-number").text();
        var summRow = " ";
        var tr = " ";
        var temp = " ";

        console.log(id_table);
        //var id_table = 0;
        if(id_table != 0){
          ////////////////////////////
          //обнуляю замовлення
          $(".order-preview tr").each( function () {
            $(this).remove();
          });
          //обчислюю в циклі вартість
          $(".cartItem tr").each( function () {
                var id=$(this).find('.tov-cart-id').text();
               var pr=$(this).find('.totalprice').text();
               var nm=$(this).find('.cart-tov-name').text();

               var qua=$(this).find('.counter-input').val();

               temp='.order-su-'+id+'';
               $(temp).remove();

               sum = (pr)*(qua);
               var tr = '<tr class="order-su-'+id+'"><td>'+id+'</td><td>'+nm+'</td><td>'+qua+'</td><td>'+pr+'</td><td>'+sum+'</td></tr>';
               summa += (pr)*(qua);
               //console.log(sum);
               $(".order-preview").append(tr);
          });
          if (summa!=0) {
            console.log("its okey");
            $('#orderModal').modal('show');
            //
            //var tabl=$('.table-id-num').text();
            summRow +='<tr class="order-summ"><th colspan="2">Загальна вартість (грн):</th><th class="order-summ-add">'+summa+'</th><th>Столик:</th><th class="order-table-add">'+id_table+'</th></tr>';
            $(".order-summ").remove();
            $(".order-preview").append(summRow);
          } else {
            alert('Оберіть хоча б одну страву!!!');
          }
          //console.log(summa);
          //console.log("hello");
        } else {
          alert('Ви не обрали столик!!!');
        }
    });
  });


    //
    $(document).ready(function() {

      //оформити замовлення
      $(document).on('click','.create_order',function(){

        var summAdd = $(".order-summ-add").text();
        var tableAdd =  $(".order-table-add").text()

        var garantI = [];
        var garantII = [];
        var tableReset = " ";
        $('.cartItem > tr').each(function(i,v){
           garantI[i] = [
              $(this).find('.tov-cart-id').text(),
              //$(this).find('.counter-input').val().trim()
           ];
           garantII[i] = [
              $(this).find('.counter-input').val().trim()
           ];
        });
        console.log(garantI);
        $.ajax({
          type:'get',
          url:'{!! URL::to('/waiter/createOrder') !!}',
          data:{'dataI':garantI,'dataII':garantII,'summAdd':summAdd,'tableAdd':tableAdd},
          success:function (data) {
            //console.log(data);
            $('#orderModal').modal('hide');
            $(".cartItem tr").each( function () {
              $(this).remove();
            });

            $('.table-id').remove();
            tableReset+='<span class="table-id" value="0">Стіл не обрано<span hidden class="table-id-number">0</span></span>';
            $('#numberTable').append(tableReset);
            alert('Замовлення успішно додано!!!');

          },
          error:function () {
            console.log("error");
          }
        });
        //console.log("create ord");
        //console.log(option);
      });


      $(document).on('click','.button_category',function(){
        //console.log("hmm its change");
        var id_category = $(this).val();
        var op  = " ";
        $.ajax({
          type:'get',
          url:'{!! URL::to('/waiter/product') !!}',
          data:{'id_category':id_category},
          success:function (data) {
            //console.log("success");
            //console.log(data);
            for (var i = 0; i < data.length; i++) {
              op+='<tr class="product-tr" value="'+data[i].id+'" ><td>'+data[i].id+'</td><td class="element-name">'+data[i].name+'</td><td class="element-price">'+data[i].price+'</td></tr>';
            }
            // аналог циклу фор
            // $.each( data, function( key, value ) {
            //   op+='<tr ><td>'+value.name+'</td></tr>';
            // });
            // //обираю селектором айдішник
             $('#block-select').find('.select_product').html(" ");
            $('#block-select').find('.select_product').append(op);
          },
          error:function () {
            console.log("error");
          }
        });
      });
      //вибір столика
      $(document).on('click','.table-button',function(){
        var id_table = $(this).attr('value');
        var value = " ";
            $('.table-id').remove();
            value+='<span class="table-id" value="'+id_table+'">Столик: <span class="table-id-number">'+id_table+'</span></span>';
            $('#numberTable').append(value);

      });



      $(document).on('click','.product-tr',function(){
        var id_tov = $(this).attr('value');

        var name = $(this).find(".element-name").text();
        var price = $(this).find(".element-price").text();
        //console.log("hmm its change");
        //console.log(data);
        //console.log(id_tov);
        var cartItem = " ";
        var str = " ";
        var contTov = " ";
        var count = 1;
        var TovCountSumm = 0;
        var oldPrice = 0;
        str+= '.tov-cart-'+id_tov+'';
        // Если такой товар уже есть в корзине то добавляем +1 к количеству
                if ($("tr").is(str)) {
                    //роблю інкремент кількості
                    contTov+= '#counter-'+id_tov+'';
                    $(contTov).val( function(i, oldval) {
                        return parseInt( oldval, 10) + 1;
                    });
                    //підрахувую ціну на декілька продуктів
                    // oldPrice = $(contTov).val();
                    // TovCountSumm = price*oldPrice;
                    // console.log(TovCountSumm);
                }
                else {
                    // Иначе добавляем товар в корзину
                  cartItem+='<tr class="tov-cart-'+id_tov+'"><td class="tov-cart-id">'+id_tov+'</td><td class="cart-tov-name">'+name+'</td><td><input class="counter-input" id="counter-'+id_tov+'" type="number" style="width:50px" name="counter" value="1"></td><td class="totalprice">'+price+'</td><td><button type="button" class="btn btn-danger delete-link" value="'+id_tov+'"  name="button"><i class="fas fa-trash"></i></button></td></tr>';
                  $(".cartItem").append(cartItem);
                  //console.log("if error");
                }


      });

      //
      //delete
      $(document).on('click','.delete-link',function(){
        console.log("hmm its change");
        var id_recipe = $(this).val();
        var token = $(this).data('token');
        console.log(id_recipe);
        $(".tov-cart-" + id_recipe).remove();
      });

      //
    });
</script>
@endsection
