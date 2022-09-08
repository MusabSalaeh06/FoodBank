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
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

      <!-- Favicons -->
    <link href="{{ asset('storage/logo.png')}}" rel="icon">
    <link href="{{ asset('storage/logo.png')}}" rel="apple-touch-icon">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.22.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
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
            {{-- 
                <a href="/" class="
                block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
                hover:text-white mr-4 rounded focus:outline-none 
                focus:shadow-outline
              ">
              <button class="text-white bg-red-500 text-center inline-flex items-center rounded-lg shadow-md p-2 text-2xl" 
                type="button">หน้าแรก
              </button>
            </a>
            <div class="
                block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
                hover:text-white mr-4 rounded focus:outline-none 
                focus:shadow-outline
              ">
              <button class="text-white bg-red-500 text-center inline-flex items-center rounded-lg shadow-md p-2 text-2xl" 
                type="button" data-dropdown-toggle="Product">จัดการข้อมูลสินค้า
              </button>
            </div>
            <!-- Dropdown menu -->
              <div class="hidden bg-white z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="Product">
                <ul class="py-1" aria-labelledby="Product">
                <li>
                    <a href="/product/show" class="text-xl hover:bg-gray-400 text-gray-700 block px-4 py-2">ข้อมูลค้าในคลัง</a>
                </li>
                <li>
                    <a href="/product_type/show" class="text-xl hover:bg-gray-400 text-gray-700 block px-4 py-2">ข้อมูลประเภทสินค้า</a>
                </li>
                </ul>
              </div>
              
          <div class="
            block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
            hover:text-white mr-4 rounded focus:outline-none 
            focus:shadow-outline
          ">
          <button class="text-white bg-red-500 text-center inline-flex items-center rounded-lg shadow-md p-2 text-2xl" 
            type="button" data-dropdown-toggle="member">จัดการข้อมูลสมาชิก
          </button>
        </div>
        <!-- Dropdown menu -->
          <div class="hidden bg-white z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="member">
            <ul class="py-1" aria-labelledby="member">
            <li>
                <a href="/giver/show" class="text-xl hover:bg-gray-400 text-gray-700 block px-4 py-2">จัดการข้อมูลผู้บริจาค</a>
            </li>
            <li>
                <a href="/reciever/show" class="text-xl hover:bg-gray-400 text-gray-700 block px-4 py-2">จัดการข้อมูลผู้รับบริจาค</a>
            </li>
            <li>
                <a href="/sender/show" class="text-xl hover:bg-gray-400 text-gray-700 block px-4 py-2">จัดการข้อมูลผู้จัดส่ง</a>
            </li>
            </ul>
          </div>
          <a href="/donate/show" class="
          block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
          hover:text-white mr-4 rounded focus:outline-none 
          focus:shadow-outline
        ">
        <button class="text-white bg-red-500 text-center inline-flex items-center rounded-lg shadow-md p-2 text-2xl" 
          type="button">จัดการข้อมูลการบริจาค
        </button>
      </a>--}}
          </div>
          <div class="text-2xl text-white font-semibold  lg:flex-shrink">
            <div class="
                block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
                hover:text-white mr-4 rounded focus:outline-none 
                focus:shadow-outline
              ">
              <a href="{{route('Dashboard')}}">
                <button class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                type="button"><box-icon name='home' ></box-icon></button>
              </a>
              @if (Auth::user()->type == "sender")
              <div class="text-white  text-center inline-flex items-center text-2xl">
                {{Auth::user()->name}} {{Auth::user()->surname}} || สถานะ : {{Auth::user()->status}} 
                <label
                class="bg-white text-gray-700 font-bold text-2xl px-3 py-3 ml-3 overflow-hidden bg-white hover:text-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                type="button" for="edit-sender">
                อัพเดทสถานะ
                </label>
                <input type="checkbox" id="edit-sender" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box">
                        <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">
                            <div class="max-w-md w-full space-y-8">
                                <div>
                                    <img class="mx-auto h-12 w-auto"
                                        src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                                        alt="Workflow">
                                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-700">
                                      อัพเดทสถานะ</h2>
                                </div>
                                <form action="{{ route('sender.update',Auth::user()->member_id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <div class="rounded-md shadow-sm -space-y-px">
                                        <div>
                                            <select name="status" type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="{{Auth::user()->status}} ">{{Auth::user()->status}}</option>
                                                <option value="online">online</option>
                                                <option value="offline">offline</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="group relative w-full flex justify-center py-2 px-4 mt-3 border border-transparent text-xl font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            </span>
                                            อัพเดท
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-action">
                            <label for="edit-sender"
                                class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                        </div>
                    </div>
                </div>
              </div>  
              @elseif (Auth::user()->type == "admin")
              <a href="{{route('products')}}">
                <button class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                type="button"><box-icon name='store-alt' ></box-icon></button>
              </a>
              <a href="{{route('basket.show')}}">
                <button class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                type="button"><box-icon name='basket' ></box-icon></button>
              </a>
              <div class="text-white  text-center inline-flex items-center text-2xl">
                {{Auth::user()->name}} {{Auth::user()->surname}}
              </div>  
              @else
              <div class="text-white  text-center inline-flex items-center text-2xl">
                {{Auth::user()->name}} {{Auth::user()->surname}}
              </div> 
              @endif
            </div>
            <a href="{{route('my.profile')}}">
              <button class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
              type="button"><box-icon name='user-circle'></box-icon></button>
            </a>
            <a href="{{route('logout')}}">
              <button class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
              type="button"><box-icon name='log-out-circle'></box-icon></button>
            </a>
            {{-- 
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

