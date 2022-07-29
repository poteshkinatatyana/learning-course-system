@extends('layouts.admin_layout')

@section('content')


<div class="card p-3" style="width: 100%;">


    @isset($warning)
    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        Пользователь не может быть создан так как введеный Email адресс уже зарегистрирован!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    @endisset



    <h5 class="card-title p-0">
        <button class="btn btn-outline-primary "  data-bs-toggle="modal" data-bs-target="#basicModal">
            Создать Пользователя
        </button>

    </h5>

    <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">






            <form class="row g-3 p-3" action="{{route('create_user')}}" method="POST" style="width: 100%;">
                {{ csrf_field() }}
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Your Name</label>
                  <input type="text" class="form-control" required name="name" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" required name="email" id="inputEmail4">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" class="form-control" required name="password" id="inputPassword4">
                </div>
                {{-- <div class="col-12">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" class="form-control" required name="password_confirmation" id="inputPassword5">
                  </div> --}}
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>

          </div>
        </div>
      </div>

<ul class="list-group" >
    @foreach ($users_list as $user)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{$user->name}}

                 <!-- Button trigger modal -->
     <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
        Изменить
       </button>

        <form action="{{route('delete_user', $user->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-outline-danger">Удалить</button>
            </form>


    </li>

    <!-- Modal -->
<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('edituser', $user->id)}}" method="POST">
                @csrf
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                <br>
                <center>
                    <button type="submit" class="btn btn-primary">Сохранить изменения </button>
                </center>
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>


    @endforeach

  </ul>
</div>


@endsection
