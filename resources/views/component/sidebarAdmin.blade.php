   <!-- drawer component -->
   <div id="drawer-navigation"
       class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full " style="background: #1f2937"
       tabindex="-1" aria-labelledby="drawer-navigation-label">
       <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
           class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
           <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd"
                   d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                   clip-rule="evenodd"></path>
           </svg>
           <span class="sr-only">Close menu</span>
       </button>
       <div class="py-4 overflow-y-auto">
           <ul class="space-y-2 font-medium">
               {{-- this id dashboard --}}
               <li>
                   <a href="{{ url('/admin/dashboard-admin/') }}"
                       class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-500">
                       <i class="fas fa-tachometer-alt text-white"></i>
                       <span class="ml-3">Dashboard Admin</span>
                   </a>
               </li>
               {{-- end --}}


               {{-- this is profile --}}
               <li>
                <a href="{{ url('/admin/absensi') }}"
                       class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-500"
                       aria-controls="dashboard" data-collapse-toggle="dashboard">
                    <i class="fas fa-clipboard-list"></i>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">Absensi</span>
                    </a>
               </li>
               {{-- end --}}
               {{-- this is profile --}}
               <li>
                <a href="{{ url('/admin/materi') }}"
                       class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-500"
                       aria-controls="dashboard" data-collapse-toggle="dashboard">
                       <i class="fas fa-file-alt"></i>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">Materi</span>

                    </a>
               </li>
               {{-- end --}}

               {{-- this is dokumen --}}
               <li>
                <a href="{{ url('/admin/tugas') }}"
                       class="flex items-center text-white w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-500"
                       aria-controls="dokumen" data-collapse-toggle="dokumen">
                    <i class="fab fa-stack-overflow"></i>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">Tugas</span>

                    </a>
               </li>


               {{-- end --}}

                 <li>
                <a href="{{ route('admin.user.index') }}"
                       class="flex items-center w-full p-2 text-white  duration-75 rounded-lg group hover:bg-gray-500"
                       aria-controls="dokumen" data-collapse-toggle="dokumen">
                        <i class="fas fa-users"></i>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">User</span>
                    </a>
               </li>

                <li>
                <a href="{{ route('admin.daftar.laporan') }}"
                       class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-500"
                       aria-controls="dokumen" data-collapse-toggle="dokumen">
                    <i class="fas fa-file-signature"></i>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">Laporan</span>
                    </a>
               </li>
           </ul>
       </div>
   </div>
