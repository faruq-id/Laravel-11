<x-dashboard-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <div class="bg-white text-xl p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8"></div> --}}
    
   <div class="grid grid-cols-1 gap-y-6 dark:bg-gray-900 xl:grid-cols-3 xl:gap-4">
      <div class="col-span-full dark:bg-gray-800 p-4">
         <div class="flex items-center justify-between">
            <!-- Title -->
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                  {{ $title }} settings
            </h1>
         
            <!-- Navigation -->
            <nav aria-label="Breadcrumb" class="text-right">
                  <ol class="flex items-center">
                     <li class="group flex items-center">
                        <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <a class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" data-testid="flowbite-breadcrumb-item" href="/dashboard">
                              <div class="flex items-center gap-x-3">
                                 <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                 </svg>
                                 <span class="dark:text-white">Dashboard</span>
                              </div>
                        </a>
                     </li>
                     <li class="group flex items-center">
                        <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <a class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" data-testid="flowbite-breadcrumb-item" href="{{ route('admin.users.index') }}">{{ $title }}</a>
                     </li>
                     <li class="group flex items-center">
                        <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" class="mx-1 h-6 w-6 text-gray-400 group-first:hidden md:mx-2" data-testid="flowbite-breadcrumb-separator" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400" data-testid="flowbite-breadcrumb-item">Detail</span>
                     </li>
                  </ol>
            </nav>
         </div>
      </div>
        

      {{-- <div class="px-4 pt-6"> --}}
      <div class="col-span-full mx-4 xl:mr-0 xl:col-auto">
         <div class="mb-4 rounded-lg bg-white p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8">
            <div class="sm:flex sm:space-x-4 xl:block xl:space-x-0">
               <img alt="" src="{{ imagesView(auth()->user()->profile_picture, null) }}" class="mb-2 h-20 w-20 rounded-lg">
               <div>
                  <h2 class="text-xl font-bold dark:text-white">{{ auth()->user()->name }}</h2>
                  <ul class="mt-2 space-y-1">
                        <li class="flex items-center text-sm font-normal text-gray-500 dark:text-gray-400">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="mr-2 text-lg text-gray-900 dark:text-gray-100" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                           <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                        </svg>
                        Front-end Developer
                        </li>
                        <li class="flex items-center text-sm font-normal text-gray-500 dark:text-gray-400">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" class="mr-2 text-lg text-gray-900 dark:text-gray-100" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd"></path>
                        </svg>
                        San Francisco, USA
                        </li>
                  </ul>
               </div>
            </div>

            <div class="sm:flex xl:block xl:space-y-4">
               <div class="sm:flex-1">
                  <address class="text-sm font-normal not-italic text-gray-500 dark:text-gray-400">
                        <div class="mt-4">Email address</div>
                        <a class="text-sm font-medium text-gray-900 dark:text-white" href="mailto:webmaster@flowbite.com">{{ auth()->user()->email }}</a>
                        <div class="mt-4">Home address</div>
                        <div class="mb-2 text-sm font-medium text-gray-900 dark:text-white">92 Miles Drive, Newark, NJ 07103, California, <br>United States of America</div>
                        <div class="mt-4">Phone number</div>
                        <div class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->phone_number }}</div>
                  </address>
               </div>
               <div class="hidden sm:flex-1">
                  <h3 class="mb-2 text-base font-bold text-gray-900 dark:text-white">About</h3>
                  <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking.</p>
               </div>
            </div>
            
            <div>
               <h3 class="mb-2 text-base font-bold text-gray-900 dark:text-white">Software Skill</h3>
               <div class="flex space-x-3">
                  <svg class="h-6 w-6" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.1558 0.559692H1.51087C0.676432 0.559692 0 1.23742 0 2.07346V15.7446C0 16.5806 0.676432 17.2583 1.51087 17.2583H15.1558C15.9902 17.2583 16.6667 16.5806 16.6667 15.7446V2.07346C16.6667 1.23742 15.9902 0.559692 15.1558 0.559692Z" fill="#DC395F"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.58437 4.80783C6.58437 5.37806 6.12024 5.81314 5.56621 5.81314C5.01217 5.81314 4.54817 5.378 4.54817 4.80783C4.54817 4.23799 5.01217 3.80298 5.56621 3.80298C6.12024 3.80298 6.58437 4.23799 6.58437 4.80783ZM3.36574 11.9506C3.36574 11.726 3.39575 11.4506 3.45558 11.1956H3.45565L4.21913 8.07017H3.03638L3.39575 6.74185H6.24055L5.1175 11.2051C5.04263 11.4903 5.01268 11.7269 5.01268 11.8916C5.01268 12.1771 5.15292 12.2605 5.37219 12.3101C5.50572 12.34 6.56971 12.3191 7.14895 11.029L7.88658 8.07017H6.68872L7.0481 6.74185H9.60826L9.27896 8.24995C9.72805 7.40973 10.6265 6.61139 11.5098 6.61139C12.4531 6.61139 13.2317 7.28469 13.2317 8.57479C13.2317 8.90471 13.1867 9.2638 13.067 9.66874L12.5878 11.3933C12.543 11.5737 12.5129 11.7235 12.5129 11.8585C12.5129 12.1584 12.6327 12.3083 12.8573 12.3083C13.0819 12.3083 13.3664 12.1429 13.6958 11.2284L14.3546 11.4832C13.9652 12.8483 13.2616 13.4181 12.3782 13.4181C11.345 13.4181 10.8511 12.8035 10.8511 11.9631C10.8511 11.7233 10.8809 11.4681 10.9558 11.213L11.4499 9.44292C11.5098 9.24782 11.5248 9.06798 11.5248 8.90289C11.5248 8.33305 11.1805 7.98786 10.6265 7.98786C9.92271 7.98786 9.45858 8.49397 9.219 9.46901L8.26067 13.3201H6.58391L6.88488 12.1099C6.39198 12.9211 5.70741 13.4235 4.86301 13.4235C3.84484 13.4235 3.36574 12.8359 3.36574 11.9506Z" fill="white"></path>
                  </svg>
                  <svg class="h-6 w-6" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.297 0.762876L8.9845 0.259155L13.672 0.762876L17.301 5.71471L8.9845 15.5586L0.667969 5.71471L4.297 0.762876Z" fill="#FDB300"></path>
                        <path d="M4.03524 5.71497L8.98317 15.5589L0.666626 5.71497H4.03524Z" fill="#EA6C00"></path>
                        <path d="M13.929 5.71497L8.98107 15.5589L17.2976 5.71497H13.929Z" fill="#EA6C00"></path>
                        <path d="M4.03467 5.71497H13.9305L8.9826 15.5589L4.03467 5.71497Z" fill="#FDAD00"></path>
                        <path d="M8.98272 0.259277L4.2952 0.762992L4.03479 5.71483L8.98272 0.259277Z" fill="#FDD231"></path>
                        <path d="M8.98164 0.259277L13.6692 0.762992L13.9296 5.71483L8.98164 0.259277Z" fill="#FDD231"></path>
                        <path d="M17.2987 5.71453L13.6696 0.762695L13.9301 5.71453H17.2987Z" fill="#FDAD00"></path>
                        <path d="M0.666626 5.71453L4.29565 0.762695L4.03524 5.71453H0.666626Z" fill="#FDAD00"></path>
                        <path d="M8.98272 0.259277L4.03479 5.71483H13.9306L8.98272 0.259277Z" fill="#FEEEB7"></path>
                  </svg>
                  <svg class="h-6 w-6" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.07892 17.2564C4.61226 17.2564 5.8567 16.0098 5.8567 14.4738V11.6913H3.07892C1.54559 11.6913 0.301147 12.9379 0.301147 14.4738C0.301147 16.0098 1.54559 17.2564 3.07892 17.2564Z" fill="#0ACF83"></path>
                        <path d="M0.301147 8.90901C0.301147 7.37305 1.54559 6.12646 3.07892 6.12646H5.8567V11.6916H3.07892C1.54559 11.6916 0.301147 10.445 0.301147 8.90901Z" fill="#A259FF"></path>
                        <path d="M0.301025 3.34407C0.301025 1.8081 1.54547 0.561523 3.0788 0.561523H5.85658V6.12662H3.0788C1.54547 6.12662 0.301025 4.88004 0.301025 3.34407Z" fill="#F24E1E"></path>
                        <path d="M5.85718 0.561523H8.63495C10.1683 0.561523 11.4127 1.8081 11.4127 3.34407C11.4127 4.88003 10.1683 6.12661 8.63495 6.12661H5.85718V0.561523Z" fill="#FF7262"></path>
                        <path d="M11.4127 8.90901C11.4127 10.445 10.1683 11.6916 8.63495 11.6916C7.10162 11.6916 5.85718 10.445 5.85718 8.90901C5.85718 7.37305 7.10162 6.12646 8.63495 6.12646C10.1683 6.12646 11.4127 7.37305 11.4127 8.90901Z" fill="#1ABCFE"></path>
                  </svg>
                  <svg class="h-6 w-6" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.12203 1.09285H4.79923V2.63598H5.5665V1.09285H6.24703V0.321289H4.12203V1.09285ZM2.30926 0.321317H1.54199V2.63602H2.31593V1.86445H3.01648V2.63602H3.78375V0.321317H3.01648V1.08618H2.30926V0.321317ZM6.58222 0.321289H7.38618L7.8799 1.13646L8.37362 0.321289H9.17759V2.63598H8.41032V1.4887L7.87323 2.32065L7.33614 1.4887V2.63598H6.58222V0.321289ZM10.3271 0.321289H9.5598V2.63598H11.4146V1.87113H10.3271V0.321289Z" fill="black"></path>
                        <path d="M1.51371 16.1212L0.412842 3.69568H12.5157L11.4148 16.1145L6.45425 17.4966" fill="#E44D26"></path>
                        <path d="M6.46338 16.4406V4.71619H11.4106L10.4665 15.3168" fill="#F16529"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.4651 6.23572H2.66211L3.07577 10.8383H6.4651V9.31863H4.46353L4.32342 7.75872H6.4651V6.23572ZM4.66104 11.6036H3.13985L3.35335 13.9955L6.46245 14.8677V13.2776L4.76779 12.8214L4.66104 11.6036Z" fill="#EBEBEB"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.45831 6.23572H10.2546L10.1145 7.75872H6.45831V6.23572ZM6.45654 9.31902H9.97597L9.55897 13.9954L6.45654 14.8609V13.2775L8.14787 12.8213L8.32467 10.842H6.45654V9.31902Z" fill="white"></path>
                  </svg>
                  <svg class="h-6 w-6" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.2726 15.2265H3.03646C1.64757 15.2265 0.515625 14.1118 0.515625 12.744V3.07392C0.515625 1.70616 1.64757 0.591431 3.03646 0.591431H13.2656C14.6615 0.591431 15.7865 1.70616 15.7865 3.07392V12.7372C15.7934 14.1118 14.6615 15.2265 13.2726 15.2265Z" fill="#2E001F"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.4111 7.39617L8.35555 11.0755C8.39027 11.1302 8.36943 11.1849 8.31388 11.1849H7.10554C7.02916 11.1849 6.99443 11.1644 6.95971 11.096C6.84486 10.8627 6.72954 10.6294 6.61364 10.395L6.61349 10.3946C6.28094 9.72192 5.94359 9.03947 5.5986 8.31941H5.58471C5.16804 9.23582 4.70971 10.2001 4.26526 11.1028C4.23054 11.1575 4.19582 11.178 4.14026 11.178H2.99443C2.92499 11.178 2.91804 11.1233 2.95276 11.0823L4.85554 7.51243L3.01526 3.90153C2.9736 3.84682 3.01526 3.80579 3.05693 3.80579H4.25138C4.32082 3.80579 4.3486 3.81947 4.37638 3.88102C4.81388 4.78374 5.25832 5.71382 5.67499 6.62339H5.68888C6.09165 5.72066 6.5361 4.78374 6.96666 3.88785L6.96793 3.88585C7.0019 3.83231 7.02306 3.79895 7.09166 3.79895H8.20971C8.26527 3.79895 8.2861 3.83998 8.25138 3.89469L6.4111 7.39617ZM8.69629 8.51069C8.69629 6.91725 9.77268 5.67258 11.481 5.67258C11.6268 5.67258 11.7032 5.67258 11.8421 5.68626V3.87397C11.8421 3.83293 11.8768 3.80558 11.9116 3.80558H13.0088C13.0643 3.80558 13.0782 3.8261 13.0782 3.86029V10.1383C13.0782 10.323 13.0782 10.5555 13.113 10.8085C13.113 10.8496 13.0991 10.8632 13.0574 10.8838C12.4741 11.1573 11.863 11.2804 11.2796 11.2804C9.77268 11.2873 8.69629 10.3709 8.69629 8.51069ZM11.4393 6.69151C11.6059 6.69151 11.7448 6.71886 11.842 6.75989V10.1451C11.7101 10.1998 11.5295 10.2203 11.3629 10.2203C10.5781 10.2203 9.95315 9.71427 9.95315 8.45592C9.95315 7.35487 10.5643 6.69151 11.4393 6.69151Z" fill="#FFD9F2"></path>
                  </svg>
               </div>
            </div>
         </div>

         <div class="mb-4 rounded-lg bg-white p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8">
            <div class="flow-root">
               <h3 class="text-xl font-bold dark:text-white">Skills</h3>
               <ul class="mt-4 flex flex-wrap gap-2">
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Brand Design</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Logo Design</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Mobile App Design</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>UI Design</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>React Developer</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Wordpress</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Sketch</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Figma</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Prototyping</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Database</span></span></li>
               </ul>
            </div>
         </div>

         <div class="mb-4 rounded-lg bg-white p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8">
            <div class="flow-root">
               <h3 class="text-xl font-bold dark:text-white">Hobbies</h3>
               <ul class="mt-4 flex flex-wrap gap-2">
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-primary-200 dark:group-hover:bg-primary-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Football</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-primary-200 dark:group-hover:bg-primary-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Dogs</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-primary-200 dark:group-hover:bg-primary-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Gaming</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-primary-200 dark:group-hover:bg-primary-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Movies</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-primary-200 dark:group-hover:bg-primary-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Travelling</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-primary-200 dark:group-hover:bg-primary-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Surf</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-primary-200 dark:group-hover:bg-primary-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>Ice Skating</span></span></li>
                  <li><span class="flex h-fit items-center gap-1 font-semibold bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-primary-200 dark:group-hover:bg-primary-300 rounded-full px-2 py-1 px-3 py-2 text-base rounded-md font-normal" data-testid="flowbite-badge"><span>The Witcher</span></span></li>
               </ul>
            </div>
         </div>
      </div>

      <div class="col-span-2 mx-4 xl:ml-0">
         <div class="mb-4 rounded-lg bg-white p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8">
            <h3 class="mb-4 text-xl font-bold dark:text-white">General information</h3>
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
               <div class="sm:col-span-2">
                  <dt class="text-lg font-medium text-gray-900 dark:text-white">About me</dt>
                  <dd class="mt-1 max-w-prose space-y-3 text-sm text-gray-500 dark:text-gray-400">
                     <p>Tincidunt quam neque in cursus viverra orci, dapibus nec tristique. Nullam ut sit dolor consectetur urna, dui cras nec sed. Cursus risus congue arcu aenean posuere aliquam.</p>
                     <p>Et vivamus lorem pulvinar nascetur non. Pulvinar a sed platea rhoncus ac mauris amet. Urna, sem pretium sit pretium urna, senectus vitae. Scelerisque fermentum, cursus felis dui suspendisse velit pharetra. Augue et duis cursus maecenas eget quam lectus. Accumsan vitae nascetur pharetra rhoncus praesent dictum risus suspendisse.</p>
                  </dd>
               </div>
               <div>
                  <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Education</dt>
                  <dd class="text-sm font-semibold text-gray-900 dark:text-white">Thomas Jeff High School, Stanford University</dd>
               </div>
               <div>
                  <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Work History</dt>
                  <dd class="text-sm font-semibold text-gray-900 dark:text-white">Twitch, Google, Apple</dd>
               </div>
               <div>
                  <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Join Date</dt>
                  <dd class="text-sm font-semibold text-gray-900 dark:text-white">12-09-2021</dd>
               </div>
               <div>
                  <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Languages</dt>
                  <dd class="text-sm font-semibold text-gray-900 dark:text-white">English, German, Italian, Spanish</dd>
               </div>
               <div>
                  <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Organization</dt>
                  <dd class="text-sm font-semibold text-gray-900 dark:text-white">Themesberg LLC</dd>
               </div>
               <div>
                  <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Role</dt>
                  <dd class="text-sm font-semibold text-gray-900 dark:text-white">Graphic Designer</dd>
               </div>
               <div>
                  <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Department</dt>
                  <dd class="text-sm font-semibold text-gray-900 dark:text-white">Marketing</dd>
               </div>
               <div>
                  <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Birthday</dt>
                  <dd class="text-sm font-semibold text-gray-900 dark:text-white">15-08-1990</dd>
               </div>
            </dl>
         </div>
         <div class="mb-4 rounded-lg bg-white p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-16 lg:gap-8 2xl:gap-24">
               <div class="space-y-6">
                  <div>
                     <div class="mb-1 text-base font-medium text-gray-500 dark:text-gray-400">Figma</div>
                     <div id=":r14:" aria-label="progressbar" aria-valuenow="95" role="progressbar">
                        <div class="w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700 h-2.5">
                           <div class="flex items-center justify-center rounded-full text-center font-medium leading-none text-blue-100 bg-gray-600 dark:bg-gray-300 h-2.5" style="width: 95%;"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="mb-1 text-base font-medium text-gray-500 dark:text-gray-400">Php</div>
                     <div id=":r15:" aria-label="progressbar" aria-valuenow="55" role="progressbar">
                        <div class="w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700 h-2.5">
                           <div class="flex items-center justify-center rounded-full text-center font-medium leading-none text-blue-100 bg-gray-600 dark:bg-gray-300 h-2.5" style="width: 55%;"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="mb-1 text-base font-medium text-gray-500 dark:text-gray-400">HTML</div>
                     <div id=":r16:" aria-label="progressbar" aria-valuenow="85" role="progressbar">
                        <div class="w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700 h-2.5">
                           <div class="flex items-center justify-center rounded-full text-center font-medium leading-none text-blue-100 bg-gray-600 dark:bg-gray-300 h-2.5" style="width: 85%;"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="mb-1 text-base font-medium text-gray-500 dark:text-gray-400">React</div>
                     <div id=":r17:" aria-label="progressbar" aria-valuenow="65" role="progressbar">
                        <div class="w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700 h-2.5">
                           <div class="flex items-center justify-center rounded-full text-center font-medium leading-none text-blue-100 bg-gray-600 dark:bg-gray-300 h-2.5" style="width: 65%;"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="space-y-6">
                  <div>
                     <div class="mb-1 text-base font-medium text-gray-500 dark:text-gray-400">Vue</div>
                     <div id=":r18:" aria-label="progressbar" aria-valuenow="45" role="progressbar">
                        <div class="w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700 h-2.5">
                           <div class="flex items-center justify-center rounded-full text-center font-medium leading-none text-blue-100 bg-gray-600 dark:bg-gray-300 h-2.5" style="width: 45%;"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="mb-1 text-base font-medium text-gray-500 dark:text-gray-400">Marketing</div>
                     <div id=":r19:" aria-label="progressbar" aria-valuenow="90" role="progressbar">
                        <div class="w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700 h-2.5">
                           <div class="flex items-center justify-center rounded-full text-center font-medium leading-none text-blue-100 bg-gray-600 dark:bg-gray-300 h-2.5" style="width: 90%;"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="mb-1 text-base font-medium text-gray-500 dark:text-gray-400">Product Design</div>
                     <div id=":r1a:" aria-label="progressbar" aria-valuenow="99" role="progressbar">
                        <div class="w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700 h-2.5">
                           <div class="flex items-center justify-center rounded-full text-center font-medium leading-none text-blue-100 bg-gray-600 dark:bg-gray-300 h-2.5" style="width: 99%;"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="mb-1 text-base font-medium text-gray-500 dark:text-gray-400">Angular</div>
                     <div id=":r1b:" aria-label="progressbar" aria-valuenow="45" role="progressbar">
                        <div class="w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700 h-2.5">
                           <div class="flex items-center justify-center rounded-full text-center font-medium leading-none text-blue-100 bg-gray-600 dark:bg-gray-300 h-2.5" style="width: 45%;"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
         
      {{-- </div> --}}
   </div>
</x-dashboard-layout>
 