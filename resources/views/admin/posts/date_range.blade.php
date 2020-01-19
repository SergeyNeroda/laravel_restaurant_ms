@extends('layouts.admin')
@section('title','Редагувати рецепт')
@section('content')
<div class="container">

  <div class="card">
      <div class="card-header">
        <form class="" action="/daterange/fetch_data" method="post">
            <div class="container" >
                <div class="row align-items-center">
                    <div class="col-md-3">Список статтей <b><span id="total_records"></span></b></div>
                    <div class="col-md-7">
                        <div class="input-group input-daterange align-items-center">
                            <input type="text" name="from_date" id="from_date" readonly />
                            <div class="input-group-addon">до</div>
                            <input type="text" name="to_date" id="to_date" readonly />
                            {{ csrf_field() }}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="filter" id="filter" class="btn btn-info btn-sm">Фільтр</button>
                        <button type="refresh" name="refresh" id="refresh" class="btn btn-warning btn-sm">Оновити</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="25%">Заголовок посту</th>
                        <th width="40%">Текст посту</th>
                        <th width="15%">Дата публікації</th>
                        <th width="10%">Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $element)
                    <tr>
                        {{-- <p>{{ $element->ingredient_id }}</p> --}}
                        <td>{{ $element->id }}</td>
                        <td>{{ $element->title }}</td>
                        <td>{{ $element->body }}</td>
                        <td>{{ $element->created_at }}</td>

                        <td style="width:10%">
                            <div class="btn-group">

                                <button type="button" class="btn btn-success" name="button">Upd</button>
                                <button type="button" class="btn btn-danger" name="button">Del</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <h1 class="text-center">Статті відсутні</h1>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
      </div>
    </div>




    </div>

</div>
{{-- --}}
<script>
    $(document).ready(function() {

        var date = new Date();

        $('#from_date').datepicker({
            width: 235,
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            // minDate: today,
            maxDate: function() {
                return $('#to_date').val();
            }
        });
        $('#to_date').datepicker({
            width: 235,
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function() {
                return $('#from_date').val();
            }
        });

    });
</script>
@endsection
