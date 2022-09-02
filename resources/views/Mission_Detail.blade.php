@extends('layouts.default')

@section('content')

<div
    class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg 
    shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
    <div class="flex items-center">
        <span>ข้อมูลสินค้าที่บริจาค</span>
    </div>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A" >
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
                    {{$rows->product->name ??null}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->quantity ??null}} {{$rows->product->unit ??null}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->product->givers->name ??null}} {{$rows->product->givers->surname ??null}}
                </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10 mt-3">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ข้อมูลผู้บริจาค
               </th> 
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    @if ($rows->product->givers->profile == null)
                    <img src="/storage/no_image.png" width="100px" height="100px">                 
                    @else
                    <img class="m-2" src="/storage/member/profile_image_assets/{{$rows->product->givers->profile}}" width="100px" height="100px">
                    @endif
                    ชื่อ {{$rows->product->givers->name ??null}} {{$rows->product->givers->surname ??null}} || เบอร์โทร : {{$rows->product->givers->tel ??null}} || ที่อยู่ :
                    @if ($rows->product->givers->sub_district == null)
                        ไม่ระบุ                        
                    @else
                    เขต {{$rows->product->givers->county ??null}} ถนน {{$rows->product->givers->road ??null}} ซอย {{$rows->product->givers->alley ??null}}
                    บ้านเลขที่ {{$rows->product->givers->house_number ??null}} หมู่ที่ {{$rows->product->givers->group_no ??null}} 
                    ตำบล {{$rows->product->givers->sub_district ??null}} อำเภอ {{$rows->product->givers->district ??null}} 
                    จังหวัด {{$rows->product->givers->province ??null}} ไปรษณีย์ {{$rows->product->givers->ZIP_code ??null}}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10 mt-3">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ข้อมูลผู้รับ
               </th> 
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6 ">
                    @if ($mission->recievers->profile == null)
                    <img src="/storage/no_image.png" width="100px" height="100px">                 
                    @else
                    <img class="m-2" src="/storage/member/profile_image_assets/{{$mission->recievers->profile}}" width="100px" height="100px">
                    @endif
                    ชื่อ {{$mission->recievers->name ??null}} {{$mission->recievers->surname ??null}} || เบอร์โทร : {{$mission->recievers->tel ??null}} || ที่อยู่ :
                    @if ($mission->recievers->sub_district == null)
                        ไม่ระบุ                        
                    @else
                    เขต {{$mission->recievers->county ??null}} ถนน {{$mission->recievers->road ??null}} ซอย {{$mission->recievers->alley ??null}}
                    บ้านเลขที่ {{$mission->recievers->house_number ??null}} หมู่ที่ {{$mission->recievers->group_no ??null}} 
                    ตำบล {{$mission->recievers->sub_district ??null}} อำเภอ {{$mission->recievers->district ??null}} 
                    จังหวัด {{$mission->recievers->province ??null}} ไปรษณีย์ {{$mission->recievers->ZIP_code ??null}}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10 mt-3">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
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
                    สถานะ : {{$mission->status ??null}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection