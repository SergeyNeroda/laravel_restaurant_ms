@extends('layouts.admin')
@section('title','Список тегів')
@section('content')
<h2>Список тегів <a href="{{ route('tag.create') }}" class="badge badge-success">New</a></h2>
<hr>
<div class="col-sm-12">

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
</div>
<div class="table">
    <table class="table table-striped table-bordered table-responsive-sm">
        <thead class="thead-dark">
            <th>Назва</th>
            <th>Опис</th>
            <th colspan="2" width="10%">Операції</th>
        </thead>
        <tbody>
            @forelse ($tags as $tag)
            <tr>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->slug }}</td>
                <td>
                    <form action="{{ route('tag.destroy',$tag->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" name="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>

                    </form>
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('tag.edit',$tag->id)}}" name="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <h1 class="text-center">Теги відсутні</h1>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="row justify-content-center align-items-center">
        {{ $tags->links('layouts.paginate') }}
    </div>
</div>
@endsection
