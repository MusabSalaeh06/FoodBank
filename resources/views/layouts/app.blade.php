{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicons -->
    <link href="{{ asset('storage/logo.png')}}" rel="icon">
    <link href="{{ asset('storage/logo.png')}}" rel="apple-touch-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
                font-family: "TH SarabunPSK";
            }
    </style>
</head>
<body>


      <nav class="flex items-center justify-between flex-wrap px-6 py-3 shadow-md rounded-sm" style="background-color: #264653"> 
        <div class="flex items-center flex-no-shrink text-white mr-3">
          <img src="/storage/logo-1.png" width="100px" height="100px">
        <span class="inline font-semibold text-3xl tracking-tight">
          <img src="/storage/logo-2.png" width="100px" height="100px">
        </span>
    </div>
        <div class="block lg:hidden">
          <button data-toggle-hide="[data-nav-content]" class="
              flex items-center px-3 py-2 border rounded 
              text-teal-lighter border-teal-light hover:text-white
              hover:border-white rounded focus:outline-none 
              focus:shadow-outline
            ">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>
                Menu
              </title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
      
        <div data-nav-content="" class="
            w-full block flex-grow lg:flex lg:items-center lg:w-auto
            hidden lg:block
          ">
          <div class="text-2xl text-white font-semibold lg:flex-grow">
          </div>
          <div class="text-2xl text-white font-semibold  lg:flex-shrink">
           {{--
             <a href="/login" class="
                block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
                hover:text-white mr-4 rounded focus:outline-none 
                focus:shadow-outline
              ">
              <button class="text-white bg-red-500 text-center inline-flex items-center rounded-lg shadow-md p-2 text-2xl" 
                type="button">เข้าสู่ระบบ
              </button>
            </a>
            <a href="/register" class="
                block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
                hover:text-white mr-4 rounded focus:outline-none 
                focus:shadow-outline
              ">
              <button class="text-white bg-red-500 text-center inline-flex items-center rounded-lg shadow-md p-2 text-2xl" 
                type="button">สร้างบัญชีผู้ใช้ใหม่
              </button>
            </a>
             
              <a href="#" class="
                inline-block text-sm px-4 py-2 leading-none border 
                rounded text-white border-white hover:border-transparent 
                hover:text-red hover:bg-white mt-4 lg:mt-0 rounded 
                focus:outline-none focus:shadow-outline
              ">
              Download
            </a> 
            --}}
          </div>
        </div>
      </nav>
     
        <main class="py-4">
            @yield('content')
        </main>

        <script>
            document.querySelector('[data-toggle-hide]').addEventListener('click', function() {
  console.log(this.dataset);
  document
    .querySelector(this.dataset.toggleHide)
    .classList
    .toggle('hidden');
});
        </script>
</body>
</html>

