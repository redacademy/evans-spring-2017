(function ($) {

  $('.fa-search.mobile, .fa-search.desktop').click(function (e) {
    e.preventDefault();
    
    if(document.documentElement.clientWidth < 815) {

      $('.mobile-search-expanded').show();
      $('.search-field').focus();
      $('.mobile-menu').hide();
    }
    else{
      $('.desktop-search-expanded').show().css('display', 'flex');
      $('.search-field').focus();
      $('.main-navigation').hide();
    }
  });

    $('.content-area').click(function() {
      if(document.documentElement.clientWidth < 815) {

        $('.mobile-search-expanded').hide();
        $('.mobile-menu').show();
      }
      else {
        $('.desktop-search-expanded').hide();
        $('.main-navigation').show();
      }
    });

    var $window = $(window)

    function resize(){
      if($window.width() < 815){
        $('.mobile-menu').show();
        $('.main-navigation').hide();
      }
      if($window.width() > 815){
        $('.mobile-menu').hide();
        $('.main-navigation').show();
      }
    }

    $window.resize(resize).trigger('resize');

})(jQuery);