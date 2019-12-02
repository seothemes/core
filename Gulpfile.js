process.env.DISABLE_NOTIFIER = true

const gulp = require('gulp')
const toolkit = require('gulp-wp-toolkit')

toolkit.extendConfig(
  {
    src: {
      php: ['**/*.php', '!vendor/**'],
      images: './assets/img/**/*',
      scss: './assets/scss/**/*.scss',
      css: ['**/*.css', '!node_modules/**'],
      js: ['./assets/js/**/*.js', '!node_modules/**'],
      json: ['**/*.json', '!node_modules/**'],
      i18n: './assets/lang/'
    },
    js: {
      'main': [
        './assets/js/hide-show.js',
        './assets/js/smooth-scroll.js',
        './assets/js/sticky-header.js',
        './assets/js/filters.js'
      ],
      'editor': [
        './assets/js/editor.js'
      ]
    },
    css: {
      basefontsize: 10,
      remmediaquery: false,
      cssnano: {
        discardComments: {
          removeAll: true
        },
        zindex: false
      },
      scss: {
        'business-pro-main': {
          vars: require('./assets/scss/themes/business-pro/colors.json'),
          src: './assets/scss/themes/business-pro/main.scss',
          dest: './assets/css/business-pro/',
          outputStyle: 'compressed',
        },
        'business-pro-editor': {
          vars: require('./assets/scss/themes/business-pro/colors.json'),
          src: './assets/scss/themes/business-pro/editor.scss',
          dest: './assets/css/business-pro/',
          outputStyle: 'compressed'
        },

      }
    },
    dest: {
      i18npo: './assets/lang/',
      i18nmo: './assets/lang/',
      images: './assets/img/',
      js: './assets/js/min/'
    },
    server: {
      notify: false,
      proxy: 'https://demo.test',
      host: 'demo.test',
      open: 'external',
      port: '8000',
      files: [
        'assets/css/*'
      ],
      https: {
        'key': '/Users/seothemes/.config/valet/Certificates/demo.test.key',
        'cert': '/Users/seothemes/.config/valet/Certificates/demo.test.crt'
      }
    }
  }
)

toolkit.extendTasks(gulp, {

})
