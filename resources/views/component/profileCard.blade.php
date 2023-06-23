  <div class="">
                    <div class="flex flex-col p-10">
                        <img src="{{ asset('/img/users.png') }}" class="w-48 mx-auto bordered rounded-full" alt="">
                        <h5 class="mb-2 mt-2  text-center text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                           {{$user->name}}</h5>
                        <h5
                            class="mb-2 w-full text-center text-md font-semibold tracking-tight text-gray-900 dark:text-white pb-4 border-solid border-b-2 border-black">
                            87 Tahun</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Alamat Email</p>
                        <h5 class="mb-10 text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                             {{$user->email}}</h5>
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Telepon</p>
                        <h5 class="mb-10 text-md font-semibold tracking-tight text-gray-900 dark:text-white"> {{'0' . $user->phone}}</h5>
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Alamat</p>
                        <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">{{$user->alamat}}
                        </h5>
                    </div>
                </div>