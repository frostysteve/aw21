module.exports = {
  content: [
    './site/templates/*.php',
    './site/snippets/*.php',
    './src/css/tailwind.css',
],
      theme: {
        fontFamily: {
          'epicene': ['Epicene'],
          'folio': ['Folio']
        },
      extend: {},
    },
    plugins: [
      require('@tailwindcss/typography')
    ],
  }