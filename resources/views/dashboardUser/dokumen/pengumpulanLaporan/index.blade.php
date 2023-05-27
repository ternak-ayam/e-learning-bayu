@extends('index')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="md:px-52 py-10 ">
        <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Dokumen</h5>
        <div class="px-4">
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">



                <div class="p-4">
                    <div class="flex flex-row w-full">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4">
                            <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3 bg-white dark:bg-white-800">Submitted Status</th>
                                    <td class="px-6 py-3 bg-green-100 dark:bg-white-800">SUBMITTED FOR GRADING</td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 bg-white dark:bg-white-800"> Time Submitted</th>
                                    <td class="px-6 py-3 bg-gray-100 dark:bg-white-800">20 November 2022, 8.00 PM</td>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 bg-white dark:bg-white-800">File Submission</th>
                                    <td class="px-6 py-3 bg-gray-100 dark:bg-white-800">NAME_FILE.Pdf</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700  dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 text-center"><span
                                            class="font-semibold ">Click button dibawah untuk menuju halaman Upload File</p>
                                </div>
                                <a href="{{ url('/dokumen/pengumpulan-laporan/upload-laporan') }}" for="dropzone-file">
                                    <button 
                                        class="btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800    ">Upload
                                        File</button>
                                </a>
                            </label>
                        </div>
                        <div class="flex m-4 justify-center items-center">
                            <a href="{{ url('/dokumen/pengumpulan-laporan/edit-laporan') }}">
                                <button type="button"
                                    class="mx-auto text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800    ">Edit
                                    Submmision</button>
                            </a>
                        </div>
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
