@extends('indexAdmin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="md:px-52 py-10 ">
        <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Upload Materi</h5>
        <div class="px-4">
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">



                <div class="p-4">
                    <form action="{{route('store.materi')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pb-2">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <input type="text" name="deskripsi" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Deskripsi" required="">
                        </div>
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
                        <div class="flex m-4 justify-center items-center gap-4">
                            <a href="">
                                <button type="submit"
                                    class="mx-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Save Files</button>
                            </a>
                            <a href="{{ url('/admin/materi') }}">
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
