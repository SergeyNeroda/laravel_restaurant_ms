@extends('layouts.app')
{{-- @section('title','Сторінка продавця') --}}
@section('content')

<div class="container-fluid">
    <div class="row" id="cashier-container">
        <div class="col-sm bg-secondary">
            <div class="py-5">
                <div class="container">
                    <div class="row hidden-md-up">
                        <div class="col-md-4">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="http://placehold.it/160x100" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="http://placehold.it/160x100" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="http://placehold.it/160x100" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="http://placehold.it/160x100" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="http://placehold.it/160x100" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="http://placehold.it/160x100" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm bg-light">
            One of three columns
        </div>
        <div class="col-sm bg-secondary">
            <div class="py-5">
                <div class="container">

                        <button class="btn btn-default"><i class="glyphicon glyphicon-repeat gly-spin"></i></button>
                        <button class="btn btn-default"><i class="glyphicon glyphicon-cog gly-spin"></i></button>
                        <button class="btn btn-default"><i class="glyphicon glyphicon-th-large gly-spin"></i></button>
                        <button class="btn btn-default"><i class="glyphicon glyphicon-refresh gly-spin"></i></button>
                  

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
