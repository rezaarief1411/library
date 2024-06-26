const defaultTheme = require("tailwindcss/defaultTheme");
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.jsx",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            transitionDuration: {
                0: "0ms",
                2000: "2000ms",
            },
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
    presets: [
            require('./vendor/wireui/wireui/tailwind.config.js')
        ],
        content: [
            './vendor/wireui/wireui/resources/**/*.blade.php',
            './vendor/wireui/wireui/ts/**/*.ts',
            './vendor/wireui/wireui/src/View/**/*.php'
        ],
    },
    plugins: [require("@tailwindcss/forms")],
};
