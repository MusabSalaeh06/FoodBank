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
        <span>ภารกิจของฉัน</span>
    </div>
</div>
<div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-10">
    <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">
        <thead class="text-2xl text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    วันที่บริจาค
                </th>
                <th scope="col" class="py-3 px-6">
                    ผู้รับบริจาค
                </th>
                <th scope="col" class="py-3 px-6">
                    สถานะ
                </th>
                <th scope="col" class="py-3 px-6">
                    เจ้าหน้าที่ควบคุม
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only" >ดูรายละเอียด</span>
                </th>
                <th scope="col" class="py-3 px-6" colspan="3">
                    <span class="sr-only"></span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mission as $i=>$rows)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">
                    {{\Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}{{\Carbon\Carbon::parse($rows->created_at)->format('Y')+543}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->recievers->name}} {{$rows->recievers->surname}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->status}}
                </td>
                <td class="py-4 px-6">
                    {{$rows->admins->name}} {{$rows->admins->surname}}
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="{{route('mission.detail',$rows->id)}}" class="font-medium text-gray-500 hover:text-blue-500"> 
                       ดูรายละเอียด
                    </a>
                </td>
                    <form action="{{ route('mission.update',$rows->id)}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field()}}
                        {{ method_field('PUT') }}
                        @csrf
                        @if ($rows->status == "รอการตอบรับ")
                        <td class="py-4 px-6 text-right">
                                <div>
                                    <button name="status" type="submit" value="ตอบรับ"
                                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        ตอบรับ
                                    </button>
                                </div>
                        </td>
                        <td class="py-4 px-6 text-right">
                                <div>
                                    <button name="status" type="submit" value="ปฏิเสธ"
                                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        ปฏิเสธ
                                    </button>
                                </div>
                        </td>
                        @elseif ($rows->status == "ยกเลิกภารกิจ")     
                        <td></td><td></td><td></td>
                        @elseif ($rows->status == "ตอบรับ")
                        <td class="py-4 px-6 text-right">
                            <div>
                                <input type="file" name="image"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            </div>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div>
                                <button name="status" type="submit" value="ส่งสำเร็จ"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    ส่งสำเร็จ
                                </button>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div>
                                <button name="status" type="submit" value="ส่งคืนสินค้า"
                                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-xl font-medium rounded-md text-white bg-red-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    ส่งคืนสินค้า
                                </button>
                            </div>
                        </td>
                        @elseif ($rows->status == "ปฏิเสธ")       
                        <td></td><td></td><td></td>
                        @elseif ($rows->status == "ส่งสำเร็จ")      
                        <td></td><td></td><td></td>
                        @elseif ($rows->status == "ส่งคืนสินค้า")      
                        <td></td><td></td><td></td>
                        @else
                            
                        @endif
                    </form>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection