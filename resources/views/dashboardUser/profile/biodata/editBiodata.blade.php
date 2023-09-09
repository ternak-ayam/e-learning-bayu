@extends('index')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow md:flex-row  dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="">
                    <div class="flex flex-col p-10">
                        <div class="w-48 h-48 mx-auto rounded-full overflow-hidden ">
                             <img src="{{$user->image ? asset('storage/materi/' . $user->image) : asset('/img/users.png') }}" class="w-48  mx-auto bordered rounded-full" alt="">
                        </div>
                        <h5 class="mb-2 mt-2  text-center text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                           {{$user->name}}</h5>
                        <h5
                            class="mb-2 w-full text-center text-md font-semibold tracking-tight text-gray-900 dark:text-white pb-4 border-solid border-b-2 border-black">
                            {{ $age ? $age : '-'}} Tahun</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Alamat Email</p>
                        <h5 class="mb-10 text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                             {{$user->email}}</h5>
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Telepon</p>
                        <h5 class="mb-10 text-md font-semibold tracking-tight text-gray-900 dark:text-white"> {{$user->phone ? '0' . $user->phone : '-'}}</h5>
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Alamat</p>
                        <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">{{$user->alamat ? $user->alamat : '-'}}
                        </h5>
                    </div>
                </div>
                <div class="w-full p-4">
                    <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Edit Biodata</h5>
                    <div class="p-4">
                        <form method="POST" action="{{route('update.biodata', ['id' => $user->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-6">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                <input type="text" value="{{$user->name}}" id="namaLengkap" name="namaLengkap"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Bryan Widodo" required>
                            @error('namaLengkap')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                            <div class="mb-6">
                                <label for="tempatLahir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                <input type="text" id="tempatLahir" value="{{$user->tempat_lahir}}" name="tempatLahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Amsterdam" required>
                                 @error('tempatLahir')
                                    <span class="text-red-700 text-sm" style="color:red">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="tanggalLahir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                <input type="date" id="tanggalLahir" value="{{Carbon\Carbon::parse($user->tanggal_lahir)->format('Y-m-d')}}" name="tanggalLahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com" required>
                                @error('tanggalLahir')
                                    <span class="text-red-700 text-sm" style="color:red">
                                        {{ $message }}
                                    </span>
                                 @enderror
                            </div>
                            <div class="mb-6">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    email</label>
                                <input type="email" id="email" value="{{$user->email}}" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@flowbite.com" required>
                                 @error('email')
                                    <span class="text-red-700 text-sm" style="color:red">
                                        {{ $message }}
                                    </span>
                                 @enderror
                            </div>
                            <div class="mb-6">
                                <label for="noTelepon"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                                <input type="number" value="{{$user->phone}}" id="noTelepon" name="noTelepon"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="0865161651">
                                @error('noTelepon')
                                    <span class="text-red-700 text-sm" style="color:red">
                                        {{ $message }}
                                    </span>
                                 @enderror
                            </div>
                            <div class="mb-6">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea type="text"  id="alamat" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required> {{$user->alamat}}</textarea>
                                 @error('alamat')
                                    <span class="text-red-700 text-sm" style="color:red">
                                        {{ $message }}
                                    </span>
                                 @enderror
                            </div>
                            <div class="mb-6">
                                <label for="foto"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                                <input type="file"  id="noTelepon" name="foto"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="0865161651">
                            </div>
                             @error('foto')
                                    <span class="text-red-700 text-sm" style="color:red">
                                        {{ $message }}
                                    </span>
                            @enderror
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Update Biodata</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
