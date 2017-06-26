(function($) {

  $('.orange-button').on('click', function(event){
    event.preventDefault();
    var bioId = '#' + event.target.id + '-bio'; 
    var $bio = $('.bio');

    $('body').append('<div class="overlay"></div>');

    $('.overlay').fadeIn('fast',
      function(){
        $bio.css(
          'display', 'none'
        )
        $(bioId)
          .css('display', 'block')
          .animate({opacity: 1}, 'fast')
    });
  });

  $('.fa-times, .overlay').on('click', function(){
    $('.bio')
      .animate({opacity: 0}, 'fast',
        function(){
          $(this).css('display', 'none');
          $('.overlay').fadeOut('fast');
        }
      );
  });

})(jQuery);