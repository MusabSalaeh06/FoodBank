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
        <span>จัดการข้อมูลประเภทสินค้า</span>
    </div>
    <label
        class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button" for="add-product-type" style="background-color: #2A9D8F">
        เพิ่มข้อมูล
    </label>
    <input type="checkbox" id="add-product-type" class="modal-toggle" />
    <div class="modal"> 
        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">
                    <div class="bg-indigo-500 rounded-sm text-white p-3 text-3xl ">
                        เพิ่มข้อมูลประเภทสินค้า
                    </div>
            <div class="w-full p-5">
                    <form class="mt-8 space-y-6" action="{{ route('prod_type.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                            <div>
                                <div class="text-2xl text-gray-700 m-1">ชื่อประเภทสินค้า :</div>
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
                                <div class="text-2xl text-gray-700 m-1">รูปภาพ :</div>
                                <input name="image" type="file" 
                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                    >
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
                                <label for="add-product-type"
                                    class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($co_product_type == null)
    @else
<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ลำดับ
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only" width="20%" >รูปภาพ</span>
                </th>
                <th scope="col" class="py-3 px-6" >
                    ชื่อประเภทสินค้า
                </th>
                <th scope="col" class="py-3 px-6" width="50%">
                    คำอธิบาย
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only" width="5%">แก้ไข</span>
                </th>
                <th scope="col" class="py-3 px-6"width="5%">
                    <span class="sr-only">ลบ</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product_type as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    {{$i+1}}
                </td>
                @if ($rows->image == null)
                @else
                <td class="py-4 px-6">
                    <img class="m-2" src="/storage/product_type/product_type_image_assets/{{$rows->image}}" width="100px"
                        height="100px">
                </td>
                @endif
                <td class="py-4 px-6">
                    {{$rows->name}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->description}}
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="#" class="font-medium text-gray-500 hover:text-blue-500"> 
                        <label for="edit-product-type-{{$rows->product_type_id}}">แก้ไข</label>
                    </a>
                    <input type="checkbox" id="edit-product-type-{{$rows->product_type_id}}" class="modal-toggle" />
                    <div class="modal"> 
                        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">
                                    <div class="bg-indigo-500 rounded-sm text-white p-3 text-3xl text-left font-bold ">
                                        แก้ไขข้อมูลประเภทสินค้า
                                    </div>
                            <div class="w-full p-5">
                                    <form action="{{ route('prod_type.update',$rows->product_type_id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field()}}
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">ชื่อประเภทสินค้า :</div>
                                                <input name="name" type="text" 
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    value="{{$rows->name}}">
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">คำอธิบาย :</div>
                                                <textarea name="description" cols="30" rows="3" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                >{{$rows->description}}</textarea>
                                            </div>
                                            <div>
                                                <div class="text-2xl text-left font-bold text-gray-700 m-1">รูปภาพ :</div>
                                                <input name="image" type="file"
                                                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                    >
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                                </span>
                                                อัพเดท
                                            </button>
                                            <div class="modal-action  mt-3">
                                                <label for="edit-product-type-{{$rows->product_type_id}}"
                                                    class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </div>
                </td>
                <td class="py-4 px-6 text-right">
                    <form action="{{route('prod_type.delete',$rows->product_type_id)}}" class="nav-link dropdown" method="POST">
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
@endif
@endsection