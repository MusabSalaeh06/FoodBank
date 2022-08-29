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
    class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
    <div class="flex items-center">
        <span>จัดการข้อมูลสินค้า</span>
    </div>
    <label
        class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button" for="add-product">
        เพิ่มข้อมูล
    </label>
    <input type="checkbox" id="add-product" class="modal-toggle" />
    <div class="modal"> 
        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">
                    <div class="bg-indigo-500 rounded-sm text-white p-3 text-3xl ">
                        เพิ่มข้อมูลสินค้า
                    </div>
            <div class="w-full p-5">
                    <form class="mt-8 space-y-6" action="{{ route('prod.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                            <div>
                                <div class="text-2xl text-gray-700 m-1">เลือกรายชื่อผู้บริจาค :</div>
                                <select name="giver" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected="">เลือกรายชื่อผู้บริจาค</option>
                                    @foreach ($giver as $i=>$rows)
                                    <option value="{{$rows->member_id}}">{{$rows->name}} {{$rows->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
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
                                <input name="quantity" type="text" autocomplete="current-password" required
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
<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ลำดับ
                </th>
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
                    คำอธิบาย
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
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only" width="5%">ดูรายละเอียด</span>
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
            @foreach ($product as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    {{$i+1}}
                </td>
                @if ($rows->product_image == null)
                @else
                <td class="py-4 px-6">
                    <img class="m-2" src="/storage/product/product_image_assets/{{$rows->product_image}}" width="100px" height="100px">
                    {{-- <img class="m-2" src="{{asset($rows->product_image)}}" width="100px" height="100px"> --}}
                </td>
                @endif
                <td class="py-4 px-6">
                    {{\Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($rows->created_at)->format('Y')+543}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->name}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->description}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->types->name}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->amount}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->quantity}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->givers->name}} {{$rows->givers->surname}}
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
                <td class="py-4 px-6 text-right">
                    <a href="{{route('product.detail',$rows->product_id)}}" class="font-medium text-gray-500 hover:text-blue-500"> 
                       ดูรายละเอียด
                    </a>
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="#" class="font-medium text-gray-500 hover:text-blue-500"> <label
                            for="edit-product-{{$rows->product_id}}">แก้ไข</label></a>
                    <input type="checkbox" id="edit-product-{{$rows->product_id}}" class="modal-toggle" />
                    <div class="modal">
                        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">         
                            <div class="bg-indigo-500 rounded-sm font-bold text-white text-left p-3 text-3xl ">
                                แก้ไขข้อมูลสินค้า
                            </div>
                            <div class="w-full p-5">
                                    <form class="mt-8 space-y-6" action="{{ route('prod.update',$rows->product_id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field()}}
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">เลือกรายชื่อผู้บริจาค :</div>
                                                <select name="giver" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @foreach ($giver as $i=>$givers)
                                                    <option value="{{$givers->member_id}}">{{$givers->name}}
                                                        {{$givers->surname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">ชื่อสินค้า :</div>
                                                <input name="name" type="text" autocomplete="current-password" required
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{$rows->name}}">
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">คำอธิบาย :</div>
                                                <textarea name="description" cols="30" rows="3" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                >{{$rows->description}}</textarea>
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">ประเภทสินค้า :</div>
                                                <select name="type" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @foreach ($type as $i=>$types)
                                                    <option value="{{$types->product_type_id}}">{{$types->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">ปริมาณ :</div>
                                                <input name="quantity" type="text" autocomplete="current-password"
                                                    required
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{$rows->quantity}}">
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">หน่วย :</div>
                                                <input name="unit" type="text" autocomplete="current-password" required
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
                </td>
                <td class="py-4 px-6 text-right">
                    <form action="{{route('prod.delete',$rows->product_id)}}" class="nav-link dropdown" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="font-medium text-gray-500 hover:text-blue-500"
                            onclick="return confirm('คุณต้องการลบสมาชิกที่ชื่อ {{$rows->name}}หรือไม่?')">
                            ลบ</button>
                    </form>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection