 <div class="dashboard-main-body">
     <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
         <h6 class="font-semibold mb-0 dark:text-white">{{ $title }}</h6>
         <ul class="flex items-center gap-[6px]">
             <li class="font-medium">
                 <div class="flex items-center gap-2 text-neutral-600  dark:text-white">
                     <iconify-icon icon="{{ $icon }}" class="icon text-lg"></iconify-icon>
                     {{ $title }}
                 </div>
             </li>


         </ul>
     </div>
     @yield('content')
 </div>
