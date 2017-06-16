(function($) {
  $(function() {
    
    $('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      if (
        location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') 
        && 
        location.hostname === this.hostname
      ) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          event.preventDefault();
          $('html, body').stop().animate({
            scrollTop: target.offset().top -70
          }, 800, function() {
            var $target = $(target);
            $target.blur();
            if ($target.is(':focus')) {
              return false;
            } else {
              $target.attr('tabindex','-1');
              $target.blur();
            }
          });
        }
      }
    })
  })
})(jQuery);