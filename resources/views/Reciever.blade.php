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
    class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 
    rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
    <div class="flex items-center">
        <span>จัดการข้อมูลผู้รับบริจาค</span>
    </div>
    <label
        class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button" for="add-reciever" style="background-color: #2A9D8F">
        เพิ่มข้อมูล
    </label>
    <input type="checkbox" id="add-reciever" class="modal-toggle" />
    <div class="modal">
        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">
            <div class="bg-indigo-500 rounded-sm text-white p-3 text-3xl ">
                เพิ่มข้อมูลผู้รับบริจาค
            </div>
            <div class="w-full p-5">
                <form class="mt-8 space-y-6" action="{{ route('member.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                        <div>
                            <div class="text-2xl text-gray-700 m-1">ชื่อ <div class="inline text-red-500"> * </div> : </div>
                            <input name="name" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">นามสกุล <div class="inline text-red-500"> * </div> : </div>
                            <input name="surname" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                บัตรประจำตัวประชาชน <div class="inline text-red-500"> * </div> : </div>
                            <input name="card_id" type="text" placeholder="..." 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">เบอร์โทรศัพท์ <div class="inline text-red-500"> * </div> : </div>
                            <input name="tel" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">อีเมล :</div>
                            <input name="email" type="email" autocomplete="email" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <input name="type" type="hidden" autocomplete="current-password" 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                            value="reciever">
                        <div>
                            <div class="text-2xl text-gray-700 m-1">เขต :</div>
                            <input name="county" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">ถนน :</div>
                            <input name="road" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">ซอย :</div>
                            <input name="alley" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">บ้านเลขที่ :</div>
                            <input name="house_number" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">หมู่ที่ :</div>
                            <input name="group_no" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">ตำบล :</div>
                            <input name="sub_district" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">อำเภอ :</div>
                            <input name="district" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">จังหวัด :</div>
                            <input name="province" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
                        </div>
                        <div>
                            <div class="text-2xl text-gray-700 m-1">รหัสไปรษณีย์ :</div>
                            <input name="ZIP_code" type="text" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                placeholder="...">
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
                            <label for="add-reciever"
                                class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@if ($co_reciever == null)
@else
<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400" style="background-color: #E9C46A">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ลำดับ
                </th>
                <th scope="col" class="py-3 px-6">
                    ชื่อ-นามสกุล
                </th>
                <th scope="col" class="py-3 px-6">
                    เบอร์โทรศัพท์
                </th>
                <th scope="col" class="py-3 px-6">
                    บทบาท
                </th>
                <th scope="col" class="py-3 px-6">
                    ที่อยู่
                </th>
                <th scope="col" class="py-3 px-6">
                    อีเมล
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
            @foreach ($reciever as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    {{$i+1}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->name}} {{$rows->surname}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->tel}}
                </td>
                <td class="py-4 px-6">
                    @if ( $rows->type == "giver")
                    ผู้บริจาค
                    @elseif ( $rows->type == "reciever")
                    ผู้รับบริจาค
                    @elseif ( $rows->type == "sender")
                    ผู้จัดส่ง
                    @else
                    อื่นๆ
                    @endif
                </td>
                <td class="py-4 px-6">
                    @if ($rows->sub_district == null)
                        ไม่ระบุ                        
                    @else
                    เขต {{$rows->county}} ถนน {{$rows->road}} ซอย {{$rows->alley}} บ้านเลขที่ {{$rows->house_number}}
                    หมู่ที่ {{$rows->group_no}} ตำบล {{$rows->sub_district}} อำเภอ {{$rows->district}} จังหวัด
                    {{$rows->province}}
                    ไปรษณีย์ {{$rows->ZIP_code}}
                    @endif
                </td>
                <td class="py-4 px-6">
                    @if ($rows->email == null)   
                    ไม่ระบุ                 
                    @else
                    {{$rows->email}}    
                    @endif
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="#" class="font-medium text-gray-500 hover:text-blue-500"> <label
                            for="edit-reciever-{{$rows->member_id}}">แก้ไข</label></a>
                    <input type="checkbox" id="edit-reciever-{{$rows->member_id}}" class="modal-toggle" />
                    <div class="modal">
                        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">
                            <div
                                class="bg-indigo-500 rounded-sm text-white p-3 text-3xl font-bold text-white text-left ">
                                แก้ไขข้อมูลผู้รับบริจาค
                            </div>
                            <div class="w-full p-5">
                                <form class="mt-8 space-y-6" action="{{ route('member.update',$rows->member_id)}}"
                                    method="POST" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                                        {{-- --}}
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">ชื่อ <div class="inline text-red-500"> * </div> : </div>
                                            <input name="name" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->name}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                นามสกุล <div class="inline text-red-500"> * </div> : </div>
                                            <input name="surname" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->surname}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                บัตรประจำตัวประชาชน <div class="inline text-red-500"> * </div> : </div>
                                            <input name="card_id" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->card_id ??null}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                เบอร์โทรศัพท์ <div class="inline text-red-500"> * </div> : </div>
                                            <input name="tel" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->tel}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">อีเมล 
                                                :</div>
                                            <input name="email" type="email" autocomplete="email" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->email}}">
                                        </div>
                                        <input name="type" type="hidden" 
                                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                            value="{{$rows->type}}">
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">เขต :
                                            </div>
                                            <input name="county" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->county}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">ถนน :
                                            </div>
                                            <input name="road" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->road}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">ซอย :
                                            </div>
                                            <input name="alley" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->alley}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                บ้านเลขที่ :</div>
                                            <input name="house_number" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->house_number}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                หมู่ที่ :</div>
                                            <input name="group_no" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->group_no}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">ตำบล
                                                :</div>
                                            <input name="sub_district" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->sub_district}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">อำเภอ
                                                :</div>
                                            <input name="district" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->district}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                จังหวัด :</div>
                                            <input name="province" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->province}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                รหัสไปรษณีย์ :</div>
                                            <input name="ZIP_code" type="text" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->ZIP_code}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                รหัสผ่าน * :</div>
                                            <input name="password" type="password" autocomplete="current-password"
                                                
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->pass}}">
                                        </div>
                                        <div>
                                            <div class="text-2xl text-gray-700 m-1 font-bold text-white text-left">
                                                ยืนยันรหัสผ่าน * :</div>
                                            <input name="password_confirmation" type="password"
                                                autocomplete="current-password" 
                                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl"
                                                value="{{$rows->pass}}">
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

                                <div class="modal-action">
                                    <label for="edit-reciever-{{$rows->member_id}}"
                                        class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="py-4 px-6 text-right">
                    <form action="{{route('member.delete',$rows->member_id)}}" class="nav-link dropdown" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="font-medium text-gray-500 hover:text-blue-500"
                            onclick="return confirm('คุณต้องการลบสมาชิกที่ชื่อ {{$rows->name}} {{$rows->surname}} หรือไม่?')">
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