@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <div
                class="flex flex-col w-full justify-center  bg-white border border-gray-200 rounded-lg shadow md:flex-row  dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full lg:p-4  p-2 lg:container ">
                    <h5 class="mb-2 ml-2 md:text-start text-center  text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Tambah User</h5>
                    <div class="p-4">
                        <form class="lg:px-48" method="POST" action="{{$user ? route('admin.update.user' , $user->id) : route('admin.add.user')}}" >
                            @csrf
                            @if($user)
                                @method('PUT')
                            @endif
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                <input type="text" value="{{$user ? $user->name : ''}}" id="namaLengkap" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            @error('name')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" value="{{$user ? $user->email : ''}}" id="namaLengkap" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            @error('email')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="text" value="" id="namaLengkap" name="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            @error('password')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembimbing</label>
                                <input type="text" value="{{$user ? $user->ojt->pembimbing : ''}}" id="namaLengkap" name="pembimbing"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            @error('pembimbing')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal Sekolah</label>
                                <input type="text" value="{{$user ? $user->ojt->sekolah : ''}}" id="namaLengkap" name="sekolah"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            @error('sekolah')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal mulai OJT</label>
                                <input type="date" value="{{$user ? $user->ojt->mulai_ojt : ''}}" id="namaLengkap" name="mulai_ojt"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            @error('mulai_ojt')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal akhir OJT</label>
                                <input type="date" value="{{$user ? $user->ojt->akhir_ojt : ''}}" id="" name="akhir_ojt"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            @error('akhir_ojt')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                             </div>
                             <div class="lg:px-48 flex gap-2 justify-center">
                                <div>
                                    <button type="submit"
                                class="text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
                                </div>               
                                <a href="{{ url('/admin/user') }}">
                                    <button type="button"
                                        class="mx-auto text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Cancel</button>
                                </a>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
