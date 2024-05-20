/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        "login": {
          100: "#121831",
          input: "#2C365D99",
          text: "#BCBCBD",
          "text-blue": "#24C3CF",
          button: "#0B5AFD"
        },
        "dashboard": {
          background: " #111632"
        },
      }
    },
    
  },
  plugins: [
    require('daisyui'),
  ],
}

