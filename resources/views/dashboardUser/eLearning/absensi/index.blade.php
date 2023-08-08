@extends('index')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">

            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Absensi</h5>
            <div
                class="flex w-full justify-center  border border-gray-200 rounded-lg shadow bg-white p-10">
                @if($status)
                    <div class="w-auto m-4  py-10 m-auto">
                        {{--                    <a href="{{ route('user.elearning.absensi.cetak')}}" class=" ml-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download Absensi PDF</a>--}}
                        <a href="{{ route('user.elearning.absensi.add')}}" class=" ml-5 text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Absen Hari ini</a>
                    </div>
                @else
                    <div class="p-4 mb-4  text-sm text-green-800 rounded-lg bg-green-100 " role="alert">
                        <span class="font-medium">Absensi berhasil ,</span> anda telah melakukan absensi hari ini
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
