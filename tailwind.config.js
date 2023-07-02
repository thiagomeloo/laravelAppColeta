/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./public/*.html",
    ],
    theme: {
        extend: {
            zIndex: {
                '999': '999',
                '9999': '9999',
            }
        },
    },
    plugins: [],
}

