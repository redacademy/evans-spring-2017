(function($) {

  $('.orange-button').on('click', function(event){
    event.preventDefault();
    var bioId = "#" + event.target.id + "-bio"; 
    var $bio = $('.bio');

    $('.overlay').show('fast',
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
          $('.overlay').hide('fast');
        }
      );
  });

})(jQuery);