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

  $('.mobile-menu-toggle .menu-item').click(function(e) {
    e.preventDefault();

    if ($(this).hasClass('menu-item-selected')) {
      $('.menu-item').removeClass('menu-item-selected');
    } else {
      $('.menu-item').removeClass('menu-item-selected');
      $(this).addClass('menu-item-selected');
    }
  })

  $( function() {
    var icons={
      header: 'iconClosed',
      activeHeader: 'iconOpen'
    };
    $( '.mobile-menu-toggle .menu' ).accordion({
      active: false,
      collapsible: true,
      heightStyle: 'content',
      icons: icons
    });
  });

})(jQuery);