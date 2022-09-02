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
class="flex mx-10 items-center justify-between mb-3 px-6 py-3 text-2xl font-semibold text-white 
bg-gray-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"style="background-color: #F4A261">
<div class="flex items-center" >
    <span>รายละเอียดสินค้าที่จะบริจาค</span>
</div>
</div>
<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">รูปภาพ</span>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($Basket as $i=>$rows)
            <tr class="bg-white text-2xl border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    <img class="m-2" src="/storage/product/product_image_assets/{{$rows->product->product_image}}" width="100px" height="100px">
                    {{-- <img class="m-2" src="{{asset($rows->product_image)}}" width="100px" height="100px"> --}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->product->name}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->product->types->name}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->quantity}} {{$rows->product->unit}}
                </td> 
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
<form action="{{route('donate.store')}}" method="POST" enctype="multipart/form-data" >
    @csrf    
        
    <input type="hidden" name="sender" value="{{$sender->member_id}}" required>
    <input type="hidden" name="reciever" value="{{$reciever->member_id}}" required>
    <input type="hidden" name="admin" value="{{Auth::user()->member_id}}" required>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10 mt-3">
        <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
            <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ข้อมูลผู้จัดส่ง
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="mx-10 my-3 font-bold">
                                @if ($sender->profile == null)
                                <img src="/storage/no_image.png" width="100px" height="100px">                 
                                @else
                                <img class="m-2" src="/storage/member/profile_image_assets/{{$sender->profile}}" width="100px" height="100px">
                                @endif
                                {{$sender->name}} {{$sender->surname}}  <br>
                                ที่อยู่ : 
                                @if ($sender->sub_district == null)
                                    ไม่ระบุ                        
                                @else
                                เขต {{$sender->county}} ถนน {{$sender->road}} ซอย {{$sender->alley}} บ้านเลขที่ {{$sender->house_number}}
                                หมู่ที่ {{$sender->group_no}} ตำบล {{$sender->sub_district}} อำเภอ {{$sender->district}} จังหวัด
                                {{$sender->province}}
                                ไปรษณีย์ {{$sender->ZIP_code}}
                                @endif
                        </div>
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
                <tr>
                    <td>
                        <div class="mx-10 my-3 font-bold">
                                @if ($reciever->profile == null)
                                <img src="/storage/no_image.png" width="100px" height="100px">                 
                                @else
                                <img class="m-2" src="/storage/member/profile_image_assets/{{$reciever->profile}}" width="100px" height="100px">
                                @endif
                                {{$reciever->name}} {{$reciever->surname}} <br> 
                                ที่อยู่ : 
                                @if ($reciever->sub_district == null)
                                    ไม่ระบุ                        
                                @else
                                เขต {{$reciever->county}} ถนน {{$reciever->road}} ซอย {{$reciever->alley}} บ้านเลขที่ {{$reciever->house_number}}
                                หมู่ที่ {{$reciever->group_no}} ตำบล {{$reciever->sub_district}} อำเภอ {{$reciever->district}} จังหวัด
                                {{$reciever->province}} ไปรษณีย์ {{$reciever->ZIP_code}}
                                @endif
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
<button type="sumbit" class="bg-green-500 text-white active:bg-pink-500 font-bold uppercase text-2xl px-6 py-3 mx-10 mb-5
mt-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
style="background-color: #2A9D8F" >ยืนยัน</button>

<a href="{{route('basket.show')}}">
<button type="button" class="bg-green-500 text-white active:bg-pink-500 font-bold uppercase text-2xl px-6 py-3 mb-5
mt-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
style="background-color: #E76F51" >ยกเลิก</button>
</a>

</form>

@endsection