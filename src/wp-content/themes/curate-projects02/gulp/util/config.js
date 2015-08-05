module.exports = {
  paths : {
    styleSrc: 'src/css/**/*.css',
    stylesDest: '.',
    stylesEntry: 'src/css/main.css',
    scriptsSrc: 'src/scripts/**/*.js',
    scriptsDest: './js',
  },
  autoprefixer : {
    browsers : [
      'Explorer >= 9',
      'last 2 Chrome versions',
      'last 2 Firefox versions',
      'last 2 Safari versions',
      'last 2 iOS versions',
      'Android 4'
    ],
    cascade: false
  }
};
