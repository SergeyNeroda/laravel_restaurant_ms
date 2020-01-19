@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Менеджер новин</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: right">Create Post</a>
            <table class="table table-bordered">
                <thead>
                    <th width="80px">Айді</th>
                    <th>Title</th>
                    <th width="150px">Дії</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Переглянути новину</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
