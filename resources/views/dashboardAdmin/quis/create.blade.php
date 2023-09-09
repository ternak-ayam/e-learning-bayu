@extends('indexAdmin')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="md:px-52 py-10 ">
    <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Upload Tugas</h5>
    <div class="px-4">
        <div
            class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">



            <div class="p-4">
                <form action="{{$tugas ? route('admin.update.quis' , $tugas->id) :  route('admin.upload.quis')}}"
                    method="POST" enctype="multipart/form-data">
                    @if($tugas)
                    @method('PUT')
                    @endif
                    @csrf
                    <div class="pb-2">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <input type="text" value="{{$tugas ? $tugas->deskripsi : ''}}" name="deskripsi" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Deskripsi" required="">
                    </div>
                    @error('deskripsi')
                    <span class="text-red-700 text-sm" style="color:red">
                        {{ $message }}
                    </span>
                    @enderror
                    <div class="pb-2">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                        <input type="text" value="{{$tugas ? $tugas->author : ''}}" name="author" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Author" required="">
                    </div>
                    @error('author')
                    <span class="text-red-700 text-sm" style="color:red">
                        {{ $message }}
                    </span>
                    @enderror
                    <div class="w-full">
                        <label for="fasilitas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas</label>
                        <select name="fasilitas" 
                            class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($fasilitass as $fasilitas)
                            <option
                                {{ $tugas && $tugas->fasilitas_id == $fasilitas->id ? 'selected' : '' }}
                                value="{{$fasilitas->id}}">{{$fasilitas->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Caterogy</label>
                        <select name="category" 
                            class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($categorys as $category)
                            <option
                                {{ $tugas && $tugas->category_id == $category->id ? 'selected' : '' }}
                                value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pb-2">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                            Quis</label>
                        <input type="text" value="{{$tugas ? $tugas->link : ''}}" name="link" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Link Google Form" required="">
                    </div>
                    @error('link')
                    <span class="text-red-700 text-sm" style="color:red">
                        {{ $message }}
                    </span>
                    @enderror

                    <div class="flex m-4 justify-center items-center gap-4">
                        <a>
                            <button type="submit"
                                class="mx-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Simpan</button>
                        </a>
                        <a href="{{ url('/admin/quis') }}">
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
