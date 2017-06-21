(function($) {

  $('.orange-button').click( function(event){
    event.preventDefault();

    $('.overlay').fadeIn('fast',
      function(){
        $('.bio') 
          .css('display', 'block')
          .animate({opacity: 1}, 'fast')
    });
  });

  $('.fa-times, .overlay').click( function(){
    $('.bio')
      .animate({opacity: 0}, 'fast',
        function(){
          $(this).css('display', 'none');
          $('.overlay').fadeOut('fast');
        }
      );
  });

})(jQuery);