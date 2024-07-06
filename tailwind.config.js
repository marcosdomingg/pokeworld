/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php"],
  theme: {
    extend: {
      colors: {
        main: "#CC0000",
        secondary: "#FF0000",
        thirdcolor: "#787878",
        white: "#FFF",
      },
      fontFamily: {
        main: ["Kode Mono", "monospace"],
      },
    },
  },
  plugins: [],
};
