<?php

namespace App\Http\Controllers\Admin;

use Firebase\JWT\JWT;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageTextEditorUploadController extends Controller
{
    /**
     * Generate token for TinyDrive.
     */
    public function generateTokenTinyDriveMce(Request $request)
    {
        $privateKeyPath = storage_path('keys/private.pem');
        
        if (!file_exists($privateKeyPath)) {
            return response()->json(['error' => 'Private key not found.'], 500);
        }

        $privateKey = file_get_contents($privateKeyPath);

        $payload = [
            'sub' => $request->user() ? $request->user()->id : 'guest',
            'name' => $request->user() ? $request->user()->name : 'Guest',
            'scopes' => 'drive.readonly drive.file',
            'iss' => config('app.url'), // Menggunakan URL aplikasi dari konfigurasi
            'iat' => now()->timestamp,
            'exp' => now()->addMinutes(60)->timestamp,
        ];

        try {
            $token = JWT::encode($payload, $privateKey, 'RS256');
            return response()->json(['token' => $token]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate token.'], 500);
        }
    }


    /**
     * local uppload text editor.
     */
    public function store(Request $request)
    {
        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     // Ambil nama aplikasi dari konfigurasi
        //     $appName = config('app.name');

        //     // Buat nama file dengan format appName-YYYY-MM-DD at HH.MM.SS
        //     $uniqueId = md5(uniqid(rand(), true));
        //     $fileName = $appName.'-' . now()->format('Y-m-d \a\t H.i.s') . '-' . $uniqueId . '.' . $file->getClientOriginalExtension();

        //     // Simpan file dengan nama baru di folder public/uploads/images/editor
        //     $path = $file->storeAs('uploads/images/editor', $fileName, 'public');

        //     // Kembalikan URL gambar untuk TinyMCE
        //     return response()->json(['location' => "/storage/$path"]);
        // }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Ambil nama aplikasi dari konfigurasi
            $appName = config('app.name');

            // Format nama file awal
            $timestamp = now()->format('Y-m-d \a\t H.i.s');
            $originalName = $appName . '-' . $timestamp;
            $extension = $file->getClientOriginalExtension();
            $fileName = $originalName . '.' . $extension;

            // Folder penyimpanan
            $directory = storage_path('app/public/uploads/images/editor');

            // Pastikan folder penyimpanan ada
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // Tambahkan angka jika nama file sudah ada
            $counter = 1;
            while (file_exists($directory . '/' . $fileName)) {
                $fileName = $originalName . " ($counter)." . $extension;
                $counter++;
            }

            // Simpan file dengan nama unik
            $path = $file->storeAs('uploads/images/editor', $fileName, 'public');

            // Kembalikan URL gambar untuk TinyMCE
            return response()->json(['location' => "/storage/$path"]);
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }
}
