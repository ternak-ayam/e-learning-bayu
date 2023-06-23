@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow md:flex-row  dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Tambah User</h5>
                    <div class="p-4">
                        <form method="POST" action="{{route('admin.add.user')}}" >
                            @csrf
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                <input type="text" value="" id="namaLengkap" name="name"
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
                                <input type="email" value="" id="namaLengkap" name="email"
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
                                <input type="text" value="password" id="namaLengkap" name="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                            @error('password')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                          
                            <button type="submit"
                                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
