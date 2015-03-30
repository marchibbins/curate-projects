module.exports = {
  paths : {
    componentsSrc: 'src/css/**/*.css',
    componentsDest: '.',
    mainFile: 'src/css/main.css'
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
