@extends('layouts.default')

@section('content')

<div
    class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
    <div class="flex items-center">
        <span>ข้อมูลสินค้าที่บริจาค</span>
    </div>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">รูปภาพ</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    ชื่อสินค้า
                </th>
                <th scope="col" class="py-3 px-6">
                    ปริมาณ
                </th>
                <th scope="col" class="py-3 px-6">
                    ชื่อผู้บริจาค
                </th>
                <th scope="col" class="py-3 px-6">
                   ข้อมูลผู้บริจาคและที่อยู่สินค้า
               </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($basket as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    <img class="m-2" src="/storage/product/product_image_assets/{{$rows->product->product_image}}" width="100px" height="100px">
                    {{-- <img class="m-2" src="{{asset($rows->product_image)}}" width="100px" height="100px"> --}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->product->name}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->quantity}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->product->givers->name}} {{$rows->product->givers->surname}}
                </td>
                <td class="py-4 px-6">
                    ชื่อ {{$rows->product->givers->name}} {{$rows->product->givers->surname}} || เบอร์โทร : {{$rows->product->givers->tel}} || ที่อยู่ :
                    เขต {{$rows->product->givers->county}} ถนน {{$rows->product->givers->road}} ซอย {{$rows->product->givers->alley}}
                    บ้านเลขที่ {{$rows->product->givers->house_number}} หมู่ที่ {{$rows->product->givers->group_no}} 
                    ตำบล {{$rows->product->givers->district}} อำเภอ {{$rows->product->givers->sub_district}} 
                    จังหวัด {{$rows->product->givers->province}} ไปรษณีย์ {{$rows->product->givers->ZIP_code}}
                </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10 mt-3">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ข้อมูลผู้รับ
               </th> 
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    ชื่อ {{$mission->recievers->name}} {{$mission->recievers->surname}} || เบอร์โทร : {{$mission->recievers->tel}} || ที่อยู่ :
                    เขต {{$mission->recievers->county}} ถนน {{$mission->recievers->road}} ซอย {{$mission->recievers->alley}}
                    บ้านเลขที่ {{$mission->recievers->house_number}} หมู่ที่ {{$mission->recievers->group_no}} 
                    ตำบล {{$mission->recievers->district}} อำเภอ {{$mission->recievers->sub_district}} 
                    จังหวัด {{$mission->recievers->province}} ไปรษณีย์ {{$mission->recievers->ZIP_code}}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10 mt-3">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr> 
                <th scope="col" class="py-3 px-6" colspan="2">
                    ข้อมูลภารกิจ
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @if ($mission->image == null)
                @else
                <td class="py-4 px-6">
                    <img class="m-2" src="/storage/donate/donate_image_assets/{{$mission->image}}" width="300px"
                        height="300px"> 
                </td>
                @endif
                 <td class="py-4 px-6" width="80%">
                    สถานะ : {{$mission->status}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection