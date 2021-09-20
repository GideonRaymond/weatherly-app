const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                indigo: {
                    '100': 'rgb(120, 138, 255)',
                    '300': 'rgb(80, 98, 218)',
                    '500': 'rgb(40, 58, 178)',
                    '700': 'rgb(0, 18, 138)',
                    '900': 'rgb(0, 0, 110)',
                  },
                  red: {
                    '100': 'rgb(255, 155, 105)',
                    '300': 'rgb(255, 130, 85)',
                    '500': 'rgb(215, 18, 45)',
                    '700': 'rgb(175, 0, 5)',
                },
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            white: '#ffffff',
            black: '#000000',
            indigo: {
                light: 'rgb(100, 110, 215)',
                DEFAULT: 'rgb(0, 10, 115)',
                dark: 'rgb(0, 0, 75)', 
            },
            red: {
                light: 'rgb(255, 100, 55)',
                DEFAULT: 'rgb(255, 130, 85)',
                dark: 'rgb(190, 45, 0)'
            },
        },
    },
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
