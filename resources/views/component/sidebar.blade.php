   <!-- drawer component -->
   <div id="drawer-navigation"
       class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
       tabindex="-1" aria-labelledby="drawer-navigation-label">
       <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu
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
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                       <svg xmlns="http://www.w3.org/2000/svg"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           viewBox="0 0 100 100" id="computer">
                           <path
                               d="M84 17H16c-3.3 0-6 2.7-6 6v42c0 3.3 2.7 6 6 6h22v4.2c-.1.4-.9 1.5-1.3 2-1.1 1.4-2.2 2.8-1.4 4.4.3.7 1.1 1.4 2.7 1.4h23c1 0 3.3 0 4.1-1.8.8-1.8-.6-3.2-1.8-4.5-.4-.5-1.1-1.2-1.3-1.6V71h22c3.3 0 6-2.7 6-6V23c0-3.3-2.7-6-6-6zM40.3 79c.9-1.1 1.7-2.4 1.7-3.8V71h16v4.2c0 1.4 1 2.7 2 3.8H40.3zM86 65c0 1.1-.9 2-2 2H16c-1.1 0-2-.9-2-2v-6h72v6zm0-10H14V23c0-1.1.9-2 2-2h68c1.1 0 2 .9 2 2v32z">
                           </path>
                           <path fill="#00F" d="M524-370v1684h-1784V-370H524m8-8h-1800v1700H532V-378z"></path>
                       </svg>
                       <span class="ml-3">Dashboard</span>
                   </a>
               </li>
               {{-- end --}}


               {{-- this is profile --}}
               <li>
                   <button type="button"
                       class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                       aria-controls="dashboard" data-collapse-toggle="dashboard">
                       <svg xmlns="http://www.w3.org/2000/svg"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           enable-background="new 0 0 512 512" viewBox="0 0 512 512" id="user">
                           <path
                               d="M376.9 175.9c-.3 49.8-31.7 96.2-78.8 113.4-48.2 17.6-102.7 2.8-135.5-36.6-32.4-38.9-36.2-96-10.2-139.1 26-43.3 78.1-66.4 127.7-56.2 49.2 10.1 87.5 50.3 95.5 99.8C376.5 163.4 376.9 169.7 376.9 175.9c.1 9.6 15.1 9.7 15 0-.3-56.7-36-107.9-89.2-127.6-53-19.7-115.2-2.9-151.2 40.7-36.4 44.2-41.7 108.2-11.8 157.4 29.6 48.5 87.3 73.6 142.9 62.8 54.8-10.7 99.1-56.7 107.5-111.9 1.1-7.1 1.7-14.2 1.7-21.3C392 166.3 377 166.3 376.9 175.9zM22.7 469.8c49.5-48.5 111.9-82.8 180.5-94.4 64.5-10.9 131.8-.6 190.7 27.6 35.2 16.9 67.3 39.6 95.3 66.8 6.9 6.7 17.6-3.9 10.6-10.6-51.1-49.4-115.6-85-185.9-97.6-67.8-12.2-137.8-2.8-200.3 26.3C76 405.5 41.8 430.1 12.1 459.2 5.2 465.9 15.8 476.5 22.7 469.8L22.7 469.8z">
                           </path>
                       </svg>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">Profile</span>
                       <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                               d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                               clip-rule="evenodd"></path>
                       </svg>
                   </button>
                   <ul id="dashboard" class="hidden py-2 space-y-2">
                       <li>
                           <a href="{{ route('profile.biodata.index') }}"
                               class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Biodata</a>
                       </li>
                       <li>
                           <a href="{{ url('/profile/daftar-ojt') }}"
                               class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Daftar
                               OJT</a>
                       </li>
                   </ul>
               </li>
               {{-- end --}}

               {{-- this is dokumen --}}
               <li>
                   <button type="button"
                       class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                       aria-controls="dokumen" data-collapse-toggle="dokumen">
                       <svg xmlns="http://www.w3.org/2000/svg"
                           class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                           viewBox="0 0 24 24" id="document">
                           <path
                               d="M20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19l-.09,0L13.06,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H14ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V9a1,1,0,0,0,1,1h5Z">
                           </path>
                       </svg>
                       <span class="flex-1 ml-3 text-left whitespace-nowrap">Dokumen</span>
                       <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                               d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                               clip-rule="evenodd"></path>
                       </svg>
                   </button>
                   <ul id="dokumen" class="hidden py-2 space-y-2">
                       <li>
                           <a href="{{ url('/dokumen/pengumpulan-laporan') }}"
                               class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pengumpulan
                               Laporan</a>
                       </li>
                       <li>
                           <a href="{{ url('/dokumen/pencarian-laporan') }}"
                               class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pencarian
                               Laporan</a>
                       </li>
                   </ul>
               </li>
               {{-- end --}}

               {{-- this is e-learning --}}
               <li>
                   <button type="button"
                       class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                       aria-controls="e-learning" data-collapse-toggle="e-learning">
                       <svg xmlns="http://www.w3.org/2000/svg"
                           class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                           data-name="line expand" viewBox="0 0 48 48" id="education">
                           <path fill="#1a1a1a"
                               d="M12.633 38.824H2.245c-.558 0-.745 0-.745-1.011V35.408a.75.75 0 0 0-1.5 0v2.405a2.142 2.142 0 0 0 2.245 2.511H12.633a.75.75 0 0 0 0-1.5zM.75 33.047a.75.75 0 0 0 .75-.75V7.505l22.7.039V20.049a.75.75 0 0 0 1.5 0V7.544A1.53 1.53 0 0 0 24.185 6H2.136l3.43-2.9h21.8a1.2 1.2 0 0 1 1.2 1.2V19.52a.75.75 0 0 0 1.5 0V4.3a2.7 2.7 0 0 0-2.7-2.7H5.292a.749.749 0 0 0-.484.177L.353 5.551a1.116 1.116 0 0 0-.242.377A.736.736 0 0 0 0 6.3v26A.75.75 0 0 0 .75 33.047z">
                           </path>
                           <path fill="#1a1a1a"
                               d="M27.142 19.781a.75.75 0 0 0 .75-.75V6.04a2.234 2.234 0 0 0-2.227-2.231L6.919 3.77h0a.75.75 0 0 0 0 1.5l18.747.039a.732.732 0 0 1 .73.731V19.031A.75.75 0 0 0 27.142 19.781zM37.472 34.059a.75.75 0 0 0-.75.75v6.236a.9.9 0 0 1-.1.421C36.2 42.271 34.2 44.9 26.2 44.9s-10-2.626-10.427-3.432a.9.9 0 0 1-.1-.42V35.127a.75.75 0 0 0-1.5 0v5.918a2.416 2.416 0 0 0 .268 1.119C15.115 43.437 17.6 46.4 26.2 46.4s11.084-2.96 11.753-4.232a2.4 2.4 0 0 0 .27-1.12V34.809A.75.75 0 0 0 37.472 34.059z">
                           </path>
                           <path fill="#1a1a1a"
                               d="M47.487,27.639,27.645,21.011a.732.732,0,0,0-.467,0L4.827,28.177A.751.751,0,0,0,4.816,29.6l20.9,7.064a.76.76,0,0,0,.24.04.751.751,0,0,0,.252-.044l15.341-5.478v3.6a2.522,2.522,0,0,0-1.793,2.406V38.7a2.528,2.528,0,0,0,5.056,0V37.186a2.524,2.524,0,0,0-1.763-2.4v-4.14L47.5,29.057a.75.75,0,0,0-.015-1.418ZM43.308,38.7a1.028,1.028,0,0,1-2.056,0V37.186a1.028,1.028,0,1,1,2.056,0ZM42.192,29.36,26.279,27.643a.75.75,0,1,0-.16,1.491l12.829,1.384-13,4.644L7.454,28.91l19.948-6.4,17.551,5.863Z">
                           </path>
                       </svg>
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
                               class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Materi</a>
                       </li>
                       <li>
                           <a href="{{ url('/elearning/quis') }}"
                               class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Quis</a>
                       </li>
                       {{-- <li>
                           <a href="{{ url('/elearning/absensi') }}"
                               class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Absensi</a>
                       </li> --}}
                   </ul>
               </li>
               {{-- end --}}
           </ul>
       </div>
   </div>
