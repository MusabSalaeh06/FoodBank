@extends('layouts.default')

@section('content')

<div class=" items-center px-4 py-8 mt-5">
<div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">
<div class="w-full p-2 lg:w-1/4 md:w-1/2">
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
      <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$prod_amount}}</h1>
      <div class="flex flex-row justify-between group-hover:text-gray-200">
        <p class="text-2xl">จำนวนสินค้าที่ฉันบริจาค</p>
      </div>
    </div>
  </div>
  <div class="w-full p-2 lg:w-1/4 md:w-1/2">
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
      <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$prod_quantity}}</h1>
      <div class="flex flex-row justify-between group-hover:text-gray-200">
        <p class="text-2xl">จำนวนสินค้าที่คงเหลือ</p>
      </div>
    </div>
  </div>
  <div class="w-full p-2 lg:w-1/4 md:w-1/2">
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
      <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$prod_ant}}</h1>
      <div class="flex flex-row justify-between group-hover:text-gray-200">
        <p class="text-2xl">จำนวนสินค้าที่บริจาคหมดเเล้ว</p>
      </div>
    </div>
  </div>
  <div class="w-full p-2 lg:w-1/4 md:w-1/2">
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
      <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">{{$prod_cancle}}</h1>
      <div class="flex flex-row justify-between group-hover:text-gray-200">
        <p class="text-2xl">จำนวนสินค้าที่ยกเลิกบริจาค</p>
      </div>
    </div>
  </div>
</div>
<div
    class="flex mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg 
    shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
    <div class="flex items-center">
        <span>ข้อมูลสินค้าที่ฉันบริจาค</span>
    </div>
    @if ($co_type == 0)
        
    @else
    <label
        class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button" for="add-product" style="background-color: #2A9D8F">
        เพิ่มข้อมูล
    </label>
    @endif
    <input type="checkbox" id="add-product" class="modal-toggle" />
    <div class="modal overflow-scroll">
        <div class="modal-box">
        <div class="mx-2 bg-white rounded-lg shadow-md">
                    <div class="bg-indigo-500 rounded-sm text-white p-3 text-3xl "  >
                        เพิ่มข้อมูลสินค้า
                    </div>
            <div class="w-full p-5">
                    <form action="{{ route('prod.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                            <div>
                                <div class="text-2xl text-gray-700 m-1">ชื่อสินค้า :</div>
                                <input name="name" type="text" autocomplete="current-password" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    placeholder="...">
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">คำอธิบาย :</div>
                                <textarea name="description" cols="30" rows="3" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="..." ></textarea>
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">เลือกประเภทสินค้า :</div>
                                <select name="type" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected="">เลือกประเภทสินค้า</option>
                                    @foreach ($type as $i=>$rows)
                                    <option value="{{$rows->product_type_id}}">{{$rows->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">ปริมาณ :</div>
                                <input name="amount" type="text" autocomplete="current-password" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    placeholder="...">
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">หน่วย :</div>
                                <input name="unit" type="text" autocomplete="current-password" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    placeholder="...">
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">รูปสินค้า :</div>
                                <input name="product_image" type="file"
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
                            </div>
                            <div>
                                <input name="giver" type="hidden" required
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    value="{{Auth::user()->member_id}}">
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-2xl font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                </span>
                                บันทึก
                            </button>

                            <div class="modal-action mt-3">
                                <label for="add-product"
                                    class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                            </div>

                        </div>
                    </form>
                </div>
        </div>
            </div>
        </div>
</div>
@if ($co_my_donate == 0)
@else
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
                {{-- <th scope="col" class="py-3 px-6">
                    ลำดับ
                </th> --}}
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    <span class="sr-only">รูปภาพ</span>
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    วันที่เพิ่ม
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ชื่อสินค้า
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ประเภทสินค้า
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    สถานะ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                 ปริมาณ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                 คงเหลือ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    เจ้าหน้าที่
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    <span class="sr-only" width="5%">ดูรายละเอียด</span>
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    <span class="sr-only" width="5%">แก้ไข</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($my_donate as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                {{-- <td class="py-4 px-6">
                    {{$i+1}}
                </td> --}}
                @if ($rows->product_image == null)
                @else
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    <img class="m-2" src="/storage/product/product_image_assets/{{$rows->product_image}}" width="100px" height="100px">
                    {{-- <img class="m-2" src="{{asset($rows->product_image)}}" width="100px" height="100px"> --}}
                </td>
                @endif
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{\Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($rows->created_at)->format('Y')+543}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->name}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->types->name}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    @if ($rows->status == null)
                        พร้อมบริจาค
                    @elseif ($rows->status == 'hide')
                        บริจาคหมดเเล้ว
                    @else
                        {{$rows->status}}
                    @endif
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->amount}} {{$rows->unit}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->quantity}} {{$rows->unit}}
                </td>
                @if ($rows->admin == null)
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    เพิ่มโดยผู้บริจาค
                </td>
                @else
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->admins->name}} {{$rows->admins->surname}}
                </td>
                @endif
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                    <a href="{{route('product.detail',$rows->product_id)}}" class="font-bold text-gray-500 hover:text-blue-500"> 
                       ดูรายละเอียด
                    </a>
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                    <a href="{{route('cancle.donate',$rows->product_id)}}" class="font-bold text-gray-500 hover:text-blue-500"
                        onclick="return confirm('คุณต้องการยกเลิกบริจาคสินค้าที่ชื่อ {{$rows->name}} หรือไม่?')">ยกเลิกบริจาค</></a>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

<div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      </div>
      <div>
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" >
            <div class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
                {{$my_donate->links()}}
            </div>
        </nav>
      </div>
    </div>
  </div>

@endif
@endsection