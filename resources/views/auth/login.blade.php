@extends('layouts.app')

@section('content')

@if (session('error'))
<div class="bg-red-500 p-5 text-xl text-white" role="alert">
    <h5>{{ session('error') }}</h5>
</div>
@endif

<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">
    <div class="max-w-md w-full space-y-8">
      <div>
        <div class="text-center mt-6 text-3xl font-bold  text-gray-900">
          เข้าสู่ระบบ
        </div>
        <p class="my-6 text-center text-xl text-gray-600 ">
            เชิญทุกท่านมาร่วมกันบริจาคอาหารและสินค้าที่ฟู้ดแบงค์
        </p>
      </div>
      <form class="mt-6 space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <input name="tel" type="text" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl" placeholder="เบอร์โทรศัพท์">
          </div>
          <div>
            <input name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl" placeholder="รหัสผ่าน">
          </div>
        </div>
  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-2xl font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="background-color: #2A9D8F">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            </span>
            เข้าสู่ระบบ
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
