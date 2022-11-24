const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: 'hsl(182, 73%, 42%)',
                secondary: 'hsl(208, 7%, 46%)',
                warning: 'hsl(45, 100%, 51%)',
                danger: 'hsl(354, 70%, 54%)',
                info: 'hsl(190, 90%, 50%)',
                success: 'hsl(152, 69%, 31%)',
                dark: 'hsl(210, 11%, 15%)',
                light: 'hsl(210, 17%, 98%)',

              },

        },
    },

    plugins: [
        require('@tailwindcss/forms'),
       // require('tailwindcss-rtl')
    ],
};
