/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content:  [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      'xs': '275px',
    },
    extend: {},
  },
  plugins: [],
}

