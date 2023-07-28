const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            animation: {
                cursor: 'cursor .6s linear infinite alternate',
                type: 'type 1.8s ease-out .8s 1 normal both',
                'type-reverse': 'type 1.8s ease-out 0s infinite alternate-reverse both',
              },
              keyframes: {
                type: {
                  '0%': { width: '0ch' },
                  '5%, 10%': { width: '1ch' },
                  '15%, 20%': { width: '2ch' },
                  '25%, 30%': { width: '3ch' },
                  '35%, 40%': { width: '4ch' },
                  '45%, 50%': { width: '5ch' },
                  '55%, 60%': { width: '6ch' },
                  '65%, 70%': { width: '7ch' },
                  '75%, 80%': { width: '8ch' },
                  '85%, 90%': { width: '9ch' },
                  '95%': { width: '10ch' },
                },
              },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms', 'flowbite/plugin')],
};

