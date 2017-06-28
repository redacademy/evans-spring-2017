(function ($) {

  $('.fa-search.mobile, .fa-search.desktop').click(function (e) {
    e.preventDefault();
    
    if (document.documentElement.clientWidth < 815) {
      $('.mobile-search-expanded').show();
      $('.search-field').focus();
      $('.mobile-menu').hide();
    } else {
        $('.desktop-search-expanded').show().css('display', 'flex');
        $('.search-field').focus();
        $('.main-navigation').hide();
      }
  });

  $('.site-content').click(function() {
    if (document.documentElement.clientWidth < 815) {
      $('.mobile-search-expanded').hide();
      $('.mobile-menu').show();
    } else {
      $('.desktop-search-expanded').hide();
      $('.main-navigation').show();
    }
  });

  function resize(){
    if ($window.width() < 815){
      $('.mobile-menu').show();
      $('.main-navigation').hide();
    }
    if ($window.width() > 815){
      $('.mobile-menu').hide();
      $('.main-navigation').show();
    }
  }

  if ($('.desktop-search-expanded, .mobile-search-expanded').length === 0 ) {
    var $window = $(window);
    $window.resize(resize).trigger('resize');
  }

})(jQuery);