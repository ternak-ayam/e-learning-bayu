@extends('index')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="md:px-52 py-10 ">
        <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Detail Tugas</h5>
        <div class="px-4">
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 py-10">
                <h5 class="mb-2 ml-4 md:text-start text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                    Keterangan</h5>
                <div class="ml-10 my-2 ">
                    <ul class="list-disc ">
                        <li>{{$tugas->deskripsi}}</li>
                    </ul>
                </div>
                <h5 class="mb-2 ml-4 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Link Tugas
                </h5>
                <div class="flex flex-row w-full">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4">
                        <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 bg-white dark:bg-white-800">Link Tugas</th>
                                <td class="px-6 py-3 bg-gray-100 dark:bg-white-800"><a target="blank"
                                        href="{{ asset('storage/tugas/' . $tugas->file) }}">{{$tugas->judul}}</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                 <div class="flex flex-row w-full">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4">
                            <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3 bg-white dark:bg-white-800">Submitted Status</th>
                                    <td class="px-6 py-3 {{$upload_tugas ? 'bg-green-100' : 'bg-red-100'}} dark:bg-white-800">SUBMITTED FOR GRADING</td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 bg-white dark:bg-white-800"> Time Submitted</th>
                                    <td class="px-6 py-3 bg-gray-100 dark:bg-white-800">{{$upload_tugas ? $upload_tugas->created_at : '-'}}</td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 bg-white dark:bg-white-800">File Submission</th>
                                    <td class="px-6 py-3 bg-gray-100 dark:bg-white-800">{{$upload_tugas ? $upload_tugas->file : '-'}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <h5 class="mb-2 ml-4 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Upload
                    Upload Tugas</h5>

                <div class="p-4">
                    <form action="{{$upload_tugas ? route('user.tugas.update', $upload_tugas->id) : route('user.tugas.upload', ['id' => $tugas->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                         @if($upload_tugas)
                        @method('PUT')
                      @endif
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click
                                            to
                                            upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)
                                    </p>
                                </div>
                                <label for="dropzone-file"
                                    class="btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800    ">Choose
                                    File</label>
                                <div id="name"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                </div>
                                <input id="dropzone-file" type="file" name="file" class="hidden">
                            </label>
                        </div>
                         @error('file')
                                <span class="text-red-700 text-sm" style="color:red">
                                    {{ $message }}
                                </span>
                            @enderror
                        <div class="flex m-4 justify-center items-center gap-4">
                            <a >
                                <button type="submit"
                                    class="mx-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">{{$upload_tugas ? 'update' : 'save'}}</button>
                            </a>
                            <a href="{{ url('/elearning/tugas') }}">
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
        $("#dropzone-file").change(function() {
            filename = this.files[0].name;
            $('#name').html(filename);
            console.log(filename);
        });
    </script>
@endsection
