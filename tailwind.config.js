const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: 'hsl(182, 73%, 42%)',
                primaryDark: 'hsl(182, 73%, 30%)',
                primaryLight: 'hsl(182, 73%, 50%)',
                secondary: 'hsl(208, 7%, 46%)',
                secondaryDark: 'hsl(208, 7%, 35%)',
                secondaryLight: 'hsl(208, 7%, 60%)',
                warning: 'hsl(45, 100%, 51%)',
                warningDark: 'hsl(45, 100%, 40%)',
                warningLight: 'hsl(45, 100%, 60%)',
                danger: 'hsl(354, 70%, 54%)',
                dangerDark: 'hsl(354, 70%, 40%)',
                dangerLight: 'hsl(354, 70%, 65%)',
                info: 'hsl(190, 90%, 50%)',
                infoDark: 'hsl(190, 90%, 40%)',
                infoLight: 'hsl(190, 90%, 60%)',
                success: 'hsl(152, 69%, 31%)',
                successDark: 'hsl(152, 69%, 21%)',
                successLight: 'hsl(152, 69%, 41%)',
                dark: 'hsl(210, 11%, 15%)',
                darkLight: 'hsl(210, 11%, 25%)',
                light: 'hsl(210, 17%, 98%)',
                lightLight: 'hsl(210, 17%, 78%)',
              },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
