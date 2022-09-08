@extends('layouts.default')

@section('content')

@if (session('error'))
<div class="bg-red-500 p-5 text-xl mx-10 text-white font-semibold shadow-lg rounded-lg mb-3" role="alert">
    <h5>{{ session('error') }}</h5>
</div>
@endif

@if (session('store'))
<div class="bg-green-500 p-5 text-xl mx-10 text-white shadow-lg font-semibold rounded-lg mb-3" role="alert">
    <h5>{{ session('store') }}</h5>
</div>
@endif

@if (session('update'))
<div class="bg-yellow-500 p-5 text-xl mx-10 text-white font-semibold shadow-lg rounded-lg mb-3" role="alert">
    <h5>{{ session('update') }}</h5>
</div>
@endif

@if (session('delete'))
<div class="bg-red-500 p-5 text-xl mx-10 text-white font-semibold shadow-lg rounded-lg mb-3" role="alert">
    <h5>{{ session('delete') }}</h5>
</div>
@endif

<div
    class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white rounded-lg 
    shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
    <div class="flex items-center">
        <span>สินค้าแต่ละประเภท</span>
    </div>
</div>

<!-- component -->
<!-- This is an example component -->
<div class="grid gap-6 mb-3 md:grid-cols-2 xl:grid-cols-6">
@foreach ($product_type as $rows)
<div class="w-56 mx-10 mb-3">
    
    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
            <img class="rounded-t-lg h-40" src="/storage/product_type/product_type_image_assets/{{$rows->image}}" alt="">
        <div class="p-5">
                <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">{{$rows->name}}</h5>
            <p class="font-normal text-gray-700 mb-3 text-xl dark:text-gray-400">{{$rows->description}}</p>
            <a href="{{route('product_types',$rows->product_type_id)}}" class="py-2 px-4 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50 mt-4 font-bold
              w-full flex items-center justify-center text-xl" style="background-color: #2A9D8F">
              เลือก
            </a>
        </div>
    </div>
</div>
@endforeach
</div>

<div
    class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white rounded-lg 
    shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
    <div class="flex items-center">
        <span>สินค้าทั้งหมด</span>
    </div>
</div>
<div class="grid gap-6 mb-3 md:grid-cols-2 xl:grid-cols-6">
@foreach ($product as $rows)
<form action="{{route('basket.store')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    <input name="product_id" type="hidden"  value="{{$rows->product_id}}" required >
    <input name="admin" type="hidden"  value="{{Auth::user()->member_id}}" required >
    <div class="w-56 bg-white shadow rounded-lg mx-10">
        <div
          class="h-40 w-full bg-gray-200 flex flex-col justify-between p-4 bg-cover bg-center rounded-lg"
          style="background-image: url('/storage/product/product_image_assets/{{$rows->product_image}}')"
        >
        </div>
        <div class="p-4 flex flex-col items-center">
          <p class="text-gray-400 font-light text-xl text-center">
            {{$rows->types->name}}
          </p>
          <h1 class="text-gray-800 text-center mt-1 text-2xl">{{$rows->name}}</h1>
          <p class="text-center text-gray-800 mt-1 text-xl">(เหลือ : {{$rows->quantity}} {{$rows->unit}} )</p>
          <div class="inline-flex items-center mt-2">
            <input name="quantity" type="number"  placeholder="จำนวนที่ต้องการ" required
            class="appearance-none rounded-none relative block w-full px-3 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 
            rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
            </div>
      
          <button type="submit"
            class="py-2 px-4 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50 mt-4 font-bold
            w-full flex items-center justify-center text-xl" style="background-color: #2A9D8F"
          >เพิ่มลงตะกร้า  
          {{-- <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6 ml-2"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
          />
        </svg> --}}
          </button>
        </div>
      </div>
</form>
@endforeach
</div>
@endsection