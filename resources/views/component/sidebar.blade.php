   <!-- drawer component -->
   <div id="drawer-navigation"
       class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full" style="background: #1f2937"
       tabindex="-1" aria-labelledby="drawer-navigation-label">
       </h5>
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
                   <a href="{{ url('/dashboard') }}"
                       class="flex items-center p-2 rounded-lg  text-white hover:bg-gray-500">
                       <i class="fas fa-tachometer-alt text-white"></i>
                       <span class="ml-3">Dashboard</span>
                   </a>
               </li>
               {{-- end --}}


               {{-- this is profile --}}
               <li>
                   <button type="button"
                       class="flex items-center w-full p-2  transition duration-75 rounded-lg group hover:bg-gray-100 text-white hover:bg-gray-500"
                       aria-controls="dashboard" data-collapse-toggle="dashboard">
                       <i class="fas fa-address-card"></i>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">Profile</span>
                       <svg class="w-6 h-6" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                               d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                               clip-rule="evenodd"></path>
                       </svg>
                   </button>
                   <ul id="dashboard" class="hidden py-2 space-y-2">
                       <li>
                           <a href="{{ route('profile.biodata.index') }}"
                               class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group  hover:bg-gray-500">Biodata</a>
                       </li>
                       <li>
                           <a href="{{ url('/profile/daftar-ojt') }}"
                               class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group  hover:bg-gray-500">Daftar
                               Daftar Mahasiswa</a>
                       </li>
                   </ul>
               </li>
               {{-- end --}}

               {{-- this is dokumen --}}
               <li>
                   <button type="button"
                       class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-500"
                       aria-controls="dokumen" data-collapse-toggle="dokumen">
                       <i class="fab fa-stack-overflow"></i>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">Dokumen</span>
                       <svg class="w-6 h-6" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                               d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                               clip-rule="evenodd"></path>
                       </svg>
                   </button>
                   <ul id="dokumen" class="hidden py-2 space-y-2">
                       <li>
                           <a href="{{ url('/dokumen/pengumpulan-laporan') }}"
                               class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Pengumpulan
                               Laporan</a>
                       </li>
                       <li>
                           <a href="{{ url('/dokumen/pencarian-laporan') }}"
                               class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Pencarian
                               Laporan</a>
                       </li>
                   </ul>
               </li>
               {{-- end --}}

               {{-- this is e-learning --}}
               <li>
                   <button type="button"
                       class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-500"
                       aria-controls="e-learning" data-collapse-toggle="e-learning">
                       <i class="fas fa-chalkboard-teacher"></i>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">E-Learning</span>
                       <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                               d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                               clip-rule="evenodd"></path>
                       </svg>
                   </button>
                   <ul id="e-learning" class="hidden py-2 space-y-2">
                       <li>
                           <a href="{{ url('/elearning/materi') }}"
                               class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Materi</a>
                       </li>
                       <li>
                           <a href="{{ url('/elearning/tugas') }}"
                               class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Tugas</a>
                       </li>
                       <li>
                           <a href="{{ url('/elearning/absensi') }}"
                               class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Absensi</a>
                       </li>
                   </ul>
               </li>
               {{-- end --}}
           </ul>
       </div>
   </div>
