
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    </head>
    <body class="block-fon" id="app">

        <div class="container">
              <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                @if (Route::has('login'))
                <a class="navbar-brand text-uppercase" href="#">Polytech Creator</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    </ul>

                        {{-- <input class="form-control me-2" type="search" placeholder="SEARCH" aria-label="SEARCH">
                        <a class="link-dark" type="submit">
                            <svg width="25" height="35" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 9.0009C0 13.9712 4.04795 18.0004 9.10789 18.0004C11.1319 18.0004 13.0113 17.2963 14.6015 16.1137C14.6015 16.2352 14.7461 16.3479 14.7461 16.4491L21.9746 23.6487C22.4083 24.1171 23.2757 24.1171 23.7094 23.6487C24.1431 23.1803 24.1431 22.4199 23.7094 21.9514L16.4809 14.7519C16.3364 14.6507 16.3364 14.5726 16.1918 14.5148C17.3484 12.991 18.0712 11.0784 18.0712 9.0009C18.0712 4.02915 14.0233 0 9.10789 0C4.04795 0 0 4.02915 0 9.0009ZM2.45789 9.001C2.45789 5.35495 5.34929 2.39995 9.1081 2.39995C12.7223 2.39995 15.6137 5.35495 15.6137 9.001C15.6137 12.6456 12.7223 15.6006 9.1081 15.6006C5.34929 15.6006 2.45789 12.6456 2.45789 9.001Z" fill="black"></path>
                            </svg></a> --}}
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
                   <a href="{{ route('register') }}" class="mt-2 btn btn-dark text-uppercase" style="margin-left:24px;">Регистрация</a>

                    @endif
                @endauth



                </div>
                @endif
            </div>
        </nav>

        <div class="col-12 mb-5">
            <div style="height: 84px;"> </div>
            <h1 class="text-active text-uppercase">Polytech Course Creator </h1>
            <p class="slogan mt-1">У вас есть вопросы, у нас есть ответы!</p>
            <center><a class="btn btn-light mt-3 cours-hover">Последние курсы <svg xmlns="http://www.w3.org/2000/svg" width="19" height="22" viewBox="0 0 19 22" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1129 11.7097L16.2071 11.7929C16.5676 12.1534 16.5953 12.7206 16.2903 13.1129L16.2071 13.2071L9.20711 20.2071L9.16315 20.2485L9.09531 20.3037L8.98406 20.3753L8.87134 20.4288L8.76599 20.4642L8.6181 20.4931L8.5 20.5L8.42476 20.4972L8.29927 20.4798L8.18786 20.4503L8.07678 20.4063L7.97929 20.354L7.87455 20.2803L7.79289 20.2071L0.792893 13.2071C0.402369 12.8166 0.402369 12.1834 0.792893 11.7929C1.15338 11.4324 1.72061 11.4047 2.1129 11.7097L2.20711 11.7929L7.5 17.084L7.5 1.5C7.5 0.947715 7.94772 0.5 8.5 0.5C9.05229 0.5 9.5 0.947715 9.5 1.5L9.5 17.086L14.7929 11.7929C15.1534 11.4324 15.7206 11.4047 16.1129 11.7097L16.2071 11.7929L16.1129 11.7097Z" fill="#CFCFCF"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1129 12.7097L18.2071 12.7929C18.5676 13.1534 18.5953 13.7206 18.2903 14.1129L18.2071 14.2071L11.2071 21.2071L11.1631 21.2485L11.0953 21.3037L10.9841 21.3753L10.8713 21.4288L10.766 21.4642L10.6181 21.4931L10.5 21.5L10.4248 21.4972L10.2993 21.4798L10.1879 21.4503L10.0768 21.4063L9.97929 21.354L9.87455 21.2803L9.79289 21.2071L2.79289 14.2071C2.40237 13.8166 2.40237 13.1834 2.79289 12.7929C3.15338 12.4324 3.72061 12.4047 4.1129 12.7097L4.20711 12.7929L9.5 18.084L9.5 2.5C9.5 1.94772 9.94772 1.5 10.5 1.5C11.0523 1.5 11.5 1.94772 11.5 2.5L11.5 18.086L16.7929 12.7929C17.1534 12.4324 17.7206 12.4047 18.1129 12.7097L18.2071 12.7929L18.1129 12.7097Z" fill="#D70000"/>
                </svg></a></center>
        </div>


        </div>



        <div  >
            <div class="container">
                @yield('content')
            </div>


        </div>

        <footer class="py-3 my-4">


            <p class="text-center text-muted"> Данный портал создан для защиты дипломного проекта студента АГПК.</p>
            <p class="text-center text-muted">© 2022 Lilith Kerrigan</p>
        </footer>

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
