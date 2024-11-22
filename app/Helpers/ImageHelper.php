<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('imagesView')) {
    function imagesView($images, $noimage = null)
    {
        if (!empty($images) AND Storage::url($images) AND Storage::url($images)) {
            return Storage::url($images);
        }
    
        // Gunakan default fallback jika `$noimage` tidak diisi
        return $noimage ?: Storage::url('/users/no-image.png');
    }
}