<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <h3 class="text-xl">Halaman About</h3> --}}

    {{-- <!-- Header Section --> --}}
    <header class="bg-blue-600 text-white py-6 dark:bg-blue-800">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold">Tentang Platform SIAKAD</h1>
            <p class="mt-2">Sistem Informasi Akademik yang Terintegrasi dan Mudah Digunakan</p>
        </div>
    </header>

    {{-- <!-- About Us Section --> --}}
    <section class="container mx-auto max-w-7xl py-12 px-6">
        <div class="text-center mb-12">
            <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400">Apa Itu SIAKAD?</h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto dark:text-gray-400">
                SIAKAD (Sistem Informasi Akademik) adalah platform digital yang dirancang untuk mempermudah pengelolaan akademik di perguruan tinggi. Dengan SIAKAD, berbagai proses manajemen akademik, seperti pendaftaran mahasiswa, pengelolaan mata kuliah, hingga pemantauan nilai, dapat dilakukan secara efisien dan terpusat.
            </p>
        </div>

        <!-- Key Features Section -->
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 mt-12">
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Sistem Terintegrasi</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Semua informasi akademik terhubung secara otomatis, sehingga memudahkan akses dan pengelolaan data tanpa repot.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Pengelolaan Data Mahasiswa</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    SIAKAD mempermudah administrasi data mahasiswa dari pendaftaran hingga kelulusan.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Laporan Akademik</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Fitur lengkap untuk menyajikan laporan akademik secara real-time dan terstruktur.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Kemudahan Akses</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Platform ini dapat diakses kapan saja dan di mana saja, memudahkan mahasiswa dan dosen dalam berinteraksi.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Sistem Penilaian Online</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Pengelolaan nilai dapat dilakukan secara online dan terintegrasi dengan SIAKAD.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Notifikasi Otomatis</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Pemberitahuan otomatis untuk semua kegiatan akademik penting, mulai dari jadwal kuliah hingga ujian.
                </p>
            </div>
        </div>
    </section>

    {{-- <!-- Vision and Mission Section --> --}}
    <section class=" bg-gray-100 py-12 px-6 dark:bg-gray-800">
        <div class="container mx-auto max-w-7xl text-center ">
            <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">Visi dan Misi</h2>
            <p class="text-gray-600 max-w-2xl mx-auto dark:text-gray-400">
                Menjadi platform unggulan dalam mendukung pengelolaan akademik yang modern dan terintegrasi di seluruh perguruan tinggi di Indonesia.
            </p>
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-2 mt-12">
                <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-700 dark:text-gray-300">
                    <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Visi</h3>
                    <p class="text-gray-600 mt-2 dark:text-gray-400">
                        Mewujudkan pendidikan tinggi yang modern, transparan, dan terintegrasi melalui solusi digital inovatif.
                    </p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-700 dark:text-gray-300">
                    <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Misi</h3>
                    <ul class="text-gray-600 mt-2 text-left list-disc list-inside mx-auto max-w-md dark:text-gray-400">
                        <li>Menyediakan solusi akademik terintegrasi untuk seluruh perguruan tinggi.</li>
                        <li>Mengoptimalkan pengelolaan administrasi akademik dan operasional kampus.</li>
                        <li>Mempermudah akses informasi bagi seluruh civitas akademika.</li>
                        <li>Meningkatkan transparansi dan akuntabilitas pengelolaan akademik.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- Call to Action Section --> --}}
    <x-call></x-call>
</x-layout>