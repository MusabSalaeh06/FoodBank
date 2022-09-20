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

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.22.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @font-face {
                    font-family: THSarabun;
                    src: url(/font/THSarabun.ttf);
                    }
        body {
            font-family: "THSarabun";
        }
    </style>
</head>

<body>
    <nav class="flex items-center justify-between flex-wrap px-6 py-3 shadow-md rounded-sm"
        style="background-color: #264653">
        <div class="flex items-center flex-no-shrink text-white mr-3">
            <img src="/storage/logo-1.png" width="100px" height="100px">
            <span class="inline mx-3 font-semibold text-3xl tracking-tight">
                <img src="/storage/logo-2.png" width="100px" height="30px">
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
                <div class="
                block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
                hover:text-white mr-4 rounded focus:outline-none 
                focus:shadow-outline
              ">
                    @if (Auth::user()->type == 'giver')
                    <a href="{{route('my.donate')}}">
                        <button
                            class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                            type="button">
                            <box-icon name='home'></box-icon>
                        </button>
                    </a>
                    @elseif (Auth::user()->type == 'sender')
                    <a href="{{route('my.mission')}}">
                        <button
                            class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                            type="button">
                            <box-icon name='home'></box-icon>
                        </button>
                    </a>
                    @else
                    <a href="{{route('Dashboard')}}">
                        <button
                            class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                            type="button">
                            <box-icon name='home'></box-icon>
                        </button>
                    </a>
                    @endif

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
                                            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-700">
                                                อัพเดทสถานะ</h2>
                                        </div>
                                        <form action="{{ route('sender.update',Auth::user()->member_id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{ csrf_field()}}
                                            {{ method_field('PUT') }}
                                            @csrf
                                            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-1">
                                                <div>
                                                    <select name="status" type="text"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="{{Auth::user()->status}} ">
                                                            {{Auth::user()->status}}</option>
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
                        <button
                            class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                            type="button">
                            <box-icon name='store-alt'></box-icon>
                        </button>
                    </a>
                    <a href="{{route('basket.show')}}">
                        <button
                            class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                            type="button">
                            <box-icon name='basket'></box-icon>
                        </button>
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
                    <button
                        class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                        type="button">
                        <box-icon name='user-circle'></box-icon>
                    </button>
                </a>
                <a href="{{route('logout')}}">
                    <button
                        class="bg-white font-bold text-xl px-6 py-3 mr-1 mb-1 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group"
                        type="button">
                        <box-icon name='log-out-circle'></box-icon>
                    </button>
                </a>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script>
        document.querySelector('[data-toggle-hide]').addEventListener('click', function () {
            console.log(this.dataset);
            document
                .querySelector(this.dataset.toggleHide)
                .classList
                .toggle('hidden');
        });
    </script>
</body>

</html>