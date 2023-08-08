{{-- navbar --}}
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 ">
        <a href="#" class="flex items-center gap-6">
            <img src="{{ asset('/img/logo-login.png') }}" class="h-12 mr-3" alt="Flowbite Logo" />
            <div class="hidden md:flex flex-col flex-start">
                <span class="self-start text-lg font-semibold whitespace-nowrap dark:text-white">SISTEM
                    INFORMASI</span>
                <span class="self-start text-sm font-light whitespace-nowrap dark:text-white">ON JOB
                    TRAINING</span>
            </div>
            <!-- drawer init and show -->
            <div class="text-center">
                <button

                    type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                    aria-controls="drawer-navigation">
                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 18L20 18" stroke="#000000" stroke-width="2" stroke-linecap="round" />
                        <path d="M4 12L20 12" stroke="#000000" stroke-width="2" stroke-linecap="round" />
                        <path d="M4 6L20 6" stroke="#000000" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </a>
        <div class="flex items-center md:order-2">
            <button type="button"
                class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full bg-white" src="{{ auth()->user()->image ? asset('storage/materi/' . auth()->user()->image) : asset('/img/user.png') }}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{Auth::guard(\App\Models\User::getGuard())->user()->name}}</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{Auth::guard(\App\Models\User::getGuard())->user()->email}}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    @if(\App\Models\User::getGuard() == 'web')
                    <li>
                        <a href="{{route('profile.biodata.index')}}"
                           class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Update Profile</a>
                    </li>
                    @endif
                    <li>
                        @if(\App\Models\User::getGuard() == 'admin')
                            <form id="signOut" class="hidden" method="POST" action="{{route('logout.admin')}}">@csrf <button type="submit">logout</button></form>
                            <a onclick="document.getElementById('signOut').submit()"
                               class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        @else
                            <form id="signOut" class="hidden" method="POST" action="{{route('logout')}}">@csrf <button type="submit">logout</button></form>
                            <a onclick="document.getElementById('signOut').submit()"
                                class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
</nav>
{{-- end of navbar --}}
