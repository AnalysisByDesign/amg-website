// TailWind.css configuration file

module.exports = {
  theme: {
    extend: {
      width: {
        '300': '300px',
        '500': '500px',
        '1000': '1000px',
      },
      minWidth: {
        '300': '300px',
        '500': '500px',
        '1000': '1000px',
      },
      maxWidth: {
        '300': '300px',
        '500': '500px',
        '1000': '1000px',
      },
      height: {
        '300': '300px',
        '500': '500px',
        '1000': '1000px',
      },
      maxHeight: {
        '300': '300px',
        '500': '500px',
        '1000': '1000px',
      },
      colors: {
        'amg': '#7f8a00',
      }
    }
  },
  variants: {
    boxShadow: ['responsive', 'hover', 'focus'],
    backgroundColor: ['responsive', 'hover', 'focus'],
    borderWidth: ['responsive', 'hover'],
    flex: ['responsive'],
    flexGrow: ['responsive'],
  },
  plugins: []
}
