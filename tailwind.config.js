/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./public/*.html",
  ],
  variants: {
    extend: {
      backgroundColor: ['active', 'hover'],
      textColor: ['active', 'hover'],
    },
  },
  theme: {
    extend: {},
  },
  plugins: [],
}

