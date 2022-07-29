<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">



</head>

<body>


    <div class="workspace" style="display: flex;">

        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height:100vh">
            <a href="{{route('index')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
              <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <span class="fs-4">Polytech Course Center</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">

              <li>
                <a href="{{route('cats_list')}}" class="nav-link link-dark">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                  Категории
                </a>
              </li>
              <li>
                <a href="{{route('users_list')}}" class="nav-link link-dark">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                  Преподаватели
                </a>
              </li>
            </ul>
            <hr>

                <a   href="{{route('index')}}">На главную</a>

                <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Выйти') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>


          </div>

          <div class="content p-3" style="width: 100%" id="app">
            @yield('content')
          </div>


      </div>











<style>
    .hide{
        display: none !important;
    }
</style>



<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>


</body>

</html>
