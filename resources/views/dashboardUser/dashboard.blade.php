@extends('index')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <div class="flex justify-between sm:flex-col flex-row">
                <p class="text-2xl font-semibold">Dashboard , Selamat datang {{Auth::user()->name}}</p>
            </div>

            <div class="flex flex-col md:flex-row gap-16 justify-center mt-4 text-center">
                <div
                    class="w-full p-6 bg-gray-700 text-white border border-gray-200 rounded-lg shadow ">
                    <div class="mb-4">
                        <i class="fa-solid fa-users fa-xl"></i>
                    </div>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight">Mahasiswa</h5>
                    </a>
                    <p class="mb-3 font-normal text-3xl  dark:text-gray-400">{{$user}}</p>
                </div>
                <div
                    class=" w-full bg p-6  border border-gray-200 rounded-lg shadow bg-gray-700 text-white">
                    <div class="mb-4">
                        <i class="fa-solid fa-book fa-xl"></i>
                    </div>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight">Materi</h5>
                    </a>
                    <p class="mb-3 font-normal text-3xl">{{$materi}}</p>
                </div>
                <div
                    class="w-full p-6  border border-gray-200 rounded-lg shadow bg-gray-700 text-white">
                    <div class="mb-4">
                        <i class="fa-solid fa-pen-to-square fa-xl"></i>
                    </div>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight ">Tugas</h5>
                    </a>
                    <p class="mb-3 font-normal text-3xl ">{{$tugas}}</p>
                </div>

            </div>
            <div class="mt-8">
                <p class="text-xl font-semibold">New</p>
                <div class="flex flex-col md:flex-row gap-16 justify-center mt-4 text-start">
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Materi
                        </h5>
                        <hr class="mb-4">
                        <div class="flex flex-row justify-between">
                            <div class="flex gap-4 items-baseline">
                                <div class="justify-center ">
                                    <i class="fa-solid fa-file-pdf fa-xl"></i>
                                </div>
                                <a href="#">
                                    <p class="mb-3 font-normal text-xl  text-gray-500 dark:text-gray-400">{{$latest_materi ? $latest_materi->deskripsi : 'belum ada materi'}}
                                    </p>
                                </a>

                            </div>
                            @if ($latest_materi)
                                <a href="{{$latest_materi ? asset('storage/materi/' . $latest_materi->file) : '#'}}" target="blank">
                                    <button type="submit"
                                        class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat</button>
                                </a>
                            @endif

                        </div>
                    </div>
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Tugas</h5>
                        <hr class="mb-4">
                        <div class="flex flex-row justify-between">
                            <div class="flex gap-4">
                                <div class="justify-center ">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </div>
                                <a href="#">
                                    <p class="mb-3 font-normal text-xl text-gray-500 dark:text-gray-400">{{$latest_tugas ? $latest_tugas->deskripsi : 'belum ada tugas'}}</p>
                                </a>

                            </div>
                            @if ($latest_tugas)
                                <a href="{{$latest_tugas ?  asset('storage/tugas/' . $latest_tugas->file) : '#'}}" target="blank">
                                    <button type="submit"
                                        class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
