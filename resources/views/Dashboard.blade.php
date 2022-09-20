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
{{-- <div class="bg-gray-400 p-3 text-2xl shadow-md rounded-lg  mx-10 text-white font-semibold mb-5">หน้าแรก</div> --}}
<div class="container items-center px-4 py-8 m-auto mt-5">
    <div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">
      {{-- <ul
        class="w-full sm:w-4/5 text-xs sm:text-sm justify-center lg:justify-end items-center flex flex-row space-x-1 mt-6 overflow-hidden mb-4">
        <li><button
            class="px-4 py-2 bg-indigo-500 rounded-full text-sm text-gray-100 hover:bg-indigo-700 hover:text-gray-200">30
            days</button></li>
        <li><button
            class="px-4 py-2 bg-gray-200 rounded-full text-sm text-gray-700 hover:bg-indigo-700 hover:text-gray-200">90
            days</button></li>
        <li><button
            class="px-4 py-2 bg-gray-200 rounded-full text-sm text-gray-700 hover:bg-indigo-700 hover:text-gray-200">6
            months</button></li>
        <li><button
            class="px-4 py-2 bg-gray-200 rounded-full text-sm text-gray-700 hover:bg-indigo-700 hover:text-gray-200">12
            months</button></li>
      </ul>
       --}}
       @if (Auth::user()->type == "admin")
       <div class="w-full p-2 lg:w-1/3 md:w-1/2">
         <div
           class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
           <div class="flex flex-row justify-between items-center">
             <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
                   fill="currentColor">
                   <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                 </svg>
             </div>
           </div>
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$giver}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนผู้บริจาค</p>
             <span>
               <a href="/giver/show">
                 <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
               </a>
             </span>
           </div>
         </div>
       </div>
       <div class="w-full p-2 lg:w-1/3 md:w-1/2">
         <div
           class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
           <div class="flex flex-row justify-between items-center">
             <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
                   fill="currentColor">
                   <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                 </svg>
             </div>
           </div>
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$sender}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนผู้จัดส่ง</p>
             <span>
               <a href="/sender/show">
                 <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
               </a>
             </span>
           </div>
         </div>
       </div>
       <div class="w-full p-2 lg:w-1/3 md:w-1/2">
         <div
           class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
           <div class="flex flex-row justify-between items-center">
             <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
                   fill="currentColor">
                   <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                 </svg>
             </div>
           </div>
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$reciever}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนผู้รับบริจาค</p>
             <span>
               <a href="/reciever/show">
                 <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
               </a>
             </span>
           </div>
         </div>
       </div>
       @if ($product_type == 0)
       @else
       <div class="w-full p-2 lg:w-1/3 md:w-1/2">
         <div
           class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
           <div class="flex flex-row justify-between items-center">
             <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
               fill="currentColor">
               <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
               <path fill-rule="evenodd"
                 d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                 clip-rule="evenodd" />
             </svg>
             </div>
           </div>
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$product}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนสินค้า</p>
             <span>
               <a href="/product/show">
                 <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
               </a>
             </span>
           </div>
         </div>
       </div>
       @endif

       <div class="w-full p-2 lg:w-1/3 md:w-1/2">
         <div
           class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
           <div class="flex flex-row justify-between items-center">
             <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
               fill="currentColor">
               <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
               <path fill-rule="evenodd"
                 d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                 clip-rule="evenodd" />
             </svg>
             </div>
           </div>
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$product_type}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนประเภทสินค้า</p>
             <span>
               <a href="/product_type/show">
                 <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
               </a>
             </span>
           </div>
         </div>
       </div>
       <div class="w-full p-2 lg:w-1/3 md:w-1/2">
         <div
           class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
           <div class="flex flex-row justify-between items-center">
             <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
               fill="currentColor">
               <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
               <path fill-rule="evenodd"
                 d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                 clip-rule="evenodd" />
             </svg>
             </div>
           </div>
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$donate}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนรอบการบริจาค</p>
             <span>
               <a href="/donate/show">
                 <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
               </a>
             </span>
           </div>
         </div>
       </div>
       @elseif (Auth::user()->type == "sender")
       <div class="w-full p-2 lg:w-1/3 md:w-1/2">
         <div
           class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
           <div class="flex flex-row justify-between items-center">
             <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
               fill="currentColor">
               <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
               <path fill-rule="evenodd"
                 d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                 clip-rule="evenodd" />
             </svg>
             </div>
           </div>
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$mission}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนภารกิจใหม่ของฉัน</p>
             <span>
               <a href="/my/mission">
                 <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
               </a>
             </span>
           </div>
         </div>
       </div>
       <div class="w-full p-2 lg:w-1/3 md:w-1/2">
        <div
          class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
          <div class="flex flex-row justify-between items-center">
            <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
              fill="currentColor">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
              <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd" />
            </svg>
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$mission_complete}}</h1>
          <div class="flex flex-row justify-between group-hover:text-gray-200">
            <p class="text-2xl">จำนวนภารกิจของฉันที่สำเร็จ</p>
            <span>
              <a href="/my/mission">
                <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="w-full p-2 lg:w-1/3 md:w-1/2">
        <div
          class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
          <div class="flex flex-row justify-between items-center">
            <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
              fill="currentColor">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
              <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd" />
            </svg>
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$mission_fail}}</h1>
          <div class="flex flex-row justify-between group-hover:text-gray-200">
            <p class="text-2xl">จำนวนภารกิจของฉันที่ล้มเหลว</p>
            <span>
              <a href="/my/mission">
                <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="w-full p-2 lg:w-1/3 md:w-1/2">
        <div
          class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
          <div class="flex flex-row justify-between items-center">
            <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
              fill="currentColor">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
              <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd" />
            </svg>
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$mission_cancle}}</h1>
          <div class="flex flex-row justify-between group-hover:text-gray-200">
            <p class="text-2xl">จำนวนภารกิที่ถูกยกเลิก</p>
            <span>
              <a href="/my/mission">
                <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="w-full p-2 lg:w-1/3 md:w-1/2">
        <div
          class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
          <div class="flex flex-row justify-between items-center">
            <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
              fill="currentColor">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
              <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd" />
            </svg>
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$mission_reject}}</h1>
          <div class="flex flex-row justify-between group-hover:text-gray-200">
            <p class="text-2xl">จำนวนภารกิจของฉันที่ปฏิเสธ</p>
            <span>
              <a href="/my/mission">
                <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="w-full p-2 lg:w-1/3 md:w-1/2">
        <div
          class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
          <div class="flex flex-row justify-between items-center">
            <div class="px-4 py-3 bg-gray-300  rounded-xl bg-opacity-30">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20"
              fill="currentColor">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
              <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd" />
            </svg>
            </div>
          </div>
          <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$mission_submit}}</h1>
          <div class="flex flex-row justify-between group-hover:text-gray-200">
            <p class="text-2xl">จำนวนภารกิจของฉันที่กำลังทำ</p>
            <span>
              <a href="/my/mission">
                <button type="button" class="text-gray-700 text-xl font-semibold bg-gray-100 p-3 shadow-md rounded-lg">ดูข้อมูล</button>
              </a>
            </span>
          </div>
        </div>
      </div>
       @else
       @endif
    </div>
  </div>
@endsection