@extends('indexAdmin')
@section('content')
    <div class="md:px-52 py-10 ">
        <div class="px-4">

            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Absensi</h5>
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">

                        <h2 class="mb-2 text-lg font-light text-gray-900 dark:text-white">Detail Abseni</h2>
                        <h2 class="mb-2 text-xl font-semibold text-gray-900 ">{{$user->name}}</h2>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-300 uppercase bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        jam
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    use Carbon\Carbon;
                                @endphp
                                @foreach($detailAbsensis as $detailAbsensi)
                                    @php
                                        $dayName = Carbon::parse($detailAbsensi->created_at)->locale('id')->isoFormat('dddd');
                                        $createdTime = \Carbon\Carbon::parse($detailAbsensi->created_at);
                                        $jam = $createdTime->format('H:i:s');
                                    @endphp
                                    <tr >
                                        <td class="px-6 py-4">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$dayName . ',' . $detailAbsensi->created_at->format('d-m-Y')}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$jam}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$detailAbsensi->absensi}}
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
