@extends('index')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">

            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow md:flex-row  dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="">
                    <div class="flex flex-col p-10">
                        <img src="{{$user->image ? asset('storage/materi/' . $user->image) : asset('/img/users.png') }}" class="w-48 mx-auto bordered rounded-full" alt="">
                        <h5 class="mb-2 mt-2  text-center text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                            </h5>
                        <h5
                            class="mb-2 w-full text-center text-md font-semibold tracking-tight text-gray-900 dark:text-white pb-4 border-solid border-b-2 border-black">
                            87 Tahun</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Alamat Email</p>
                        <h5 class="mb-10 text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{$user->email}}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Telepon</p>
                        <h5 class="mb-10 text-md font-semibold tracking-tight text-gray-900 dark:text-white">   {{'0' . $user->phone ? $user->phone : '-'}}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Alamat</p>
                        <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">   {{$user->alamat ? $user->alamat : '-'}}
                        </h5>
                    </div>
                </div>
                <div class="w-full p-4">
                    <div class="flex flex-col items-start justify-start   p-4 leading-normal">
                        <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Biodata</h5>

                        <div class="flex flex-col md:flex-row w-full justify-center gap-12 p-4">

                            <div class="flex w-full flex-col justify-start items-start">
                                <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">Nama Lengkap
                                </h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400">{{$user->name}}</p>
                            </div>
                            <div class="flex w-full flex-col justify-start items-start">
                                <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">Tanggal Lahir
                                </h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400">{{$user->tgl_lahir ? $user->tgl_lahir : '-'}}</p>
                            </div>
                        </div>
                        <div
                            class="flex border-solid border-b-2 border-gray-200 flex-col md:flex-row w-full justify-center gap-12 p-4">

                            <div class="flex w-full flex-col justify-start items-start">
                                <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">Alamat
                                </h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400">{{$user->alamat ? $user->alamat : '-'}}
                            </div>
                            <div class="flex w-full flex-col justify-start items-start">
                                <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">Kota
                                </h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400">{{$user->tempat_lahir ? $user->tempat_lahir : '-' }}</p>
                            </div>
                        </div>
                        <div class="flex mb-10 flex-col md:flex-row w-full justify-center gap-12 p-4">

                            <div class="flex w-full flex-col justify-start items-start">
                                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    Pembimbing
                                </h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400">Denny Rahmad A
                            </div>
                        </div>
                        <div class="flex">
                            <div class="">
                                <a href="{{route('edit.biodata', ['id' => $user->id]) }}">
                                    <button type="button"
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"><i
                                            class="fa-regular fa-address-card mr-2"></i> Ubah Biodata</button>
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ route('user.edit.password',['user' => $user->id]) }}">
                                    <button type="button"
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"><i
                                            class="fa-solid fa-lock mr-2"></i>Ubah Password</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
