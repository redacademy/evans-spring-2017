(function($) {

  $('.fa-search').click(function(e){
    e.preventDefault();
      $('.mobile-search-expanded').show();
      $('.search-field').focus();
      $('.mobile-menu').hide();
  });

  $('.content-area').click(function() {
    $('.mobile-search-expanded').hide();
    $('.mobile-menu').show();
  });

})(jQuery);