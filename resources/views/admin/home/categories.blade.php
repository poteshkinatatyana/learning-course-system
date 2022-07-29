@extends('layouts.admin_layout')

@section('content')



<div class="card p-3">

    @isset($warning)
    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        Категория не может быть создан так как введеное название уже существует!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    @endisset


    <h5 class="card-title p-0">
        <button class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#basicModal1">
            Создать категорию
        </button>

    </h5>

    <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <form class="row g-3 p-3" action="{{route('create_category')}}" method="POST">
                {{ csrf_field() }}
            <div class="col-12">
                <label for="inputNanme4" required  class="form-label">Название категории</label>
                <input type="text" class="form-control" name="title" id="inputNanme4">
              </div>

              <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Создать</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    <ul class="list-group">
        @foreach ($cat_list as $cat)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$cat->title}}


              <!-- Button trigger modal -->
     <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$cat->id}}">
        Изменить
       </button>

                 <form action="{{route('destroy_cat', $cat->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger">Удалить</button>
                </form>




        </li>

        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('editcategory', $cat->id)}}" method="POST">
                @csrf
                <input type="text" name="title" value="{{$cat->title}}" class="form-control">
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
