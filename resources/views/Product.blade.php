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
    class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg 
    shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
    <div class="flex items-center">
        <span>จัดการข้อมูลสินค้า</span>
    </div>
    <label
        class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button" for="add-product" style="background-color: #2A9D8F">
        เพิ่มข้อมูล
    </label>
    <input type="checkbox" id="add-product" class="modal-toggle" />
    
    <div class="modal overflow-scroll">
        <div class="modal-box">
        <div class="mx-2 bg-white rounded-lg shadow-md">
                    <div class="bg-indigo-500 rounded-sm text-white p-3 text-3xl ">
                        เพิ่มข้อมูลสินค้า
                    </div>
            <div class="w-full p-5">
                    <form action="{{ route('prod.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-1">
                        <div>
                            <div class="text-2xl text-gray-700 m-1">เลือกรายชื่อผู้บริจาค <div class="inline text-red-500"> * </div> :</div>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                            <select class="w-full js-example-basic-single" id="Reciever" name="giver">
                                    <option value="">เลือกรายชื่อผู้บริจาค</option>
                                    @foreach ($giver as $i=>$givers)
                                    <option value="{{$givers->member_id}}">{{$givers->name}} {{$givers->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">ชื่อสินค้า <div class="inline text-red-500"> * </div> :</div>
                                <input name="name" type="text" autocomplete="current-password" 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    placeholder="...">
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">คำอธิบาย :</div>
                                <textarea name="description" cols="30" rows="3" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="..." ></textarea>
                            </div>
                            <div>
                            <div class="text-2xl text-gray-700 m-1">เลือกประเภทสินค้า <div class="inline text-red-500"> * </div> :</div>
                            <select name="type" type="text" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">เลือกประเภทสินค้า</option>
                                    @foreach ($type as $i=>$types)
                                    <option value="{{$types->product_type_id}}">{{$types->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">ปริมาณ <div class="inline text-red-500"> * </div> :</div>
                                <input name="amount" type="text" autocomplete="current-password" 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    placeholder="...">
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">หน่วย (เช่น ห่อ,ถุง) <div class="inline text-red-500"> * </div> :</div>
                                <input name="unit" type="text" autocomplete="current-password" 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    placeholder="...">
                            </div>
                            <div>
                                <div class="text-2xl text-gray-700 m-1">รูปสินค้า :</div>
                                <input name="product_image" type="file"
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
                            </div>
                            <div>
                                <input name="admin" type="hidden" autocomplete="current-password" 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    value="{{Auth::user()->member_id}}">
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
@if ($co_product == null)
@else
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
                    สถานะ
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
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    <span class="sr-only" width="5%">ดูรายละเอียด</span>
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    <span class="sr-only" width="5%">แก้ไข</span>
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    <span class="sr-only" width="5%">ลบ</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @if ($rows->product_image == null)
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                </td>
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
                    @if ($rows->types == null)
                        ข้อมูลประเภทสินค้าถูกลบ
                    @else
                        {{$rows->types->name}}
                    @endif
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
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white">
                    {{$rows->givers->name}} {{$rows->givers->surname}}
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
                    <a href="#" class="font-bold text-gray-500 hover:text-blue-500  text-right"> <label
                            for="edit-product-{{$rows->product_id}}">แก้ไข</label></a>
                    <input type="checkbox" id="edit-product-{{$rows->product_id}}" class="modal-toggle" />
                    
                    <div class="modal overflow-scroll">
                        <div class="modal-box">
                        <div class="mx-2 bg-white rounded-lg shadow-md">         
                            <div class="bg-indigo-500 rounded-sm font-bold text-white text-left p-3 text-3xl ">
                                แก้ไขข้อมูลสินค้า
                            </div>
                            <div class="w-full p-5">
                                    <form action="{{ route('prod.update',$rows->product_id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field()}}
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <div class="grid gap-6 mb-8 font-bold  md:grid-cols-2  xl:grid-cols-1">
                                            <div>
                                                <div class="text-2xl text-gray-700 m-1 text-left">เลือกรายชื่อผู้บริจาค <div class="inline text-red-500"> * </div> :</div>
                                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                                                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                                <select class="Sender w-full js-example-basic-single" name="giver">
                                                    @foreach ($giver as $i=>$givers)
                                                    <option class="text-left" value="{{$givers->member_id}}">{{$givers->name}}
                                                        {{$givers->surname}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">ชื่อสินค้า <div class="inline text-red-500"> * </div> :</div>
                                                <input name="name" type="text" autocomplete="current-password" 
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{$rows->name}}">
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">คำอธิบาย :</div>
                                                <textarea name="description" cols="30" rows="3" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                >{{$rows->description}}</textarea>
                                            </div>
                                            <div>
                                            <div class="text-2xl text-gray-700 text-left m-1">เลือกประเภทสินค้า <div class="inline text-red-500"> * </div> :</div>
                                            <select name="type" type="text" 
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="{{$rows->types->product_type_id}}">{{$rows->types->name}}</option>
                                                    @foreach ($type as $i=>$types)
                                                    <option value="{{$types->product_type_id}}">{{$types->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">ปริมาณ <div class="inline text-red-500"> * </div> :</div>
                                                <input name="amount" type="text" autocomplete="current-password"
                                                    
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{$rows->amount}}">
                                            </div>
                                            <div>
                                                <div class="text-2xl text-gray-700 font-bold  m-1">หน่วย (เช่น ห่อ,ถุง) <div class="inline text-red-500"> * </div> :</div>
                                                <input name="unit" type="text" autocomplete="current-password" 
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{$rows->unit}}">
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">รูปสินค้า :</div>
                                                <input name="product_image" type="file"
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                                </span>
                                                อัพเดท
                                            </button>

                                        <div class="modal-action mt-3">
                                            <label for="edit-product-{{$rows->product_id}}"
                                                class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                                        </div>
                                        </div>
                                    </form>
                            </div>

                        </div>
                    </div>
                    </div>
                </td>
                <td scope="row" class="py-4 px-6 font-bold text-gray-700 whitespace-nowrap dark:text-white text-right">
                    <form action="{{route('prod.delete',$rows->product_id)}}" class="nav-link dropdown" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="font-bold text-gray-500 hover:text-blue-500"
                            onclick="return confirm('คุณต้องการลบสมาชิกที่ชื่อ {{$rows->name}}หรือไม่?')">
                            ลบ</button>
                    </form>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endif
<script>
    $(document).ready(function() {
        $('#Reciever').select2();
    });
    $(document).ready(function() {
        $('.Sender').select2();
    });
    </script>
@endsection
{{--
                        <div>
                            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                            
                            <select class="w-full js-example-basic-single" id="Giver" name="giver">
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
                            
                            <select class="w-full js-example-basic-single" id="Prodtype" name="type">
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