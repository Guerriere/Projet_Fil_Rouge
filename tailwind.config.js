import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#0E7D4D', // Vert du drapeau camerounais
                secondary: '#FCD116', // Jaune du drapeau camerounais
                accent: '#CE1126', // Rouge du drapeau camerounais
            },
        },
    },

    plugins: [forms],
};
