@extends('index')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">

            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Tugas</h5>
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <div class="my-4">
                        
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                        {{-- <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Materi</h2> --}}
                        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <li class="flex items-center">
                                @foreach ($tugass as $tugas)
                                    <a href="{{ asset('storage/tugas/' . $tugas->file) }}" target="blank" class="flex flex-row items-center">
                                        <i class="fa-regular fa-note-sticky mr-2"></i>
                                        Tugas Menyelamatkan MIMI PERI
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
