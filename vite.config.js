import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'Modules/Core/resources/assets/css/tailwind.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'Modules/Core/resources/assets/fonts/**/*',
                    dest: 'fonts'
                },
                {
                    src: 'Modules/Core/resources/assets/icons/*',
                    dest: 'images/icons'
                },
                {
                    src: 'Modules/Core/resources/assets/images/*',
                    dest: 'images'
                }
            ]
        }),
    ],
});
