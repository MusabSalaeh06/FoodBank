@extends('layouts.default')

@section('content')

    <div
        class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg 
        shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
        <div class="flex items-center">
            <span>ข้อมูลสินค้า</span>
        </div>
    </div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
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
                 ปริมาณ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                 คงเหลือ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ผู้บริจาค
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    เจ้าหน้าที่
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @if ($product->product_image == null)
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                </td>
                @else
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    <img class="m-2" src="/storage/product/product_image_assets/{{$product->product_image}}" width="100px" height="100px">
                    {{-- <img class="m-2" src="{{asset($product->product_image)}}" width="100px" height="100px"> --}}
                </td>
                @endif
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{\Carbon\Carbon::parse($product->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($product->created_at)->format('Y')+543}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$product->name}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$product->types->name}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$product->amount}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$product->quantity}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$product->givers->name}} {{$product->givers->surname}}
                </td>
                @if ($product->admin == null)
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    เพิ่มโดยผู้บริจาค
                </td>
                @else
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$product->admins->name}} {{$product->admins->surname}}
                </td>
                @endif
            </tr>
        </tbody>
    </table>
</div>

<div
class="flex mx-10 mb-3 items-center justify-between p-3 my-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg 
shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
<div class="flex items-center">
    <span>ข้อมูลการบริจาค</span>
</div>
</div>
@if ($co_basket == null)
    
@else
<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    วันที่บริจาค
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ปริมาณที่บริจาค
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ชื่อผู้รับ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ที่อยู่ผู้รับ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    เจ้าหน้าที่
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    <span class="sr-only" width="5%">ดูรายละเอียด</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($basket as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{\Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($product->created_at)->format('Y')+543}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->quantity}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->donates->recievers->name}} {{$rows->donates->recievers->surname}}
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    @if ($rows->donates->recievers->sub_district == null)
                        ไม่ระบุ                        
                    @else
                    เขต {{$rows->donates->recievers->county}} ถนน {{$rows->donates->recievers->road}} ซอย {{$rows->donates->recievers->alley}}
                    บ้านเลขที่ {{$rows->donates->recievers->house_number}} หมู่ที่ {{$rows->donates->recievers->group_no}} 
                    ตำบล {{$rows->donates->recievers->sub_district}} อำเภอ {{$rows->donates->recievers->district}} 
                    จังหวัด {{$rows->donates->recievers->province}} ไปรษณีย์ {{$rows->donates->recievers->ZIP_code}}
                    @endif
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
                    <a href="{{route('mission.detail',$rows->donate_id)}}"
                        class="font-bold text-gray-500 hover:text-blue-500">
                        ดูรายละเอียด
                    </a>
                </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection