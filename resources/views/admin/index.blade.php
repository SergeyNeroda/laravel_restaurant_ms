@extends('layouts.admin')
@section('title','Адмін-панель')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{{-- {{ Breadcrumbs::render('admin') }} --}}
{{-- {{ print_r($chart) }} --}}
<div class="card">
    <div class="card-header">Графік прибутку по днях</div>
    <div class="card-body">

        <form method="post" action="{{ route('graph') }}">
            {{-- випадаючий список --}}
            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                    @csrf
                    <select class="form-control custom-select" name="days">

                          <option value="7">
                              7 днів
                          </option>
                          <option value="14">
                              14 днів
                          </option>
                          <option value="30">
                              30 днів
                          </option>
                    </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <input type="submit" value="Підтвердити"  class="btn btn-success" />
                </div>
              </div>
              <div class="container bg-light" style="margin-top:20px" >
                {!! $chart->container() !!}
              </div>

            </div>


        </form>
    </div>
</div>

{{-- <div class="container bg-light" style="margin-top:20px" >
  {!! $report->container() !!}
</div> --}}
{!! $chart->script() !!}
{{-- {!! $report->script() !!} --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection
