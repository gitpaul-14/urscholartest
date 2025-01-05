import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
                cocogoose: ['Cocogoose', 'sans-serif'],
                onest: ['Onest', 'sans-serif'],
                sora: ['Sora', 'sans-serif'],
            },
            colors: {
                primary: '#003366',
                navy: '#3A4C7E',
                lightblue: '#D2CFFE',
                dirtywhite: '#F8F8FA',
                myblack: '#18181A',
            },
        },
    },

    plugins: [
        forms,require('daisyui'),
        require('flowbite/plugin'),
    ],
};
