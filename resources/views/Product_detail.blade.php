@extends('layouts.default')

@section('content')

    <div
        class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <span>ข้อมูลสินค้า</span>
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
                    วันที่เพิ่ม
                </th>
                <th scope="col" class="py-3 px-6">
                    ชื่อสินค้า
                </th>
                <th scope="col" class="py-3 px-6">
                    ประเภทสินค้า
                </th>
                <th scope="col" class="py-3 px-6">
                 ปริมาณ
                </th>
                <th scope="col" class="py-3 px-6">
                 คงเหลือ
                </th>
                <th scope="col" class="py-3 px-6">
                    ผู้บริจาค
                </th>
                <th scope="col" class="py-3 px-6">
                    เจ้าหน้าที่
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    <img class="m-2" src="/storage/product/product_image_assets/{{$product->product_image}}" width="100px"
                        height="100px">
                </td>
                <td class="py-4 px-6">
                    {{\Carbon\Carbon::parse($product->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($product->created_at)->format('Y')+543}}
                </td>
                <td class="py-4 px-6">
                    {{$product->name}}
                </td>
                <td class="py-4 px-6">
                    {{$product->types->name}}
                </td>
                <td class="py-4 px-6">
                    {{$product->amount}}
                </td>
                <td class="py-4 px-6">
                    {{$product->quantity}}
                </td>
                <td class="py-4 px-6">
                    {{$product->givers->name}} {{$product->givers->surname}}
                </td>
                @if ($product->admin == null)
                <td class="py-4 px-6">
                    เพิ่มโดยผู้บริจาค
                </td>
                @else
                <td class="py-4 px-6">
                    {{$product->admins->name}} {{$product->admins->surname}}
                </td>
                @endif
            </tr>
        </tbody>
    </table>
</div>

<div
class="flex mx-10 mb-3 items-center justify-between p-3 my-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
<div class="flex items-center">
    <span>ข้อมูลการบริจาค</span>
</div>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    วันที่บริจาค
                </th>
                <th scope="col" class="py-3 px-6">
                    ปริมาณที่บริจาค
                </th>
                <th scope="col" class="py-3 px-6">
                    ชื่อผู้รับ
                </th>
                <th scope="col" class="py-3 px-6">
                    ที่อยู่ผู้รับ
                </th>
                <th scope="col" class="py-3 px-6">
                    เจ้าหน้าที่
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($basket as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    {{\Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($product->created_at)->format('Y')+543}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->quantity}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->donates->recievers->name}} {{$rows->donates->recievers->surname}}
                </td>
                <td class="py-4 px-6">
                    เขต {{$rows->donates->recievers->county}} ถนน {{$rows->donates->recievers->road}} ซอย {{$rows->donates->recievers->alley}}
                    บ้านเลขที่ {{$rows->donates->recievers->house_number}} หมู่ที่ {{$rows->donates->recievers->group_no}} 
                    ตำบล {{$rows->donates->recievers->district}} อำเภอ {{$rows->donates->recievers->sub_district}} 
                    จังหวัด {{$rows->donates->recievers->province}} ไปรษณีย์ {{$rows->donates->recievers->ZIP_code}}
                </td>
                @if ($rows->admin == null)
                <td class="py-4 px-6">
                    เพิ่มโดยผู้บริจาค
                </td>
                @else
                <td class="py-4 px-6">
                    {{$rows->admins->name}} {{$rows->admins->surname}}
                </td>
                @endif
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection