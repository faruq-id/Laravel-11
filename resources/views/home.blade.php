<x-layout>
    <x-slot:title>{{ $title }}</x-slot>


    <section class="pb-16 -mt-20 dark:bg-gray-900">
        <div class="container mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            {{-- <h2 class="text-3xl font-bold text-gray-800 mb-2">Keunggulan Platform SIAKAD</h2>
            <p class="text-gray-600 mb-10">Berbagai keunggulan fitur yang akan dirasakan oleh perguruan tinggi ketika mengimplementasikan Platform SIAKAD</p>
             --}}
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                <div class="bg-primary-500 shadow-md text-white p-6 rounded-lg text-center transform hover:scale-105 hover:shadow-lg transition duration-300 dark:bg-gray-800">
                    <div class="mb-4 text-4xl">👍</div>
                    <h3 class="font-semibold text-lg">Tingkat keberhasilan Implementasi 100%</h3>
                </div>
                
                <!-- Card 2 -->
                <div class="bg-primary-500 shadow-md text-white p-6 rounded-lg text-center transform hover:scale-105 hover:shadow-lg transition duration-300 dark:bg-gray-800">
                    <div class="mb-4 text-4xl">🏅</div>
                    <h3 class="font-semibold text-lg">Meningkatkan Point Akreditasi</h3>
                </div>
                
                <!-- Card 3 -->
                <div class="bg-primary-500 shadow-md text-white p-6 rounded-lg text-center transform hover:scale-105 hover:shadow-lg transition duration-300 dark:bg-gray-800">
                    <div class="mb-4 text-4xl">🔧</div>
                    <h3 class="font-semibold text-lg">Microservices</h3>
                </div>
                
                <!-- Card 4 -->
                {{-- <div class="bg-primary-500 shadow-md text-white p-6 rounded-lg text-center transform hover:scale-105 hover:shadow-lg transition duration-300 dark:bg-gray-800">
                    <div class="mb-4 text-4xl">🔄</div>
                    <h3 class="font-semibold text-lg">Pengembangan Berkelanjutan</h3>
                </div> --}}
                
            </div>
        </div>
    </section>


    {{-- Client --}}
    <x-client></x-client>
    

    {{-- Produk --}}
    <x-product></x-product>
    
    {{-- Keunggualan --}}
    <x-keunggulan></x-keunggulan>

    {{-- Test --}}
    <div class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto max-w-7xl text-center">
            <!-- Header -->
            <h2 class="text-3xl p-4 font-bold text-gray-800 dark:text-white">Permudah Tata Kelola Perguruan Tinggi<br> Anda Bersama Platform SIAKAD</h2>
            <p class="text-gray-600 p-4 mt-4 md:px-16 dark:text-gray-500">Hilangkan kerumitan manajemen kampus, Platform SIAKAD memberikan solusi cerdas dan tuntas secara mendetil terhadap berbagai masalah manajerial dan teknis yang sering dihadapi perguruan tinggi di Indonesia.</p>
    
            <div class="flex flex-col lg:flex-row lg:space-x-8 mt-8 items-center">
                <!-- Left Side -->
                <div class="lg:w-1/2 space-y-6">
                    <div class="bg-transparent ml-0 p-4 rounded-lg text-right flex items-center justify-end space-x-4 lg:ml-10">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Platform SIAKAD</h3>
                            <p class="text-gray-600 dark:text-gray-500">Sistem Informasi Akademik untuk Perguruan Tinggi</p>
                            <a href="#" class="text-blue-500 hover:underline">Read More</a>
                        </div>
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                        </svg>
                    </div>
                    <div class="bg-transparent mr-0 p-4 rounded-lg text-right flex items-center justify-end space-x-4 lg:mr-10">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">E-LIBRARY</h3>
                            <p class="text-gray-600 dark:text-gray-500">Sistem Perpustakaan & Digital Library</p>
                            <a href="#" class="text-blue-500 hover:underline">Read More</a>
                        </div>
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                        </svg>
                    </div>
                    <div class="bg-transparent ml-0 p-4 rounded-lg text-right flex items-center justify-end space-x-4 lg:ml-10">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">E-OFFICE</h3>
                            <p class="text-gray-600 dark:text-gray-500">Sistem Informasi Kepegawaian dan Tata Usaha</p>
                            <a href="#" class="text-blue-500 hover:underline">Read More</a>
                        </div>
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                        </svg>
                    </div>
                </div>
    
                <!-- Center Slider -->
                <div class="lg:w-1/3 w-full p-4 hidden lg:block">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            {{-- <div class="swiper-slide">
                                <img src="https://via.placeholder.com/300" alt="Image 1" class="rounded-lg shadow-lg">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://via.placeholder.com/300" alt="Image 2" class="rounded-lg shadow-lg">
                            </div> --}}
                            <div class="swiper-slide">
                                <img src="https://via.placeholder.com/300" alt="Image 3" class="rounded-lg shadow-lg">
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Right Side -->
                <div class="lg:w-1/2 space-y-6">
                    <div class="bg-transparent mr-0 p-4 rounded-lg text-left flex items-center space-x-4 lg:mr-10">
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">CIVITAS LMS</h3>
                            <p class="text-gray-600 dark:text-gray-500">Perkuliahan Online yang terintegrasi dengan platform SIAKAD</p>
                            <a href="#" class="text-blue-500 hover:underline">Read More</a>
                        </div>
                    </div>
                    <div class="bg-transparent ml-0 p-4 rounded-lg text-left flex items-center space-x-4 lg:ml-10">
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">CIVITAS MOBILE</h3>
                            <p class="text-gray-600 dark:text-gray-500">Mobile Apps Ekosistem Civitas Academica</p>
                            <a href="#" class="text-blue-500 hover:underline">Read More</a>
                        </div>
                    </div>
                    <div class="bg-transparent mr-0 p-4 rounded-lg text-left flex items-center space-x-4 lg:mr-10">
                        <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Open Feeder</h3>
                            <p class="text-gray-600 dark:text-gray-500">Kemudahan Pengolahan Data untuk Laporan Feeder PDDIKTI</p>
                            <a href="#" class="text-blue-500 hover:underline">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- User frienly --}}
    <x-user-frienly></x-user-frienly>
    

    {{-- Telah di uji --}}
    <section class="py-16 dark:bg-gray-900">
        <div class="container mx-auto max-w-7xl flex flex-col lg:flex-row lg:items-center px-6 lg:px-8">
            
            <!-- Text Section (Left Side) -->
            <div class="lg:w-3/4 space-y-6 lg:pr-8">
                <!-- Card 1 -->
                <div class="bg-white ml-0 lg:ml-10 p-6 rounded-xl shadow-md flex items-start transition-transform transform hover:scale-105 hover:shadow-lg hover:bg-yellow-50 dark:hover:bg-gray-700 dark:bg-gray-800">
                    <div class="text-yellow-500 text-3xl mr-4 dark:text-white">
                        <!-- Icon Diamond -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 24 24">
                            <path d="M12 2l4 8h-8l4-8zm0 11.118l-4.398 4.602h8.795l-4.397-4.602zm11.453-3.496l-7.465-9.622-3.098 6.059 6.863 3.563zm-10.453-7.622l-3.098 6.059-7.465-9.622 6.863 3.563zm3.398 6.753l7.465 9.622-6.863-3.563-3.098-6.059zm-2.398 8.659l-3.398-3.498 1.281-.634 3.586 1.93-1.469 2.202zm-9.453-3.496l3.586-1.93 1.281.634-3.398 3.498-1.469-2.202zm3.398-1.818l3.586-1.93-3.586-1.93-3.586 1.93 3.586 1.93zm10.453 0l3.586-1.93-3.586-1.93-3.586 1.93 3.586 1.93zm-8.26-3.623l-1.28-.634 3.398-3.498-1.469-2.202-3.398 3.498 1.281.634zm4.982-.634l1.28.634-1.28.634-3.586-1.93 3.586-1.93 1.28.634-1.28.634zm-6.612-8.071l7.465 9.622-6.863-3.563-3.398 3.498-3.586-1.93 1.281-.634 3.586-1.93z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 hover:text-yellow-600 dark:text-white">Telah Teruji</h3>
                        <p class="text-gray-600 hover:text-gray-800 dark:text-gray-500">Platform SIAKAD telah teruji dan sukses diimplementasikan pada berbagai instansi pendidikan di Indonesia.</p>
                    </div>
                </div>
    
                <!-- Card 2 -->
                <div class="bg-white mr-0 lg:mr-10 p-6 rounded-xl shadow-md flex items-start transition-transform transform hover:scale-105 hover:shadow-lg hover:bg-yellow-50 dark:hover:bg-gray-700 dark:bg-gray-800">
                    <div class="text-yellow-500 text-3xl mr-4 dark:text-white">
                        <!-- Icon Wrench -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 24 24">
                            <path d="M21.18 13.82l-4.97-4.97c1.11-3.3-1.79-6.2-5.09-5.09l-1.56 1.56 1.41 1.41.47-.47c1.19-.39 2.3.72 1.91 1.91l-.47.47 1.41 1.41 4.97-4.97c1.68 1.68 1.68 4.41 0 6.09zm-8.59 8.59l1.41-1.41-1.41-1.41-1.41 1.41 1.41 1.41zm-8.09-8.09l4.97 4.97-4.97 4.97c-1.68-1.68-1.68-4.41 0-6.09z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 hover:text-yellow-600 dark:text-white">Pengembangan Berkelanjutan</h3>
                        <p class="text-gray-600 hover:text-gray-800 dark:text-gray-500">Produk software unggulan platform SIAKAD terus dikembangkan sesuai perkembangan zaman, teknologi, dan berbagai fitur yang dibutuhkan.</p>
                    </div>
                </div>
    
                <!-- Card 3 -->
                <div class="bg-white ml-0 lg:ml-10 p-6 rounded-xl shadow-md flex items-start transition-transform transform hover:scale-105 hover:shadow-lg hover:bg-yellow-50 dark:hover:bg-gray-700 dark:bg-gray-800">
                    <div class="text-yellow-500 text-3xl mr-4 dark:text-white">
                        <!-- Icon Support -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 24 24">
                            <path d="M21 15.46v-6.92c0-.86-.65-1.57-1.5-1.71v-.83c0-1.99-1.66-3.61-3.71-3.71h-1.58c-2.04.11-3.7 1.72-3.71 3.71v.83c-.85.14-1.5.85-1.5 1.71v6.92c0 .86.65 1.57 1.5 1.71v.84c0 2.05 1.65 3.71 3.71 3.71h1.58c2.05-.1 3.71-1.72 3.71-3.71v-.84c.85-.14 1.5-.85 1.5-1.71zm-6-12.21h-1.58c-1.33.07-2.38 1.16-2.38 2.46v.75h6.34v-.75c-.01-1.3-1.06-2.39-2.38-2.46zm-2 14.71h-2v-4h2v4zm4 0h-2v-4h2v4z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 hover:text-yellow-600 dark:text-white">Layanan Purnajual</h3>
                        <p class="text-gray-600 hover:text-gray-800 dark:text-gray-500">Kami berkomitmen penuh memberikan layanan purnajual bagi seluruh pengguna produk-produk platform SIAKAD.</p>
                    </div>
                </div>
            </div>
    
            <!-- Image Section (Right Side) -->
            <div class="flex flex-col items-center justify-center lg:w-2/5 lg:justify-center space-y-4 mt-8 lg:mt-0">
                <div class="w-3/9 lg:w-4/3 p-2">
                    <div class="relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[8px] rounded-t-xl h-[172px] max-w-[301px] md:h-[294px] md:max-w-[512px]">
                        <div class="rounded-lg overflow-hidden h-[156px] md:h-[278px] bg-white dark:bg-gray-800">
                            <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/laptop-screen.png" class="dark:hidden h-[156px] md:h-[278px] w-full rounded-lg" alt="">
                            <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/laptop-screen-dark.png" class="hidden dark:block h-[156px] md:h-[278px] w-full rounded-lg" alt="">
                        </div>
                    </div>
                    <div class="relative mx-auto bg-gray-900 dark:bg-gray-700 rounded-b-xl rounded-t-sm h-[17px] max-w-[351px] md:h-[21px] md:max-w-[597px]">
                        <div class="absolute left-1/2 top-0 -translate-x-1/2 rounded-b-xl w-[56px] h-[5px] md:w-[96px] md:h-[8px] bg-gray-800"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>    


    {{-- Price --}}
    <x-price></x-price>
    
    {{-- Testi --}}
    <x-testimoni></x-testimoni>
    
    {{-- Call to Action Section --}}
    <x-call></x-call>

    <x-newsletter></x-newsletter> 
     
</x-layout>