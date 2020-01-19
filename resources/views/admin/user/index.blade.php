@extends('layouts.admin')
@section('title','Керування користувачами')
@section('content')
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-10">
          <h2>Список користувачів </h2>
        </div>
        <div class="col-md-2">
          <h2><a href="{{ route('user.create') }}" class="badge badge-success"><i class="fas fa-plus"></i></a></h2>
        </div>
      </div>


    </div>
    <div class="card-body">
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
                  <th>Ім'я</th>
                  <th>Імейл</th>
                  <th>Статус</th>
                  <th colspan="2" width="10%">Операції</th>
              </thead>
              <tbody>
                  @forelse ($users as $user)
                  <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        @if ($user->isOnline())
                          <li class="badge badge-success">online</li>
                        @else
                          <li class="badge badge-danger">offline</li>
                        @endif
                      </td>
                      <td>
                          <form action="{{ route('user.destroy',$user->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" name="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>

                          </form>
                      </td>
                      <td>
                          <a class="btn btn-success" href="{{ route('user.edit',$user->id)}}" name="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></a>
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
              {{ $users->links('layouts.paginate') }}
          </div>
      </div>
    </div>
  </div>


@endsection
