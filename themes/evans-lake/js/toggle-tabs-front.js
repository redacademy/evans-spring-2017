(function($){

  if ($('body').hasClass ('home')) {
    // Set Default Tab
    $('.Camp-Programs').addClass('selected');
    
    // Add Event Handler to all Tabs
    $('.front-tab-head').click(function(event){
      event.preventDefault();
      // Reduce number of jQuery queries using variables
      var tabHeadId = '#' + event.target.id,
          tabBodyId = '#' + event.target.id + '-body',
          $tabBodies = $('.front-tab-body'),
          $tabHeads = $('.front-tab-head');

      // Remove any previous selection
      $tabHeads.removeClass('selected');
      $tabBodies.removeClass('selected');

      // Selected clicked tab head and body
      $(tabHeadId).addClass('selected');
      $(tabBodyId).addClass('selected');
    });
  }

  // $('.mobile-menu-toggle .menu-item-308').addClass('menu-item-selected');

  $('.mobile-menu-toggle .menu-item').click(function(e) {
    e.preventDefault();

    if ($(this).hasClass('menu-item-selected')) {
      $('.menu-item').removeClass('menu-item-selected');
    } else {
      $('.menu-item').removeClass('menu-item-selected');
      $(this).addClass('menu-item-selected');
    }
  })

  // $(function() {
  //   var icons = {
  //     header: 'iconClosed',
  //     activeHeader: 'iconOpen'
  //   };

  //   $( '.accordion' ).accordion({
  //     active: false,
  //     collapsible: true,
  //     heightStyle: 'content',
  //     icons: icons
  //   });
  });

})(jQuery);