@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <div class="mt-8">
                <p class="text-xl m-4">Update Absensi</p>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                         <form action="{{route('admin.update.absensi.user', $id)}}" method="post">
                            @method('PUT')
                            @csrf
                                @foreach ($absensis as $absensi)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <th scope="row text-center">
                                            <div class="text-center">
                                                 {{$absensi->user->name}}
                                            </div>
                                            <input name="id_user[]" type="hidden" value="{{$absensi->id_user}}">
                                            <input name="id_pertemuan[]" type="hidden" value="{{$absensi->id_pertemuan}}">
                                            <input type="hidden" name="id_absensi[]" value="{{$absensi->id}}">
                                        </th>
                                        <td class="px-6 py-4">
                                           <div class="flex gap-2 justify-center">
                                                <div class="flex items-center mb-4">
                                                    <input id="default-checkbox" type="checkbox" name="absen[]" {{($absensi->absensi =='hadir') ? 'checked' :''}} value="hadir" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">hadir</label>
                                                </div>
                                                <div class="flex items-center mb-4">
                                                    <input id="default-checkbox" type="checkbox" name="absen[]" {{($absensi->absensi =='absen') ? 'checked' :''}} value="absen" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">absen</label>
                                                </div>
                                                <div class="flex items-center mb-4">
                                                    <input id="default-checkbox" type="checkbox" name="absen[]" {{($absensi->absensi =='ijin') ? 'checked' :''}} value="ijin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">ijin</label>
                                                </div>
                                           </div>
                                        </td>
                                    </tr>
                                @endforeach
                         
                        </tbody>
                    </table>
                    <div class="flex justify-end">
                         <button type="submit"
                                class="text-white mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                    </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
@endsection
