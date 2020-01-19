@extends('layouts.admin')
@section('title','Додати поставщика')
@section('content')
  <div style="height:15px">

  </div>
  <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col-md-10">
                  <h3>Додати постачальника</h3>
              </div>
              <div class="col-md-2">
                  <a href="/suppliers" class="btn btn-info">Назад</a>
              </div>
          </div>
      </div>
      <div class="card-body">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-12">
                      @if(session()->get('success'))
                          <div class="alert alert-success">
                              {{ session()->get('success') }}
                          </div>
                          @endif
                          <form action="{{ route('suppliers.store') }}" method="POST" role="form" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group{{ $errors->has('name_supplier')?' has-error':'' }}">
                                      <label for="name_supplier">Назва постачальника</label>
                                      <input type="text" class="form-control" name="name_supplier" id="name_supplier" >
                                      <span class="text-danger">{{ $errors->first('name_supplier') }}</span>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('status')?' has-error':'' }}">
                                        <label for="status">Статус</label>
                                        <input type="text" class="form-control" name="status" id="status" >
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    </div>
                                    <div class="form-group{{ $errors->has('city')?' has-error':'' }}">
                                        <label for="city">Місто</label>
                                        <input type="text" class="form-control" name="city" id="city" >
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    </div>


                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('address')?' has-error':'' }}">
                                        <label for="address">Адреса</label>
                                        <input type="text" class="form-control" name="address" id="address" >
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                    <div class="form-group{{ $errors->has('tel')?' has-error':'' }}">
                                        <label for="tel">Телефон</label>
                                        <input type="text" class="form-control" name="tel" id="tel" >
                                        <span class="text-danger">{{ $errors->first('tel') }}</span>
                                    </div>
                                  </div>


                              </div>

                              <button type="submit" class="btn btn-primary">Зберегти зміни</button>

                          </form>
                  </div>
              </div>
          </div>
      </div>
@endsection
