@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">

            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Absensi</h5>
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <div class="my-4">
{{--                        <a href="{{ route('admin.view.add.absensi') }}">--}}
{{--                            <button type="button"--}}
{{--                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah--}}
{{--                                Absensi</button>--}}
{{--                        </a>--}}
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">

                        <h2 class="mb-2 text-lg font-light text-gray-900 dark:text-white">Daftar Absensi Mahasiswa</h2>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-300 uppercase bg-gray-700" >
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Mahasiswa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Kehadiran
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Detail
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($absensis as $absensi)
                                    <tr >
                                        <td class="px-6 py-4">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$absensi->name}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$absensi->absensi->count()}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.absensi.detail', ['user' => $absensi->id])}}">
                                                <button type="button"
                                                        class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 mr-2 mb-2  focus:outline-none dark:focus:ring-blue-800">
                                                    Detail</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
