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
      'core': [
        './assets/js/hide-show.js',
        './assets/js/smooth-scroll.js',
        './assets/js/sticky-header.js'
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
        'business-pro': {
          src: './assets/scss/themes/business-pro.scss',
          dest: './assets/css/',
          outputStyle: 'compressed',
        },
        'corporate-pro': {
          src: './assets/scss/themes/corporate-pro.scss',
          dest: './assets/css/',
          outputStyle: 'compressed',
        },
        'studio-pro': {
          src: './assets/scss/themes/studio-pro.scss',
          dest: './assets/css/',
          outputStyle: 'compressed',
        },
        'editor': {
          src: './assets/scss/editor.scss',
          dest: './assets/css/',
          outputStyle: 'compressed'
        },
        'woocommerce': {
          src: './assets/scss/plugins/woocommerce/__index.scss',
          dest: './assets/css/',
          outputStyle: 'compressed'
        }
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

toolkit.extendTasks(gulp, {})
