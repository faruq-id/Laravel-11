<?php

namespace App\Http\Controllers\Admin;

use Firebase\JWT\JWT;
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads/images', 'public'); // Simpan file di folder public/uploads/images

            return response()->json(['location' => "/storage/$path"]); // URL gambar untuk TinyMCE
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }
}
