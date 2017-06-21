(function($) {
  $('.mobile-menu-toggle').hide();

  var customOverlay = '<div class="overlay menu-toggle-overlay"></div>';

  $('.fa-bars').on('click', function(e){
    e.preventDefault();

    $('body').append(customOverlay);

    $('.overlay.menu-toggle-overlay').fadeIn('fast');
    $('.mobile-menu-toggle').toggle();

    $('.overlay.menu-toggle-overlay').click(function() {
      $('.mobile-menu-toggle').toggle();
      $(this).fadeOut('fast');
      $(this).detach();
    });
  });

  $( function() {
    var icons={
      header: 'iconClosed',
      activeHeader: 'iconOpen'
    };
      $( '.menu' ).accordion({
        collapsible: true,
        heightStyle: 'content',
        icons: icons
      });
    } );

})(jQuery);