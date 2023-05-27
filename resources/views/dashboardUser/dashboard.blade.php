@extends('index')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <div class="flex justify-between sm:flex-col flex-row">
                <p class="text-2xl font-semibold">Dashboard</p>
                <form class="flex items-center ">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="voice-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search" required>
                    </div>
                </form>
            </div>
            <div class="w-full">
                <div 
                    class="mt-10 block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Selamat daatang Budi
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">E-Leraning AirNav Denpasar merupakan sebuah
                        sistem informasi untuk mendukung proses
                        belajar mahasiswa kerja praktek.</p>
                    </div>
            </div>


            <div class="flex flex-col md:flex-row gap-16 justify-center mt-4 text-center">

                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="mb-4">
                        <i class="fa-solid fa-users fa-xl"></i>
                    </div>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Mahasiswa</h5>
                    </a>
                    <p class="mb-3 font-normal text-3xl text-gray-500 dark:text-gray-400">30</p>
                </div>
                <div
                    class=" w-full bg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="mb-4">
                        <i class="fa-solid fa-book fa-xl"></i>
                    </div>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Materi</h5>
                    </a>
                    <p class="mb-3 font-normal text-3xl text-gray-500 dark:text-gray-400">12</p>
                </div>
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="mb-4">
                        <i class="fa-solid fa-pen-to-square fa-xl"></i>
                    </div>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Quiz</h5>
                    </a>
                    <p class="mb-3 font-normal text-3xl text-gray-500 dark:text-gray-400">5</p>
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
                                    <p class="mb-3 font-normal text-xl  text-gray-500 dark:text-gray-400">Penjelasan DVOR
                                    </p>
                                </a>

                            </div>
                            <a href="">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat</button>
                            </a>
                        </div>
                    </div>
                    <div
                        class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Quiz</h5>
                        <hr class="mb-4">
                        <div class="flex flex-row justify-between">
                            <div class="flex gap-4">
                                <div class="justify-center ">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </div>
                                <a href="#">
                                    <p class="mb-3 font-normal text-xl text-gray-500 dark:text-gray-400">Quiz 1 DVOR</p>
                                </a>

                            </div>
                            <a href="">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat</button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
