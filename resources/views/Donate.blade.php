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

<div class="flex mx-10 mb-3 items-center justify-between p-3 mb-3 text-2xl font-semibold text-white bg-gray-400 rounded-lg 
    shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #F4A261">
    <div class="flex items-center">
        <span>จัดการข้อมูลการบริจาค</span>
    </div>
</div>
@if ($co_donate == null)
@else
<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400"
            style="background-color: #E9C46A">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ลำดับ
                </th>
                <th scope="col" class="py-3 px-6">
                    วันที่บริจาค
                </th>
                <th scope="col" class="py-3 px-6">
                    ผู้รับบริจาค
                </th>
                <th scope="col" class="py-3 px-6">
                    ผู้จัดส่ง
                </th>
                <th scope="col" class="py-3 px-6">
                    สถานะ
                </th>
                <th scope="col" class="py-3 px-6">
                    เจ้าหน้าที่ควบคุม
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only" width="5%">ดูรายละเอียด</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only" width="5%">แก้ไข</span>
                </th>
                {{----}}
                <th scope="col" class="py-3 px-6" width="5%">
                    <span class="sr-only">ลบ</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donate as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    {{$i+1}}
                </td>
                <td class="py-4 px-6">
                    {{\Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($rows->created_at)->format('Y')+543}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->recievers->name}} {{$rows->recievers->surname}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->senders->name}} {{$rows->senders->surname}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->status}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->admins->name}} {{$rows->admins->surname}}
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="{{route('mission.detail',$rows->id)}}"
                        class="font-medium text-gray-500 hover:text-blue-500">
                        ดูรายละเอียด
                    </a>
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="#" class="font-medium text-gray-500 hover:text-blue-500"> <label
                            for="edit-donate-{{$rows->id}}">แก้ไข</label></a>
                    <input type="checkbox" id="edit-donate-{{$rows->id}}" class="modal-toggle" />
                    <div class="modal">
                        <div class="w-screen mx-32 bg-white rounded-lg shadow-md">
                            <div class="bg-indigo-500 rounded-sm font-bold text-white text-left p-3 text-3xl ">
                                แก้ไขข้อมูลการบริจาค
                            </div>
                            <div class="w-full p-5">
                                <form action="{{ route('donate.update',$rows->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                                        <div>
                                            <div class="text-2xl text-left font-bold text-gray-700 m-1">
                                                เลือกรายชื่อผู้จัดส่ง :
                                            </div>

                                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                                                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                                
                                                <select class="w-full js-example-basic-single" id="Sender" name="sender">
                                                    <option value="{{$rows->senders->member_id}}">{{$rows->senders->name}}
                                                        {{$rows->senders->surname}} || สถานะ : {{$rows->senders->status}} || <br>
                                                        ที่อยู่ :
                                                        @if ($rows->senders->sub_district == null)
                                                            ไม่ระบุ                        
                                                        @else
                                                        เขต {{$rows->senders->county}} ถนน {{$rows->senders->road}} ซอย
                                                        {{$rows->senders->alley}} บ้านเลขที่ {{$rows->senders->house_number}}
                                                        หมู่ที่ {{$rows->senders->group_no}} ตำบล {{$rows->senders->sub_district}}
                                                        อำเภอ {{$rows->senders->district}} จังหวัด
                                                        {{$rows->senders->province}}
                                                        ไปรษณีย์ {{$rows->senders->ZIP_code}}
                                                        @endif
                                                    </option>
                                                    @foreach ($sender as $i=>$senders)
                                                    <option value="{{$senders->member_id}}">{{$senders->name}}
                                                        {{$senders->surname}} || สถานะ : {{$senders->status}} || <br>
                                                        ที่อยู่ :
                                                        @if ($senders->sub_district == null)
                                                            ไม่ระบุ                        
                                                        @else
                                                        เขต {{$senders->county}} ถนน {{$senders->road}} ซอย
                                                        {{$senders->alley}} บ้านเลขที่ {{$senders->house_number}}
                                                        หมู่ที่ {{$senders->group_no}} ตำบล {{$senders->sub_district}}
                                                        อำเภอ {{$senders->district}} จังหวัด
                                                        {{$senders->province}}
                                                        ไปรษณีย์ {{$senders->ZIP_code}}
                                                        @endif
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="text-2xl text-left font-bold text-gray-700 m-1">
                                                เลือกรายชื่อผู้รับ :
                                            </div>

                                            
                                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                                                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                                    
                                                    <select class="w-full js-example-basic-single" id="Reciever" name="reciever">
                                                    <option value="{{$rows->recievers->member_id}}">{{$rows->recievers->name}}
                                                        {{$rows->recievers->surname}} || สถานะ : {{$rows->recievers->status}} || <br>
                                                        ที่อยู่ :
                                                        @if ($rows->recievers->sub_district == null)
                                                            ไม่ระบุ                        
                                                        @else
                                                        เขต {{$rows->recievers->county}} ถนน {{$rows->recievers->road}} ซอย
                                                        {{$rows->recievers->alley}} บ้านเลขที่ {{$rows->recievers->house_number}}
                                                        หมู่ที่ {{$rows->recievers->group_no}} ตำบล {{$rows->recievers->sub_district}}
                                                        อำเภอ {{$rows->recievers->district}} จังหวัด
                                                        {{$rows->recievers->province}}
                                                        ไปรษณีย์ {{$rows->recievers->ZIP_code}}
                                                        @endif
                                                    </option>
                                                    @foreach ($reciever as $i=>$recievers)
                                                    <option value="{{$recievers->member_id}}">{{$recievers->name}}
                                                        {{$recievers->surname}} || <br>
                                                        ที่อยู่ :
                                                        @if ($recievers->sub_district == null)
                                                            ไม่ระบุ                        
                                                        @else
                                                        เขต {{$recievers->county}} ถนน {{$recievers->road}} ซอย
                                                        {{$recievers->alley}} บ้านเลขที่ {{$recievers->house_number}}
                                                        หมู่ที่ {{$recievers->group_no}} ตำบล
                                                        {{$recievers->sub_district}} อำเภอ {{$recievers->district}}
                                                        จังหวัด
                                                        {{$recievers->province}} ไปรษณีย์ {{$recievers->ZIP_code}}
                                                        @endif
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-2xl text-left font-bold text-gray-700 m-1">อัปเดทภารกิจ :
                                            </div>
                                            <select name="status" type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="{{$rows->status ??null}}">{{$rows->status ??null}}
                                                </option>
                                                <option value="รอการตอบรับ">รอการตอบรับ</option>
                                                <option value="ยกเลิกภารกิจ">ยกเลิกภารกิจ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="group  w-full flex justify-center py-2 px-4 border border-transparent text-2xl font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            </span>
                                            อัพเดท
                                        </button>
                                        <div class="modal-action mt-3">
                                            <label for="edit-donate-{{$rows->id}}"
                                                class="bg-red-500 text-white active:bg-pink-500 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">ปิด</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="py-4 px-6 text-right">
                    <form action="{{route('donate.delete',$rows->id)}}" class="nav-link dropdown" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="font-medium text-gray-500 hover:text-blue-500"
                            onclick="return confirm('คุณต้องการลบการบริจาคหรือไม่?')">
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

