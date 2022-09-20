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
            <a href="/" class="
               block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
               hover:text-white mr-4 rounded focus:outline-none 
               focus:shadow-outline
             ">
             <button class="text-white bg-red-500 text-center inline-flex items-center rounded-lg shadow-md p-2 text-2xl" style="background-color: #2A9D8F"
               type="button">หน้าแรก
             </button>
           </a>
             <a href="/login" class="
                block mt-4 lg:inline-block lg:mt-0 text-teal-lighter 
                hover:text-white mr-4 rounded focus:outline-none 
                focus:shadow-outline
              ">
              <button class="text-white bg-red-500 text-center inline-flex items-center rounded-lg shadow-md p-2 text-2xl" style="background-color: #2A9D8F"
                type="button">เข้าสู่ระบบ
              </button>
            </a>
           {{--
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

