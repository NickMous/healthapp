import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: ['./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './vendor/laravel/jetstream/**/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php',],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            }, colors: {
                'dark_green': {
                    DEFAULT: '#023122',
                    100: '#000a07',
                    200: '#01140e',
                    300: '#011d14',
                    400: '#02271b',
                    500: '#023122',
                    600: '#06895f',
                    700: '#09e19d',
                    800: '#4ff8c2',
                    900: '#a7fbe1'
                },
                'mint_green': {
                    DEFAULT: '#e1fef5',
                    100: '#035d40',
                    200: '#06ba81',
                    300: '#27f8b6',
                    400: '#84fbd6',
                    500: '#e1fef5',
                    600: '#e7fef7',
                    700: '#edfef9',
                    800: '#f3fffb',
                    900: '#f9fffd'
                },
                'sea_green': {
                    DEFAULT: '#059467',
                    100: '#011e15',
                    200: '#023b29',
                    300: '#03593e',
                    400: '#047652',
                    500: '#059467',
                    600: '#08d996',
                    700: '#30f8b8',
                    800: '#75fad0',
                    900: '#bafde7'
                },
                'celeste': {
                    DEFAULT: '#bffded',
                    100: '#035641',
                    200: '#05ac82',
                    300: '#13f8be',
                    400: '#69fad6',
                    500: '#bffded',
                    600: '#ccfdf1',
                    700: '#d8fef4',
                    800: '#e5fef8',
                    900: '#f2fffb'
                },
                'aquamarine': {
                    DEFAULT: '#07e9a1',
                    100: '#012f20',
                    200: '#035d40',
                    300: '#048c61',
                    400: '#06ba81',
                    500: '#07e9a1',
                    600: '#2df9b8',
                    700: '#62faca',
                    800: '#96fcdc',
                    900: '#cbfded'
                },
                'dm-mint_green': {
                    DEFAULT: '#cefdee',
                    100: '#04583d',
                    200: '#07b07b',
                    300: '#1ef6b1',
                    400: '#76f9d0',
                    500: '#cefdee',
                    600: '#d8fdf1',
                    700: '#e2fef5',
                    800: '#ebfef8',
                    900: '#f5fffc'
                },
                'dm-dark_green': {
                    DEFAULT: '#011e15',
                    100: '#000604',
                    200: '#000c08',
                    300: '#01120c',
                    400: '#011810',
                    500: '#011e15',
                    600: '#047b55',
                    700: '#07d896',
                    800: '#45f9c0',
                    900: '#a2fce0'
                },
                'dm-aquamarine': {
                    DEFAULT: '#6bfacd',
                    100: '#024530',
                    200: '#058a60',
                    300: '#07cf90',
                    400: '#26f7b5',
                    500: '#6bfacd',
                    600: '#89fbd7',
                    700: '#a6fce1',
                    800: '#c4fdeb',
                    900: '#e1fef5'
                },
                'dm-brunswick_green': {
                    DEFAULT: '#024031',
                    100: '#000d0a',
                    200: '#011a13',
                    300: '#01271d',
                    400: '#023327',
                    500: '#024031',
                    600: '#059672',
                    700: '#07ecb3',
                    800: '#53fad0',
                    900: '#a9fce7'
                },
                'dm-accent-aquamarine': {
                    DEFAULT: '#16f8b0',
                    100: '#023424',
                    200: '#036949',
                    300: '#059d6d',
                    400: '#06d291',
                    500: '#16f8b0',
                    600: '#45f9c0',
                    700: '#73fbd0',
                    800: '#a2fce0',
                    900: '#d0feef'
                }
            }, transitionProperty: {
                'top': 'top',
            }
        },
    },
    darkMode: 'selector',
    plugins: [forms, typography],
}
;
