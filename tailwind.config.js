module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        'urbanist': ["Urbanist", "sans-serif"]
      } 
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}