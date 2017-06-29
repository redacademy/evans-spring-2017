(function($) {

  // Mobile menu toggles on click
  $('.mobile-menu-toggle').hide();

  var customOverlay = '<div class="overlay menu-toggle-overlay"></div>';

  if ($(window).width() < 815 ) {

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
  }
  // Primary menu changes styling on click
  $('#primary-menu.menu-item:not(:last-child)').click(function(e) {
    e.preventDefault();
      console.log('check');
    if ($(this).hasClass('menu-item-selected')) {
      $('.menu-item').removeClass('menu-item-selected');
    } else {
      $('.menu-item').removeClass('menu-item-selected');
      $(this).addClass('menu-item-selected');
    }
  })


  // Accordion on menu-items
  $(function() {
    var icons = {
      header: 'iconClosed',
      activeHeader: 'iconOpen'
    };
    $('.mobile-menu-toggle .menu').accordion({
      active: false,
      collapsible: true,
      heightStyle: 'content',
      icons: icons
    });
    $('#ui-id-9').unbind('click');
  });

})(jQuery);