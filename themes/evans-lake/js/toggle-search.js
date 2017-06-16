(function($) {
  
  $('.search-form').hide();

  $('.fa-search').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();

    $('.search-form').animate({width:'toggle'},350);
    $('.search-field').focus();
  });

})(jQuery);