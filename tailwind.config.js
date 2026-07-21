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
            colors: {
                // ألوان هوية Techno Family — أساسي تركوازي + مكمّل ذهبي
                primary: {
                    DEFAULT: '#13b8c3',
                    dark: '#0e929b',
                    darker: '#085a60',
                    light: '#4fd0d9',
                },
                secondary: {
                    DEFAULT: '#e89d42',
                    dark: '#c97d22',
                    light: '#f0b56e',
                },
                accent: {
                    DEFAULT: '#e89d42',
                    dark: '#c97d22',
                    light: '#f0b56e',
                },
            },
            fontFamily: {
                cairo: ['Cairo', ...defaultTheme.fontFamily.sans],
                tajawal: ['Tajawal', ...defaultTheme.fontFamily.sans],
                sans: ['Cairo', ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true,
                padding: {
                    DEFAULT: '1rem',
                    lg: '2rem',
                },
            },
            boxShadow: {
                soft: '0 10px 40px -12px rgba(14, 146, 155, 0.18)',
                glow: '0 0 40px -8px rgba(19, 184, 195, 0.45)',
                'accent-glow': '0 12px 30px -10px rgba(232, 157, 66, 0.55)',
            },
            backgroundImage: {
                'grid-dots':
                    'radial-gradient(circle at 1px 1px, rgba(255,255,255,0.14) 1px, transparent 0)',
                'hero-gradient':
                    'linear-gradient(135deg, #085a60 0%, #0e929b 45%, #13b8c3 100%)',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-16px)' },
                },
                'float-slow': {
                    '0%, 100%': { transform: 'translateY(0) translateX(0)' },
                    '50%': { transform: 'translateY(-24px) translateX(12px)' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '200% 0' },
                    '100%': { backgroundPosition: '-200% 0' },
                },
                'fade-in-up': {
                    '0%': { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                'pulse-ring': {
                    '0%': { transform: 'scale(0.9)', opacity: '0.7' },
                    '70%, 100%': { transform: 'scale(1.4)', opacity: '0' },
                },
                'gradient-x': {
                    '0%, 100%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                },
            },
            animation: {
                float: 'float 6s ease-in-out infinite',
                'float-slow': 'float-slow 9s ease-in-out infinite',
                shimmer: 'shimmer 2.5s linear infinite',
                'fade-in-up': 'fade-in-up 0.7s ease-out both',
                'pulse-ring': 'pulse-ring 2.5s cubic-bezier(0.4,0,0.2,1) infinite',
                'gradient-x': 'gradient-x 6s ease infinite',
            },
        },
    },

    plugins: [forms],
};
