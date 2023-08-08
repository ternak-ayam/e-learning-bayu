@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <div class="flex justify-between sm:flex-col flex-row">
                <p class="text-2xl font-semibold">Dashboard Admin</p>
            </div>
            <div class="w-full">
                <div
                    class="mt-10 block max-w-full p-6 bg-gray-700 border border-gray-200 rounded-lg shadow">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Selamat Datang <span>{{Auth::guard('admin')->user()->name}}</span>
                    </h5>
                </div>
            </div>


            <div class="flex flex-col md:flex-row gap-16 justify-center mt-4 text-center">
                <div
                    class="w-full p-6 bg-gray-700 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="mb-4">
                        <i class="fa-solid fa-users fa-xl text-white"></i>
                    </div>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-white">Jumlah Mahasiswa</h5>
                    </a>
                    <p class="mb-3 font-normal text-3xl text-white">{{$mahasiswas->count()}}</p>
                </div>
            </div>
            <div class="mt-8">
<p class="text-xl m-4">Daftar User</p>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-400 uppercase bg-gray-700 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Asal Sekolah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pembimbing
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                @foreach($mahasiswas as $mahasiswa)
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">{{$mahasiswa->name}}</div>
                                            <div class="font-normal text-gray-500">{{$mahasiswa->email}}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$mahasiswa->ojt->sekolah ?? null}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$mahasiswa->ojt->pembimbing ?? null}}
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>


        </div>
    </div>
@endsection
