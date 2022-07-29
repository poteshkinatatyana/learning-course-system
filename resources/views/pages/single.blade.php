@extends('layouts.menu')
@section('content')

<div >
    <div class="container">




        <div class="row  p-1 mt-3" >
            <div class="col-4">
                <img src="{{route('index')}}/course_images/{{$course->image}}" alt="" style="width: 100%; height:400px; object-fit:cover;">
            </div>
            <div class="col-8 pt-4">
                <h1 class="text-uppercase" style="color: #d70000;">{{$course->title}}</h1>
                <p class="text-muted mt-1">Автор:{{$course->user['name']}}</p>
                <p class="text-muted mt-1">Описание:{{$course->description}}</p></div>

                <div class="btn-group mt-3 " role="group" aria-label="..." >




                    <button type="button" class="btn btn-danger "  data-bs-toggle="modal" data-bs-target="#exampleModal">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-file-check" viewBox="0 0 16 16">
              <path d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
              <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
            </svg>
            <span class="text-white">Тесты</span>
            </button>

            <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor"
                class="bi bi-layout-text-sidebar-reverse" viewBox="0 0 16 16">
                <path
                    d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z" />
                <path
                    d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z" />
            </svg>
            <span class="text-white">Содержание</span>
            </button>




            </div>

            <course-single-view :coursedata="{{$course}}" ></course-single-view>


        </div>

    </div>
</div>


@endsection
