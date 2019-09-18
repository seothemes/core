(function ($) {
  var buttons = $('.terms-filter a').on('click', function () {

    var entry = '.content .entry'

    buttons.removeClass('active')
    $(this).addClass('active')

    if ('*' === $(this).attr('data-filter')) {
      $(entry).removeClass('hide')
    } else {
      var $el = $($(this).attr('data-filter')).fadeIn(500)
      $(entry).removeClass('hide')
      $(entry).not($el).addClass('hide')
    }
  })
})(jQuery)
