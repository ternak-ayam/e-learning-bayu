@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Daftar peserta  Quis {{$quis->deskripsi}}</h5>
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Daftar Quis</h2>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Mahasiswa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Bukti Quis
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesertas as $peserta)
                                    <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$loop->iteration}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$peserta->user->name}}
                                    </th>
                                     <td class="px-6 py-4 flex gap-2 flex-wrap">
                                        <a href="{{asset('storage/materi/' .  $peserta->bukti)}}" target="blank"  class="p-2 rounded bg-blue-400"><i class="fas fa-eye text-white"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex w-full mt-2 justify-end">
                            {{$pesertas->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
