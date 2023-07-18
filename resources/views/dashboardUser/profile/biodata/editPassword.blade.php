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
                            {{$user->name}}</h5>
                        <h5
                            class="mb-2 w-full text-center text-md font-semibold tracking-tight text-gray-900 dark:text-white pb-4 border-solid border-b-2 border-black">
                             {{ $age ? $age : '-'}} Tahun</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Alamat Email</p>
                        <h5 class="mb-10 text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                           {{$user->email}}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Telepon</p>
                        <h5 class="mb-10 text-md font-semibold tracking-tight text-gray-900 dark:text-white"> {{$user->phone ? '0' . $user->phone : '-'}}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Alamat</p>
                        <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                           {{$user->alamat ? $user->alamat : '-'}}
                        </h5>
                    </div>
                </div>
                <div class="w-full p-4">
                    <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Edit Password</h5>
                    <div class="p-4">
                        <form method="POST" action="{{route('user.update.password', ['user' => Auth::user()->id])}}">
                            @csrf
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Lama</label>
                                <input type="password" id="namaLengkap" name="current_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="*******" required>
                            </div>
                            <div class="mb-6">
                                <label for="tempatLahir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                                <input type="password" id="tempatLahir" name="new_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="*******" required>
                            </div>
                            <div class="mb-6">
                                <label for="tanggalLahir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                                <input type="password" id="tanggalLahir" name="new_password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="*******" required>
                            </div>
                            <button type="submit"
                                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Update
                                Password</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
