module.exports = {
  purge: [
    './src/**/*.html',
    './src/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        bg: '#121212',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
