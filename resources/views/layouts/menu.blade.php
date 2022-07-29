
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    </head>
    <body  id="app">

        <div class="container">
              <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                @if (Route::has('login'))
                <a class="navbar-brand text-uppercase" href="{{route('index')}}">Polytech Creator</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    </ul>
                    <search-input ></search-input>
                    @auth
                    @if(Auth::user()->hasRole('admin'))


                    <a class="link-dark mt-2 text-uppercase" style="margin-left:24px; margin-top: -15px;"  href="{{ url('/admin_panel') }}" >Панель администратора </a>
                    <a href="{{ url('/home') }}" class="link-dark mt-2 text-uppercase" style="margin-left:24px; margin-top: -15px;">Личный кабинет</a>

                    @else
                    <a href="{{ url('/home') }}" class="link-dark mt-2 text-uppercase" style="margin-left:24px; margin-top: -15px;">Личный кабинет</a>
                    @endif

                    @else

                    <a href="{{ route('login') }}" class="link-dark mt-2 text-uppercase" style="margin-left:24px;">Войти</a>

                    @if (Route::has('register'))
                   <a href="{{ route('register') }}" class=" mt-2 btn btn-dark text-uppercase" style="margin-left:24px;">Регистрация</a>

                    @endif
                @endauth



                </div>
                @endif
            </div>
        </nav>


        </div>



        <div >
            <div class="container">
                @yield('content')
            </div>


        </div>



        <script src="{{ mix('js/app.js') }}"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
