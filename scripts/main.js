$(function () {
  if ($('.play-btn').length && $('.video').length) {
    $('.play-btn').on('click', () => {
      $('.video').addClass('active').find('video')[0].play()
    })
    $('.close-btn').on('click', () => {
      $('.video').removeClass('active').find('video')[0].pause()
    })
  }
  
  if($(['data-fancybox']).length && $('#gallery .images img').length) {
    Fancybox.bind('[data-fancybox]');
  }
  
  if($('.menu-btn').length) {
    $('.menu-btn').on('click', function() {
      $([this, '#header nav']).toggleClass('active')
    })
  }
})