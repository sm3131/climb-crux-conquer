/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
  ],
  theme: {

    colors: {
      'light-gray': '#a6978b',
      'orange': '#a77635',
      'gray': '#D3D3D3',
      'dark-blue': '#2c3647',
      'brown': '#7f5f34',
      'green': '#317133',
      'gray-blue': '#859daf',
      'slate-blue': '#426377',
      'forest-green': '#133d34',
      'blue': '#144c74'
    },

    extend: {
      fontFamily: {
        'redressed': ['Redressed', 'cursive']
      },
      backgroundImage: {
        'hero-image': "url('../../public/images/climb-logo.png')"
      }
    },
  },
  plugins: [],
}
