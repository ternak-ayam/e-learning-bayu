@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">

            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Tugas</h5>
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">

                        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Daftar Tugas</h2>
                        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            @foreach ($tugass as $tugas)
                                <li class="flex items-center">
                                    <a href="{{asset('storage/tugas/' . $tugas->file)}}" target="blank" class="flex flex-row items-center ml-2">
                                        <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $tugas->deskripsi }}
                                    </a>
                                </li>
                                <div class="flex gap-4">
                                     <a class="text-green-500" href="{{route('admin.view.add.tugas', ['id' => $tugas->id])}}">Edit</a>
                                     <a class="text-red-500" href="{{route('admin.delete.tugas' ,['id' => $tugas->id])}}">Hapus</a>
                                </div>
                            @endforeach
                            
                        <a href="{{ route('admin.view.add.tugas') }}">
                            <button
                                class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fa-solid fa-folder mr-2"></i>Upload
                                Tugas</button>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
