@extends('layouts.admin')
@section('title','Test')
@section('content')
  <div style="height:25px">

  </div>
  <div class="card">
      <div class="card-header">
        <h4>Вибір страви</h4>
      </div>
      <div class="card-body" id="block-select">
        <div class="row">
          <div class="col-md-6">
            <select class="form-control custom-select select_category" name="product_id">
                <option value="" disabled selected>Оберіть категорію</option>
                @foreach ($categories as $key => $value)
                <option value="{{ $key }}">
                    {{ $value }}
                </option>
                @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-control custom-select select_product"  name="product_id">
                <option value="" disabled selected>Оберіть страву</option>
                @foreach ($products as $key => $value)
                <option value="{{ $key }}">
                    {{ $value }}
                </option>
                @endforeach
            </select>
          </div>
        </div>
      </div>
  </div>
  <div style="height:25px">

  </div>
  <div class="card">
      <div class="card-header">
        <h4>Рецепт</h4>
      </div>
      <div class="card-body" id="block-recipe">
        <table class="table table-1 table-striped table-bordered table-responsive-sm text-center">
          <thead>
              <th>Назва інгредієнту</th>
              <th>Кількість</th>
              <th>Од. виміру</th>
              <th>Дії</th>
          </thead>
          <tbody class="list-recipe">
            <tr>
                <td colspan="4">
                    <h4 class="text-center">Страву не обрано!!!</h4>
                </td>
            </tr>

          </tbody>
        </table>
      </div>
  </div>
  <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                     <h4 class="modal-title">Редагувати рядок</h4>
                </div>
                <div class="modal-body">
                     <form method="post" id="insert_form">
                          <label>Інгредієнт</label>
                          <select name="select_ingredient"  class="form-control" id="select_ingredient">
                              <option value="" disabled selected>Оберіть інгредієнт</option>
                              @foreach ($ingredients as $ingredient)
                              <option value="{{ $ingredient->id }}">{{ $ingredient->name_ingredient }}</option>
                              @endforeach
                          </select>
                          <br />
                          <label>Кількість</label>
                          <input type="number" name="age" id="age" value="" class="form-control" />
                          <br />
                          <label>Одиниця виміру</label>
                          <select name="select_unit"  class="form-control" id="select_unit">
                              <option value="" disabled selected>Оберіть одиницю виміру</option>
                              @foreach ($units as $unit)
                              <option value="{{ $unit->id }}">{{ $unit->name_unit }}</option>
                              @endforeach
                          </select>
                          <br />
                          <input type="hidden" name="employee_id" id="employee_id" />
                          {{-- <input type="submit" name="insert" id="insert" value="Зберегти" class="btn btn-success" /> --}}
                          <button type="button" class="btn btn-info update-link " value=""  name="button" data-token="{{ csrf_token() }}">Зберегти</button>
                          <button type="button" class="btn btn-info insert-link" value=""  name="button" data-token="{{ csrf_token() }}">Додати</button>
                     </form>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                </div>
           </div>
      </div>
 </div>





<script type="text/javascript">
  //відкриваю документ
  $(document).ready(function(){
    //відслідковую категорію страви
    $(document).on('change','.select_category',function(){
      //console.log("hmm its change");
      var id_category = $(this).val();
      //var div = $(this).parent();
      //console.log(id);
      var op=" ";
      //викликаю метод аджакс
      $.ajax({
        type:'get',
        url:'{!! URL::to('test/product') !!}',
        data:{'id_category':id_category},
        success:function (data) {
          //console.log("success");
          //console.log(data.length);
          //при успішному спрацюванні
          op+='<option value="" disabled selected>Оберіть страву</option>';
          for (var i = 0; i < data.length; i++) {
            op+='<option value="'+data[i].id+'" >'+data[i].name+'</option>';
          }
          //обираю селектором айдішник
          $('#block-select').find('.select_product').html(" ");
          $('#block-select').find('.select_product').append(op);
        },
        error:function () {
          console.log("error");
        }
      });
    });
    //
    $(document).on('change','.select_product',function(){
      var id_product = $(this).val();
      var recipe=" ";
      var button = " ";
      //var nameProduct = " ";
      $.ajax({
        type:'get',
        url:'{!! URL::to('test/recipe') !!}',
        data:{'id_product':id_product},
        success:function (data) {
          console.log(data);
          for (var i = 0; i < data.length; i++) {
            recipe+='<tr id="recipe_id_'+data[i].id+'">'
            recipe+='<td>'+data[i].ingredient.name_ingredient+'</td>';
            recipe+='<td>'+data[i].quantity+'</td>';
            recipe+='<td>'+data[i].unit.name_unit+'</td>';
            recipe+='<td style="width:15%">';
            recipe+='<button type="button" class="btn btn-danger delete-link" value="'+data[i].id+'"  name="button" data-token="{{ csrf_token() }}"><i class="fas fa-trash"></i></button>';
            recipe+='<button type="button" class="btn btn-info edit-link" value="'+data[i].id+'"  name="button" data-token="{{ csrf_token() }}"><i class="fas fa-marker"></i></button>';
            recipe+='</td>';
            recipe+='</tr>';
          }
          //кнопка для додавання рецепту
          button+='<table id="table-add" class="table table-striped table-bordered table-responsive-sm text-center"><tr><td colspan="3">Додати до рецепту</td><td><button type="button" class="btn btn-success add-link" value="'+id_product+'"  name="button" data-token="{{ csrf_token() }}"><i class="fas fa-plus"></i></button></td></tr></table>';

          $("#table-add").remove();
          $('#block-recipe').find('.list-recipe').html(" ");
          $('#block-recipe').find('.list-recipe').append(recipe);
          $('#block-recipe').append(button);
          //виправляю баг з додатковим рядком
          $(".addeDRow").remove();

        },
        error:function () {
          console.log("error");
        }
      });
    });
    //delete
    $(document).on('click','.delete-link',function(){
      //console.log("hmm its change");
      var id_recipe = $(this).val();
      var token = $(this).data('token');
      //console.log(id_recipe);
      $.ajax({

        url:"/test/del/id="+id_recipe,
        type: 'get',
        data: {
            "id":id_recipe,
            "_method": 'DELETE',
            "_token": token,
        },
        success:function (data) {
          //console.log("success");
          //console.log(data);
          //при успішному спрацюванні
          $("#recipe_id_" + id_recipe).remove();
        },
        error:function () {
          console.log("error");
        }
      });
    });
    //edit
    $(document).on('click','.edit-link',function(){
      //console.log("hmm its change");
      var id_recipe = $(this).val();
      $.ajax({
                url:"/test/edit/id="+id_recipe,
                method:"GET",
                data:{"id":id_recipe},
                dataType:"json",
                success:function(data){
                  //console.log(data);
                      $("#select_ingredient").val(data[0].ingredient.id).change();
                      $("#select_unit").val(data[0].unit.id).change();
                      $('#designation').val(data[0].designation);
                      $('#age').val(data[0].quantity);
                     // $('#employee_id').val(data.id);
                    //  $('#insert').val("Update");
                      $('.update-link').val(id_recipe);
                     $('#add_data_Modal').modal('show');
                     $(".update-link").show();
                     $(".insert-link").hide();
                }
           });
    });
    //update
    $(document).on('click','.update-link',function(){
      //console.log("hmm its change");
      var id_recipe_upd = $(this).val();
      var id_ingredient = $("#select_ingredient").val();
      var id_unit = $("#select_unit").val();
      var quantity = $("#age").val();
      var token = $(this).data('token');

      if(quantity != ''){
      
        $.ajax({
          url:"/test/update",
          type:'post',
          //method:"PATCH",
          data:{
            _token: token,
            //method:'post',
            "id":id_recipe_upd,
            "select_ingredient":id_ingredient,
            "select_unit":id_unit,
            "quantity":quantity,
          },
          success:function(data){
            //recip+=;
            //console.log(data);

            $("#recipe_id_" + id_recipe_upd).replaceWith('<tr id="recipe_id_'+data[0].id+'"><td>'+data[0].ingredient.name_ingredient+'</td><td>'+data[0].quantity+'</td><td>'+data[0].unit.name_unit+'</td><td style="width:15%"><button type="button" class="btn btn-danger delete-link" value="'+data[0].id+'"  name="button" data-token="{{ csrf_token() }}"><i class="fas fa-trash"></i></button><button type="button" class="btn btn-info edit-link" value="'+data[0].id+'"  name="button" data-token="{{ csrf_token() }}"><i class="fas fa-marker"></i></button></td></tr>');
            $('#add_data_Modal').modal('hide');
          }
        });
      } else {
        alert('Кількість не може бути пустою!!!');
      }

    });
    //add-link
    $(document).on('click','.add-link',function(){
      //console.log("hmm its change");
      // var id_recipeProduct_add = $(this).val();
      // console.log(id_recipeProduct_add);
      $("#select_ingredient").val('').change();
      $("#select_unit").val('').change();
      $('#age').val('');
      $('#add_data_Modal').modal('show');
      $(".update-link").hide();
      $(".insert-link").show();

    });
    //insert
    $(document).on('click','.insert-link',function(){
      console.log("hmm its change--");
      var idRecipeProduct_add = $('.add-link').val();
      //console.log(idRecipeProduct_add);
      var id_ingredient = $("#select_ingredient").val();
      var id_unit = $("#select_unit").val();
      var quantity = $("#age").val();
      var token = $(this).data('token');
      var row = ' ';

      if(quantity != ''){
        $.ajax({
          url:"/test/insert",
          type:'post',
          //method:"PATCH",
          data:{
            _token: token,
            //method:'post',
            "id":idRecipeProduct_add,
            "select_ingredient":id_ingredient,
            "select_unit":id_unit,
            "quantity":quantity,
          },
          success:function(data){
            //recip+=;
            console.log(data);

            row+='<tr class="addeDRow" id="recipe_id_'+data[0].id+'">'
            row+='<td>'+data[0].ingredient.name_ingredient+'</td>';
            row+='<td>'+data[0].quantity+'</td>';
            row+='<td>'+data[0].unit.name_unit+'</td>';
            row+='<td style="width:15%">';
            row+='<button type="button" class="btn btn-danger delete-link" value="'+data[0].id+'"  name="button" data-token="{{ csrf_token() }}"><i class="fas fa-trash"></i></button>';
            row+='<button type="button" class="btn btn-info edit-link" value="'+data[0].id+'"  name="button" data-token="{{ csrf_token() }}"><i class="fas fa-marker"></i></button>';
            row+='</td>';
            row+='</tr>';
            $('#add_data_Modal').modal('hide');
            //ПОМИЛКА-додано клас який видаляється addeDRow
            $('#block-recipe').find('.table-1').append(row);
          }
        });
      } else {
        alert('Кількість не може бути пустою!!!');
      }
    });


  });
</script>
@endsection
