
{{-- Banner --}}
<section class="bg-white dark:bg-gray-900 py-2">
    <div class="py-8 px-8 mx-auto max-w-screen-xl lg:py-36 grid lg:grid-cols-12 gap-8 lg:gap-16">
        <!-- Kolom Kiri -->
        <div class="lg:col-span-7 z-30 flex flex-col justify-center text-center md:text-left">
            <h3 class="mb-4 md:mb-14 font-medium text-red-700 md:text-2xl lg:text-2xl">Halo, Selamat Datang di</h3>
            <h1 class="mb-6 text-4xl font-extrabold tracking-normal md:leading-loose text-gray-900 md:text-4xl lg:text-6xl dark:text-white">
                {{-- Permudah Tata Kelola Perguruan Tinggi Anda  --}}
                Platform <span class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-blue-700">SIAKAD</span>
            </h1>
            <h3 class="mb-12 font-medium tracking-normal text-primary-600 md:text-3xl lg:text-3xl">
                Platform SIAKAD – satu solusi untuk semua kebutuhan manajemen kampus Anda.
            </h3>
            <p class="mb-20 text-md font-normal text-gray-500 lg:text-md dark:text-gray-400">
                Dapatkan kemudahan dalam mengelola aktivitas akademik kampus Anda dengan platform SIAKAD. Kami menghadirkan solusi digital yang terpadu untuk membantu perguruan tinggi Anda menghadapi tantangan manajemen dan memastikan proses berjalan lebih efisien. Temukan fitur-fitur unggulan kami dan bagaimana kami dapat mendukung kemajuan kampus Anda.
            </p>
            <div class="flex flex-col space-y-4 md:flex-row md:space-y-0">
                <a href="#" class="inline-flex justify-center shadow-md items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Hubungi Kami
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="#" class="py-3 px-5 md:ms-4 shadow-md text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Minta Demo
                </a>  
            </div>
        </div>
        
        <!-- Kolom Kanan -->
        <div class="hidden z-30 lg:block lg:col-span-5">
            <img src="/img/smt-1.png" class="scale-x-[-1]" alt="{{ $appName }}" />
            {{-- <iframe class="mx-auto mt-16 w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl" src="https://www.youtube.com/embed/KaLxCiilHns" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
        </div>

        {{-- properti design segi tiga double right top --}}
        <svg class="absolute -top-64 right-0 hidden w-screen max-w-3xl -ml-12 lg:block" viewBox="0 320 518 815" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="c">
                    <stop stop-color="#E614F2" offset="0%"></stop>
                    <stop stop-color="#FC3832" offset="100%"></stop>
                </linearGradient>
                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="f">
                    <stop stop-color="#E614F2" offset="0%"></stop>
                    <stop stop-color="#1C0FD7" offset="100%"></stop>
                </linearGradient>
                {{-- <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox" id="a">
                    <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                    <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" in="shadowBlurOuter1"></feColorMatrix>
                </filter>
                <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox" id="d">
                    <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                    <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" in="shadowBlurOuter1"></feColorMatrix>
                </filter> --}}
                <path d="M160.52 108.243h497.445c17.83 0 24.296 1.856 30.814 5.342 6.519 3.486 11.635 8.602 15.12 15.12 3.487 6.52 5.344 12.985 5.344 30.815v497.445c0 17.83-1.857 24.296-5.343 30.814-3.486 6.519-8.602 11.635-15.12 15.12-6.52 3.487-12.985 5.344-30.815 5.344H160.52c-17.83 0-24.296-1.857-30.814-5.343-6.519-3.486-11.635-8.602-15.12-15.12-3.487-6.52-5.343-12.985-5.343-30.815V159.52c0-17.83 1.856-24.296 5.342-30.814 3.486-6.519 8.602-11.635 15.12-15.12 6.52-3.487 12.985-5.343 30.815-5.343z" id="b"></path>
                <path d="M159.107 107.829H656.55c17.83 0 24.296 1.856 30.815 5.342 6.518 3.487 11.634 8.602 15.12 15.12 3.486 6.52 5.343 12.985 5.343 30.816V656.55c0 17.83-1.857 24.296-5.343 30.815-3.486 6.518-8.602 11.634-15.12 15.12-6.519 3.486-12.985 5.343-30.815 5.343H159.107c-17.83 0-24.297-1.857-30.815-5.343-6.519-3.486-11.634-8.602-15.12-15.12-3.487-6.519-5.343-12.985-5.343-30.815V159.107c0-17.83 1.856-24.297 5.342-30.815 3.487-6.519 8.602-11.634 15.12-15.12 6.52-3.487 12.985-5.343 30.816-5.343z" id="e"></path>
            </defs>
            <g fill="none" fill-rule="evenodd" opacity=".9">
                <g transform="rotate(55 450.452 489.167)">
                    <use fill="#000" filter="url(#a)" xlink:href="#b"></use>
                    <use fill="url(#c)" xlink:href="#b"></use>
                </g>
                <g transform="rotate(25 421.929 414.496)">
                    <use fill="#000" filter="url(#d)" xlink:href="#e"></use>
                    <use fill="url(#f)" xlink:href="#e"></use>
                </g>
            </g>
        </svg>

        <svg class="absolute top-0 left-0 max-w-md -mt-60 -ml-10 left-svg hidden lg:block" viewBox="0 0 423 423" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <!-- Gradient Definition -->
                <linearGradient x1="100%" y1="0%" x2="4.48%" y2="0%" id="linearGradient-1">
                    <stop stop-color="#5C54DB" offset="0%"></stop>
                    <stop stop-color="#1C0FD7" offset="100%"></stop>
                </linearGradient>
                <!-- Shadow Filter -->
                {{-- <filter x="-9.3%" y="-6.7%" width="118.7%" height="118.7%" filterUnits="objectBoundingBox" id="filter-3">
                    <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                    <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1"></feGaussianBlur>
                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" in="shadowBlurOuter1"></feColorMatrix>
                </filter> --}}
            </defs>
            <g id="Page-2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity=".9">
                <g id="Desktop-HD" transform="translate(-39 -531)">
                    <g id="Hero" transform="translate(43 83)">
                        <g id="Circle-1">
                            <!-- Lingkaran dengan Gradient dan Shadow -->
                            <circle 
                                cx="213" 
                                cy="654" 
                                r="80" 
                                fill="url(#linearGradient-1)" 
                                filter="url(#filter-3)">
                            </circle>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
        
        

        {{-- properti design segi tiga sinngle left center --}}
        <svg class="absolute left-0 max-w-md mt-24 -ml-64 left-svg hidden lg:block" viewBox="0 0 423 423" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <linearGradient x1="100%" y1="0%" x2="4.48%" y2="0%" id="linearGradient-1">
                    <stop stop-color="#5C54DB" offset="0%"></stop>
                    <stop stop-color="#1C0FD7" offset="100%"></stop>
                </linearGradient>
                {{-- <filter x="-9.3%" y="-6.7%" width="118.7%" height="118.7%" filterUnits="objectBoundingBox" id="filter-3">
                    <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                    <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" in="shadowBlurOuter1"></feColorMatrix>
                </filter> --}}
                <rect id="path-2" x="63" y="504" width="300" height="300" rx="40"></rect>
            </defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity=".9">
                <g id="Desktop-HD" transform="translate(-39 -531)">
                    <g id="Hero" transform="translate(43 83)">
                        <g id="Rectangle-6" transform="rotate(45 213 654)">
                            <use fill="#000" filter="url(#filter-3)" xlink:href="#path-2"></use>
                            <use fill="url(#linearGradient-1)" xlink:href="#path-2"></use>
                        </g>
                    </g>
                </g>
            </g>
        </svg>


        {{-- <svg class="absolute left-0 max-w-md mt-24 -ml-64 left-svg hidden lg:block" viewBox="100 0 818 815" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="c">
                    <stop stop-color="#E614F2" offset="0%"></stop>
                    <stop stop-color="#FC3832" offset="100%"></stop>
                </linearGradient>
                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="f">
                    <stop stop-color="#657DE9" offset="0%"></stop>
                    <stop stop-color="#1C0FD7" offset="100%"></stop>
                </linearGradient>
                <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox" id="a">
                    <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                    <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" in="shadowBlurOuter1"></feColorMatrix>
                </filter>
                <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox" id="d">
                    <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                    <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" in="shadowBlurOuter1"></feColorMatrix>
                </filter>
                <path d="M160.52 108.243h497.445c17.83 0 24.296 1.856 30.814 5.342 6.519 3.486 11.635 8.602 15.12 15.12 3.487 6.52 5.344 12.985 5.344 30.815v497.445c0 17.83-1.857 24.296-5.343 30.814-3.486 6.519-8.602 11.635-15.12 15.12-6.52 3.487-12.985 5.344-30.815 5.344H160.52c-17.83 0-24.296-1.857-30.814-5.343-6.519-3.486-11.635-8.602-15.12-15.12-3.487-6.52-5.343-12.985-5.343-30.815V159.52c0-17.83 1.856-24.296 5.342-30.814 3.486-6.519 8.602-11.635 15.12-15.12 6.52-3.487 12.985-5.343 30.815-5.343z" id="b"></path>
                <path d="M159.107 107.829H656.55c17.83 0 24.296 1.856 30.815 5.342 6.518 3.487 11.634 8.602 15.12 15.12 3.486 6.52 5.343 12.985 5.343 30.816V656.55c0 17.83-1.857 24.296-5.343 30.815-3.486 6.518-8.602 11.634-15.12 15.12-6.519 3.486-12.985 5.343-30.815 5.343H159.107c-17.83 0-24.297-1.857-30.815-5.343-6.519-3.486-11.634-8.602-15.12-15.12-3.487-6.519-5.343-12.985-5.343-30.815V159.107c0-17.83 1.856-24.297 5.342-30.815 3.487-6.519 8.602-11.634 15.12-15.12 6.52-3.487 12.985-5.343 30.816-5.343z" id="e"></path>
            </defs>
            <g fill="none" fill-rule="evenodd" opacity=".9">
                <g transform="rotate(65 416.452 409.167)">
                    <use fill="#000" filter="url(#a)" xlink:href="#b"></use>
                    <use fill="url(#c)" xlink:href="#b"></use>
                </g>
                <g transform="rotate(29 421.929 414.496)">
                    <use fill="#000" filter="url(#d)" xlink:href="#e"></use>
                    <use fill="url(#f)" xlink:href="#e"></use>
                </g>
            </g>
        </svg> --}}

        {{-- <div class="absolute right-0 top-0 opacity-30 lg:opacity-100"><svg width="450" height="556" viewBox="0 0 450 556" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="277" cy="63" r="225" fill="url(#paint0_linear_25:217)"></circle><circle cx="17.9997" cy="182" r="18" fill="url(#paint1_radial_25:217)"></circle><circle cx="76.9997" cy="288" r="34" fill="url(#paint2_radial_25:217)"></circle><circle cx="325.486" cy="302.87" r="180" transform="rotate(-37.6852 325.486 302.87)" fill="url(#paint3_linear_25:217)"></circle><circle opacity="0.8" cx="184.521" cy="315.521" r="132.862" transform="rotate(114.874 184.521 315.521)" stroke="url(#paint4_linear_25:217)"></circle><circle opacity="0.8" cx="356" cy="290" r="179.5" transform="rotate(-30 356 290)" stroke="url(#paint5_linear_25:217)"></circle><circle opacity="0.8" cx="191.659" cy="302.659" r="133.362" transform="rotate(133.319 191.659 302.659)" fill="url(#paint6_linear_25:217)"></circle><defs><linearGradient id="paint0_linear_25:217" x1="-54.5003" y1="-178" x2="222" y2="288" gradientUnits="userSpaceOnUse"><stop stop-color="#4A6CF7"></stop><stop offset="1" stop-color="#4A6CF7" stop-opacity="0"></stop></linearGradient><radialGradient id="paint1_radial_25:217" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(17.9997 182) rotate(90) scale(18)"><stop offset="0.145833" stop-color="#4A6CF7" stop-opacity="0"></stop><stop offset="1" stop-color="#4A6CF7" stop-opacity="0.08"></stop></radialGradient><radialGradient id="paint2_radial_25:217" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(76.9997 288) rotate(90) scale(34)"><stop offset="0.145833" stop-color="#4A6CF7" stop-opacity="0"></stop><stop offset="1" stop-color="#4A6CF7" stop-opacity="0.08"></stop></radialGradient><linearGradient id="paint3_linear_25:217" x1="226.775" y1="-66.1548" x2="292.157" y2="351.421" gradientUnits="userSpaceOnUse"><stop stop-color="#4A6CF7"></stop><stop offset="1" stop-color="#4A6CF7" stop-opacity="0"></stop></linearGradient><linearGradient id="paint4_linear_25:217" x1="184.521" y1="182.159" x2="184.521" y2="448.882" gradientUnits="userSpaceOnUse"><stop stop-color="#4A6CF7"></stop><stop offset="1" stop-color="white" stop-opacity="0"></stop></linearGradient><linearGradient id="paint5_linear_25:217" x1="356" y1="110" x2="356" y2="470" gradientUnits="userSpaceOnUse"><stop stop-color="#4A6CF7"></stop><stop offset="1" stop-color="white" stop-opacity="0"></stop></linearGradient><linearGradient id="paint6_linear_25:217" x1="118.524" y1="29.2497" x2="166.965" y2="338.63" gradientUnits="userSpaceOnUse"><stop stop-color="#4A6CF7"></stop><stop offset="1" stop-color="#4A6CF7" stop-opacity="0"></stop></linearGradient></defs></svg></div> --}}
    </div>
</section>