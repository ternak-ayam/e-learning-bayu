@extends('indexAdmin')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="md:px-52 py-10 ">
    <h5 class="mb-2 ml-2 md:text-start text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
        Nilai Laporan {{$laporan->user->name . ' ' . '(' . $laporan->judul . ')'}} </h5>
    <div class="px-4">
        <div
            class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="p-4">
                <form class="lg:px-48 p-1" action="{{route('admin.daftar.laporan.nilai.save')}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$laporan->id}}" name="id">
                    <div class="pb-2">
                        <label for="nilai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai</label>
                        <input type="number" min="1" max="100" value="{{$nilai ? $nilai->nilai : ''}}" name="nilai" id="nilai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nilai" required="">
                    </div>
                    @error('nilai')
                    <span class="text-red-700 text-sm" style="color:red">
                        {{ $message }}
                    </span>
                    @enderror
                    <div class="flex m-4 justify-center items-center gap-4">
                        <a >
                            <button type="submit"
                                class="mx-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Simpan</button>
                        </a>
                        <a href="{{ url('/admin/daftar/laporan') }}">
                            <button type="button"
                                class="mx-auto text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("#dropzone-file").change(function () {
        filename = this.files[0].name;
        $('#name').html(filename);
        console.log(filename);
    });

</script>
@endsection
