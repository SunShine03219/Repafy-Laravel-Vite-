import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: true,
        // host: 'site',
        // port: 3000,
        // strictPort: true,
        hmr: {
            host: '162.144.138.169',
            // host: 'localhost',
            // host: '0.0.0.0',
            // clientPort: 80,
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
