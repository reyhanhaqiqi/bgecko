import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/views/admin/assets/scss/style.scss', // Jalur ke file SCSS utama
                'resources/views/admin/assets/js/app.js', // Jika Anda menggunakan JS
            ],
            refresh: true,
        }),
    ],
});
