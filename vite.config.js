import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS
                'resources/css/global.css',
                'resources/css/auth.css',
                'resources/css/filament/app.css',
                // JS
                'resources/js/global.js',
                'resources/js/filament/app.js',
            ],
            refresh: true,
        }),
    ],
});
