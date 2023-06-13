@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">

            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Absensi</h5>
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <div class="my-4">
                        <a href="{{ url('/admin/absensi/tambah-absensi') }}">
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                                Absensi</button>
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">

                        <h2 class="mb-2 text-lg font-light text-gray-900 dark:text-white">Judul Absensi</h2>
                        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <li class="flex items-center">
                                <a href="{{ url('/admin/absensi/daftar-absensi/2') }}" class="flex flex-row items-center">
                                    <i class="fa-regular fa-note-sticky mr-2"></i>
                                    Pertemuan 1
                                </a>
                            </li>
                            <li class="flex items-center">
                                <a href="{{ url('/admin/absensi/daftar-absensi/2') }}" class="flex flex-row items-center">
                                    <i class="fa-regular fa-note-sticky mr-2"></i>
                                    Pertemuan 2
                                </a>
                            </li>
                            <li class="flex items-center">
                                <a href="{{ url('/admin/absensi/daftar-absensi/2') }}" class="flex flex-row items-center">
                                    <i class="fa-regular fa-note-sticky mr-2"></i>
                                    Pertemuan 3
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
