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

<div class="items-center px-4 py-8 m-auto mt-5">
    <div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">
<div class="w-full p-2 lg:w-1/6 md:w-1/2">
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
      </div>
    </div>
  </div>
  <div class="w-full p-2 lg:w-1/6 md:w-1/2">
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
     </div>
   </div>
 </div>
 <div class="w-full p-2 lg:w-1/6 md:w-1/2">
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
     </div>
   </div>
 </div>
 <div class="w-full p-2 lg:w-1/6 md:w-1/2">
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
     </div>
   </div>
 </div>
 <div class="w-full p-2 lg:w-1/6 md:w-1/2">
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
     </div>
   </div>
 </div>
 <div class="w-full p-2 lg:w-1/6 md:w-1/2">
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
     </div>
   </div>
 </div>
    </div>
</div>

@if($co_my_mission == 0)

@else
<div
    class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg 
    shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
    <div class="flex items-center">
        <span>ภารกิจของฉัน</span>
    </div>
</div>
<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    วันที่บริจาค
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ผู้รับบริจาค
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    สถานะ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    เจ้าหน้าที่ควบคุม
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    <span class="sr-only" >ดูรายละเอียด</span>
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white" colspan="3">
                    <span class="sr-only"></span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($my_mission as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{\Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($rows->created_at)->format('Y')+543}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->recievers->name}} {{$rows->recievers->surname}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->status}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->admins->name}} {{$rows->admins->surname}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                    <a href="{{route('mission.detail',$rows->id)}}" class="font-bold text-gray-500 hover:text-blue-500"> 
                       ดูรายละเอียด
                    </a>
                </td>
                    <form action="{{ route('mission.update',$rows->id)}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field()}}
                        {{ method_field('PUT') }}
                        @csrf
                        @if ($rows->status == "รอการตอบรับ")
                        <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                                <div>
                                    <button name="status" type="submit" value="ตอบรับ"
                                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        ตอบรับ
                                    </button>
                                </div>
                        </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                                <div>
                                    <button name="status" type="submit" value="ปฏิเสธ"
                                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        ปฏิเสธ
                                    </button>
                                </div>
                        </td>
                        @elseif ($rows->status == "ยกเลิกภารกิจ")     
                        <td></td><td></td><td></td>
                        @elseif ($rows->status == "ตอบรับ")
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                            <div>
                                <input type="file" name="image"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            </div>
                        </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                            <div>
                                <button name="status" type="submit" value="ส่งสำเร็จ"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    ส่งสำเร็จ
                                </button>
                            </div>
                        </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                            <div>
                                <button name="status" type="submit" value="ส่งคืนสินค้า"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-red-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    ส่งคืนสินค้า
                                </button>
                            </div>
                        </td>
                        @elseif ($rows->status == "ปฏิเสธ")       
                        <td></td><td></td><td></td>
                        @elseif ($rows->status == "ส่งสำเร็จ")      
                        <td></td><td></td><td></td>
                        @elseif ($rows->status == "ส่งคืนสินค้า")      
                        <td></td><td></td><td></td>
                        @else
                            
                        @endif
                    </form>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

<div class="flex items-center justify-between  border-gray-200 bg-white px-4 py-3 sm:px-6">
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      </div>
      <div>
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" >
            <div class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                {{$my_mission->links()}}
            </div>
        </nav>
      </div>
    </div>
  </div>
@endif
@endsection