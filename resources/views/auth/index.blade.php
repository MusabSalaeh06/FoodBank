@extends('../layouts.app')

@section('content')

<div class="container items-center px-4 py-8 m-auto mt-5">
    <div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">

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
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$product}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนสินค้า</p>
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
           <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$product_type}}</h1>
           <div class="flex flex-row justify-between group-hover:text-gray-200">
             <p class="text-2xl">จำนวนประเภทสินค้า</p>
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
           </div>
         </div>
       </div>

    </div>
  </div>
@endsection