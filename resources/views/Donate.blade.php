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
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ลำดับ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    วันที่บริจาค
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ผู้รับบริจาค
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    ผู้จัดส่ง
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    สถานะ
                </th>
                <td scope="row" class="py-4 px-6 font-bold text-white whitespace-nowrap dark:text-white">
                    เจ้าหน้าที่ควบคุม
                </th>
                <th scope="col" class="py-3 px-6" colspan="2">
                    <span class="sr-only"></span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donate as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$i+1}}
                </td>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{\Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($rows->created_at)->format('Y')+543}}
                </td>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$rows->recievers->name}} {{$rows->recievers->surname}}
                </td>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$rows->senders->name}} {{$rows->senders->surname}}
                </td>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$rows->status}}
                </td>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$rows->admins->name}} {{$rows->admins->surname}}
                </td>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-right">
                    <a href="{{route('mission.detail',$rows->id)}}"
                        class="font-medium text-gray-500 hover:text-blue-500">
                        ดูรายละเอียด
                    </a>
                </td>
                @if ($rows->status == "รอการตอบรับ")
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-right">
                    <a href="{{route('donate.cancle',$rows->id)}}"
                        class="bg-red-500 text-white active:bg-red-300 font-bold uppercase text-xl px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button"
                        onclick="return confirm('คุณต้องการยกเลิกภารกิจหรือไม่?')">
                        ยกเลิกภารกิจ ( เวลาผ่านไป {{ Carbon\Carbon::now()->diffInMinutes($rows->created_at)}} นาที )
                    </a>
                </td>
                @else
                <td class="py-4 px-6 text-right">
                </td>
                @endif
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
