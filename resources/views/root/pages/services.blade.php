<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-header>{{ $title }}</x-header>

    {{-- <!-- Header Section --> --}}
    <header class="bg-blue-600 text-white py-6 dark:bg-blue-800">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold">Layanan SIAKAD</h1>
            <p class="mt-2">Layanan Terintegrasi untuk Mendukung Akademik Perguruan Tinggi</p>
        </div>
    </header>

    {{-- <!-- Services Section --> --}}
    <section class="container mx-auto max-w-7xl py-12 px-6">
        <div class="text-center mb-12">
            <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400">Layanan Kami</h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto dark:text-gray-400">
                SIAKAD menyediakan berbagai layanan yang dirancang untuk mempermudah pengelolaan akademik di perguruan tinggi.
            </p>
        </div>

        {{-- <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 mt-12">
            <!-- Student Management Service -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Pengelolaan Data Mahasiswa</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Memudahkan administrasi mahasiswa, mulai dari pendaftaran hingga kelulusan.
                </p>
            </div>

            <!-- Course Management Service -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Pengelolaan Mata Kuliah</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Menyediakan fitur pengaturan mata kuliah, jadwal, dan pengelompokan kelas.
                </p>
            </div>

            <!-- Grade Management Service -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Sistem Penilaian</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Pengelolaan nilai secara online untuk memudahkan dosen dan mahasiswa.
                </p>
            </div>

            <!-- Attendance Management Service -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Pengelolaan Absensi</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Fitur absensi yang terintegrasi dengan sistem untuk memudahkan pemantauan kehadiran mahasiswa.
                </p>
            </div>

            <!-- Academic Reports Service -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Laporan Akademik</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Menyajikan laporan akademik secara real-time dan terstruktur untuk kebutuhan evaluasi.
                </p>
            </div>

            <!-- Notification System Service -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center dark:bg-gray-800 dark:text-gray-300">
                <h3 class="text-lg font-semibold text-blue-600 dark:text-blue-400">Sistem Notifikasi</h3>
                <p class="text-gray-600 mt-2 dark:text-gray-400">
                    Notifikasi otomatis untuk berbagai kegiatan akademik penting seperti ujian dan pendaftaran.
                </p>
            </div>
        </div> --}}



        <div class="mb-4 dark:border-gray-700">
            <ul class="hidden text-md font-medium text-center text-gray-500 rounded-lg shadow sm:flex dark:divide-gray-700 dark:bg-gray-800 dark:text-gray-400" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2 w-full py-8" role="presentation">
                    <button class="inline-block w-full p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">General</button>
                </li>
                <li class="me-2 w-full py-8" role="presentation">
                    <button class="inline-block w-full p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Manajemen Akademik</button>
                </li>
                <li class="me-2 w-full py-8" role="presentation">
                    <button class="inline-block w-full p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Manajemen Keuangan</button>
                </li>
                <li class="me-2 w-full py-8" role="presentation">
                    <button class="inline-block w-full p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false">Komunikasi</button>
                </li>
                <li class="me-2 w-full py-8" role="presentation">
                    <button class="inline-block w-full p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#tab5" type="button" role="tab" aria-controls="tab5" aria-selected="false">Pelaporan</button>
                </li>
                <li class="me-2 w-full py-8" role="presentation">
                    <button class="inline-block w-full p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#tab6" type="button" role="tab" aria-controls="tab6" aria-selected="false">Layanan Tambahan</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden pl-10 py-7 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-500" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <ul class="list-disc list-inside space-y-2">
                        <li>Layanan Pendampingan 24/7</li>
                        <li>Integrasi Neo Feeder PDDIKTI</li>
                        <li>Portal PMB</li>
                        <li>Pendaftaran Online & Offline</li>
                        <li>Computer Based Test (CBT) PMB online</li>
                        <li>Kelulusan</li>
                        <li>Biaya Mahasiswa Baru</li>
                        <li>Registrasi</li>
                        <li>Pembuatan NIM Otomatis</li>
                        <li>Voucher</li>
                        <li>Konfigurasi PMB</li>
                    </ul>
                </p>
            </div>
            <div class="hidden pl-10 py-7 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-500" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <ul class="list-disc list-inside space-y-2">
                        <li>Data PT, Fakultas, Departemen, Prodi, Konsentrasi</li>
                        <li>Data Kampus & Jenis Kelas</li>
                        <li>Data Dosen, Asisten Dosen, dan Mahasiswa</li>
                        <li>Manajemen Mata Kuliah dan Kurikulum</li>
                        <li>Penjadwalan Kuliah</li>
                        <li>Pembimbing Akademik Online</li>
                        <li>Prediksi Kebutuhan Kelas Kuliah</li>
                        <li>Manajemen Ruangan</li>
                        <li>KRS Online (KRSS, KRS, PKRS) dan KRS Massal</li>
                        <li>Presensi Kuliah</li>
                        <li>Manajemen Data Nilai</li>
                        <li>Pengajuan Cuti</li>
                        <li>Yudisium</li>
                        <li>Cetak Dokumen</li>
                        <li>Laporan-laporan Akademik</li>
                        <li>Penjadwalan Ujian</li>
                        <li>Presensi Ujian</li>
                        <li>Kalender Akademik</li>
                        <li>Surat Tugas Mengajar</li>
                        <li>Bahan dan Tugas (Fitur dosen dan mahasiswa)</li>
                        <li>Kegiatan Mahasiswa</li>
                    </ul>
                </p>
            </div>
            <div class="hidden pl-10 py-7 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-500" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <ul class="list-disc list-inside space-y-2">
                        <li>Pengaturan Biaya Kuliah</li>
                        <li>Penagihan</li>
                        <li>Potongan / Beasiswa</li>
                        <li>Pembayaran</li>
                        <li>Riwayat Pembayaran</li>
                        <li>Sistem Pembayaran Online dan Realtime (Payment Gateway)</li>
                        <li>Laporan dan Rekonsiliasi</li>
                        <li>Konfigurasi</li>
                    </ul>
                </p>
            </div>
            <div class="hidden pl-10 py-7 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-500" id="tab4" role="tabpanel" aria-labelledby="contacts-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <ul class="list-disc list-inside space-y-2">
                        <li>Pengumuman, Info Singkat</li>
                        <li>Panduan / Materi</li>
                        <li>Push Notification</li>
                        <li>Chat</li>
                    </ul>
                </p>
            </div>
            <div class="hidden pl-10 py-7 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-500" id="tab5" role="tabpanel" aria-labelledby="contacts-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <ul class="list-disc list-inside space-y-2">
                        <li>Pelaporan Neo Feeder dan Validasi Data</li>
                        <li>Manajemen Hak Akses</li>
                        <li>Log Aktivitas</li>
                        <li>Konfigurasi</li>
                    </ul>
                </p>
            </div>
            <div class="hidden pl-10 py-7 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-500" id="tab6" role="tabpanel" aria-labelledby="contacts-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <ul class="list-disc list-inside space-y-2">
                        <li>Seminar</li>
                        <li>Sertifikasi</li>
                        <li>Lock Jurnal</li>
                        <li>Skripsi</li>
                        <li>Proposal Skripsi</li>
                        <li>Kompre</li>
                        <li>Kerja Praktek</li>
                        <li>Pengajuan Surat Mahasiswa</li>
                        <li>Wisuda</li>
                        <li>SKPI</li>
                        <li>Dashboard Executive</li>
                        <li>Honorarium Akademik</li>
                        <li>Open API</li>
                    </ul>
                </p>
            </div>
        </div>

    </section>

    {{-- Produk Kami --}}
    <x-product></x-product>

    {{-- User frienly --}}
    <x-user-frienly></x-user-frienly>

    {{-- Section Utama --}}
    <section class="py-16 bg-white dark:bg-gray-900 transition duration-300">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-semibold mb-8 text-gray-900 dark:text-white">You'll be in good company</h2>
            <div class="flex justify-center items-center space-x-8">
                <!-- Logo 1 -->
                <img src="https://via.placeholder.com/80x40?text=Zoom" alt="Zoom" class="h-10">
                
                <!-- Logo 2 -->
                <img src="https://via.placeholder.com/80x40?text=Zoom" alt="Zoom" class="h-10">
                
                <!-- Logo 3 -->
                <img src="https://via.placeholder.com/80x40?text=Zapier" alt="Zapier" class="h-10">
                
                <!-- Logo 4 -->
                <img src="https://via.placeholder.com/80x40?text=Disney" alt="Disney" class="h-10">
                
                <!-- Logo 5 -->
                <img src="https://via.placeholder.com/80x40?text=Intel" alt="Intel" class="h-10">
                
                <!-- Logo 6 -->
                <img src="https://via.placeholder.com/80x40?text=Twitch" alt="Twitch" class="h-10">
            </div>
        </div>
    </section>
    

    {{-- <!-- Call to Action Section --> --}}
    <x-call></x-call>
</x-layout>