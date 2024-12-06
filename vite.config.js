import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/customs.css', 
                'resources/js/app.js', 
                'resources/js/customs.js', 
                'resources/js/editor.js'
            ],
            refresh: true,
        }),
    ],
});
