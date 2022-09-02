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

<div class="mx-10 shadow-md rounded-md text-2xl px-6 py-3 font-bold">
    @if ($profile->profile == null)
    <img src="/storage/no_image.png" width="100px" height="100px">                 
    @else
    <img class="m-2" src="/storage/member/profile_image_assets/{{$profile->profile}}" width="300px" height="300px">
    @endif
    {{$profile->name}} {{$profile->surname}}<br>
    ที่อยู่ : 
    @if ($profile->sub_district == null)
        ไม่ระบุ                        
    @else
    เขต {{$profile->county}} ถนน {{$profile->road}} ซอย {{$profile->alley}} บ้านเลขที่ {{$profile->house_number}}
    หมู่ที่ {{$profile->group_no}} ตำบล {{$profile->sub_district}} อำเภอ {{$profile->district}} จังหวัด
    {{$profile->province}}
    ไปรษณีย์ {{$profile->ZIP_code}}
    @endif <br>

    <label
        class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button" for="edit-password" style="background-color: #2A9D8F">
        เปลี่ยนรหัสผ่าน
    </label>
    <input type="checkbox" id="edit-password" class="modal-toggle" />
    <div class="modal"> 
        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">         
            <div class="bg-indigo-500 rounded-sm font-bold text-white text-left p-3 text-3xl ">
                เปลี่ยนรหัสผ่าน
            </div>
            <div class="w-full p-5">
                <form class="mt-8 space-y-6" action="{{ route('update.mypassword',Auth::user()->member_id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field()}}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                        <div>
                            <div class="text-2xl text-left font-bold text-gray-700 m-1">รหัสผ่านเก่า :</div>
                            <input name="password" type="password" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 
                                text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
                        </div>
                        <div>
                            <div class="text-2xl text-left font-bold text-gray-700 m-1">รหัสผ่านใหม่ :</div>
                            <input name="new_password" type="password" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 
                                text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
                        </div>
                        <div>
                            <div class="text-2xl text-left font-bold text-gray-700 m-1">ยืนยันรหัสผ่าน :</div>
                            <input name="password_confirmation" type="password" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 
                                text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
                        </div>
                    </div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        </span>
                        อัพเดทรหัสผ่าน
                    </button>
                </form>
        <div class="modal-action mt-3">
            <label for="edit-password"
                class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
        
            </div>
    </div>
        </div>
    </div>
    <label
        class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="button" for="edit-profile" style="background-color: #2A9D8F">
        เปลี่ยนโปรไฟล์
    </label>
    <input type="checkbox" id="edit-profile" class="modal-toggle" />
    <div class="modal"> 
        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">         
            <div class="bg-indigo-500 rounded-sm font-bold text-white text-left p-3 text-3xl ">
                เปลี่ยนโปรไฟล์
            </div>
            <div class="w-full p-5">
                <form class="mt-8 space-y-6" action="{{ route('update.myprofile',Auth::user()->member_id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field()}}
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                        <div>
                            <div class="text-2xl text-left font-bold text-gray-700 m-1">รูปภาพโปรไฟล์ :</div>
                            <input name="profile" type="file" autocomplete="current-password" 
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 
                                text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 text-xl">
                        </div>
                    </div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        </span>
                        อัพเดทภาพโปรไฟล์
                    </button>
                </form>
        <div class="modal-action mt-3">
            <label for="edit-profile"
                class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
        
            </div>
    </div>
        </div>
    </div>
</div>
@endsection