@extends('index')
@section('content')
    {{-- <div class="md:px-52 py-10 ">
        <div class="px-4">

            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Quis</h5>
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <div class="my-4">
                        
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <li>
                                @foreach ($quiss as $quis)
                                    <a target="blank" href="{{ $quis->link }}" target="blank" class="flex flex-row items-center text-blue-600">
                                        <i class="fa-regular fa-note-sticky mr-2 "></i>
                                        {{$quis->deskripsi}}
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div> --}}

    <div class="md:px-52 py-10 ">
        <div class="px-4">
            <h5 class="mb-2 ml-2 md:text-start text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Quis</h5>
            <div
                class="flex flex-col w-full  bg-white border border-gray-200 rounded-lg shadow   dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="w-full p-4">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                        <div class="flex gap-2 flex-wrap  items-center">
                            <form action="{{route('user.filter.quis')}}" method="get" class="flex gap-2">
                                <div  style="width: 6rem">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                        <select name="category" style="width: 6rem" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>select</option>
                                        @foreach ($categorys as $category)
                                            <option {{ Request::has('category') && Request::input('category') == $category->id ? 'selected' : '' }}
                                                value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div >
                                    <label for="fasilitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas</label>
                                    <select name="fasilitas" style="width: 6rem" class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>select</option>
                                        @foreach ($fasilitass as $fasilitas)
                                            
                                            <option {{ Request::has('fasilitas') && Request::input('fasilitas') == $fasilitas->id ? 'selected' : '' }}
                                                 value="{{$fasilitas->id}}">{{$fasilitas->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-center mt-3">
                                   <button type="submit"
                                    class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    filter
                                    </button>
                                </div>
                            </form>
                            <div class="w-72 md:w-96 m-4 ml-auto">
                                @if (!Request::has('fasilitas') && !Request::has('category'))
                                    <form >
                                        <label for="default-search"
                                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                            <input name="query" type="search" id="default-search"
                                                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search..." value="{{ Request::input('query') ?? ''}}">
                                            <button type="submit"
                                                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                       
                        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Daftar Quis</h2>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Judul Quis
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ketegori
                                    </th>
                                     <th scope="col" class="px-6 py-3">
                                        Fasilitas
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Author
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quiss as $quis)
                                    <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$loop->iteration}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$quis->deskripsi}}
                                    </th>
                                   <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$quis->category->name}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$quis->fasilitas->name}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$quis->created_at->format('d/m/Y')}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$quis->author}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex gap-2 items-center">
                                            <input id="default-checkbox" disabled {{ App\Models\BuktiQuis::where('quis_id', $quis->id)->where('user_id', auth()->user()->id)->first() ? 'checked' : ''}} type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selesai</label>   
                                        </div>
                                    </th>
                                     <td class="px-6 py-4 flex gap-2 flex-wrap">
                                        <a href="{{$quis->link}}" target="_blank"  class="p-2 rounded bg-blue-400"><i class="fas fa-eye text-white"></i></a>
                                        <a href="{{route('user.quis.bukti', ['id' => $quis->id])}}" class="p-2 rounded flex gap-2 bg-blue-400 text-white font-semibold"><i class="fas fa-upload"></i><div>Upload bukti</div></a>
                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex w-full mt-2 justify-end">
                        {{$quiss->links()}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
