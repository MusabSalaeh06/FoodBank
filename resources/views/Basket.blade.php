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


@if ($Co_Basket == 0)
    {{-- <div class="mx-10 shadow-md rounded-lg text-2xl  font-bold text-gray-700 p-5">ไม่พบสินค้าในตะกร้า</div> --}}
@else 
<div
class="flex mx-10 items-center justify-between mb-3 p-3 text-3xl font-semibold text-white 
bg-gray-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"style="background-color: #F4A261">
<div class="flex items-center" >
    <span>ตะกร้าของฉัน</span>
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
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only" width="5%">แก้ไข</span>
                </th>
                <th scope="col" class="py-3 px-6" width="5%">
                    <span class="sr-only">ลบ</span>
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
                <td class="py-4 px-6 text-right">
                    <a href="#" class="font-medium text-gray-500 hover:text-blue-500"> <label
                        for="edit-basket-{{$rows->id}}">แก้ไข</label></a>
                    <input type="checkbox" id="edit-basket-{{$rows->id}}" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box">
                            <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">
                                <div class="max-w-md w-full space-y-8">
                                    <div>
                                        <img class="mx-auto h-12 w-auto"
                                            src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                                            alt="Workflow">
                                        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                                            แก้ไขข้อมูลสินค้า</h2>
                                    </div>
                                    <form action="{{ route('basket.update',$rows->id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field()}}
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <div class="rounded-md shadow-sm -space-y-px">
                                            <div>
                                                <input type="text" autocomplete="current-password" required readonly
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{$rows->product->name}}">
                                            </div>
                                            <div>
                                                <input name="quantity" type="text" autocomplete="current-password"
                                                    required
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{$rows->quantity}}">
                                            </div>
                                            <div>
                                                <input name="admin" type="hidden" autocomplete="current-password" required
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{Auth::user()->member_id}}">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                                </span>
                                                อัพเดท
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="modal-action">
                                <label for="edit-basket-{{$rows->id}}"
                                    class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                            </div>

                        </div>
                    </div>
                </td>
                <td class="py-4 px-6 text-right">
                    <form action="{{route('basket.delete',$rows->id)}}" class="nav-link dropdown" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="font-medium text-gray-500 hover:text-blue-500"
                            onclick="return confirm('คุณต้องการลบสินค้าที่ชื่อ {{$rows->product->name}}หรือไม่?')">
                            ลบ</button>
                    </form>
                </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
<form action="{{route('check.donate')}}" method="POST" enctype="multipart/form-data" >
    @csrf    

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10 mt-3">
        <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
            <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        เลือกรายชื่อผู้จัดส่ง
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                            
                            <select class="w-full js-example-basic-single" id="Sender" name="sender" >
                                <option value="">เลือกรายชื่อผู้จัดส่ง</option>
                                @foreach ($sender as $i=>$senders)
                                <option value="{{$senders->member_id}}">{{$senders->name}} {{$senders->surname}} || สถานะ : {{$senders->status}} || <br>
                                ที่อยู่ : 
                                @if ($senders->sub_district == null)
                                    ไม่ระบุ                        
                                @else
                                เขต {{$senders->county}} ถนน {{$senders->road}} ซอย {{$senders->alley}} บ้านเลขที่ {{$senders->house_number}}
                                หมู่ที่ {{$senders->group_no}} ตำบล {{$senders->sub_district}} อำเภอ {{$senders->district}} จังหวัด
                                {{$senders->province}}
                                ไปรษณีย์ {{$senders->ZIP_code}}
                                @endif
                                </option>
                                @endforeach
                            </select>
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
                        เลือกรายชื่อผู้รับ
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                            
                            <select class="w-full js-example-basic-single" id="Reciever" name="reciever" >
                                <option value="">เลือกรายชื่อผู้รับ</option>
                                @foreach ($reciever as $i=>$recievers)
                                <option value="{{$recievers->member_id}}">{{$recievers->name}} {{$recievers->surname}} || <br>
                                ที่อยู่ : 
                                @if ($recievers->sub_district == null)
                                    ไม่ระบุ                        
                                @else
                                เขต {{$recievers->county}} ถนน {{$recievers->road}} ซอย {{$recievers->alley}} บ้านเลขที่ {{$recievers->house_number}}
                                หมู่ที่ {{$recievers->group_no}} ตำบล {{$recievers->sub_district}} อำเภอ {{$recievers->district}} จังหวัด
                                {{$recievers->province}} ไปรษณีย์ {{$recievers->ZIP_code}}
                                @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<input type="hidden" name="admin" value="{{Auth::user()->member_id}}">


<button type="sumbit" class="bg-green-500 text-white active:bg-pink-500 font-bold uppercase text-2xl px-6 py-3 mx-10 mb-5
mt-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
style="background-color: #2A9D8F" >ทำการบริจาค</button>

</form>

@endif
<script>
    $(document).ready(function() {
        $('#Reciever').select2();
    });
    $(document).ready(function() {
        $('#Sender').select2();
    });
    </script>
@endsection
{{--
                        <div>
                            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                            
                            <select class="w-full js-example-basic-single" id="Sender" name="sender">
                                <option selected>เลือกรายชื่อผู้รับ</option>
                                @foreach ($sender as $i=>$senders)
                                <option  value="{{$senders->member_id}}">
                                {{$senders->name}} {{$senders->surname}}
                                </option>
                                @endforeach
                              </select>
                        </div>
    
                        <div>
                            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                            
                            <select class="w-full js-example-basic-single" id="Reciever" name="reciever">
                                <option selected>เลือกรายชื่อผู้รับ</option>
                                @foreach ($reciever as $i=>$recievers)
                                <option  value="{{$recievers->member_id}}">
                                {{$recievers->name}} {{$recievers->surname}}
                                </option>
                                @endforeach
                              </select>
                        </div>
<script>
    $(document).ready(function() {
        $('#Reciever').select2();
    });
    $(document).ready(function() {
        $('#Sender').select2();
    });
    </script>
                         --}}