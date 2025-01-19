import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

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
                inter: ['Inter', 'sans-serif'],
                quicksand: ['Quicksand', 'sans-serif'],
                albert: ['Albert Sans', 'sans-serif'],
                sans: ['Instrument Sans', 'sans-serif'],
            },
            colors: {
                primary: '#003366',
                navy: '#3A4C7E',
                lightblue: '#D2CFFE',
                dirtywhite: '#F8F8FA',
                myblack: '#18181A',


                // dark mode
                //dprimary: '#121A26',
                dprimary: '#0B132B', //pede
                dsecondary: '#1C2541', //muted blue
                lightblue: '#5BC0BE', //aqua teal

                dtext: '#D9E2EC',
                
                // dcontainer: '#1B263B',
                dcontainer: '#1C2541',
                //dprimary: '#112240', //pede
                //dprimary: '#1C2541', //pede
                dnavy: '#3A4C7E',
                dlightblue: '#D2CFFE',
                ddirtywhite: '#F8F8FA',
                dmyblack: '#18181A',
            },
        },
    },

    plugins: [
        forms,require('daisyui'),
        require('flowbite/plugin'),
        require('@tailwindcss/line-clamp'),
        require('tailwind-scrollbar'),
    ],
};
