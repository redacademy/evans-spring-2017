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

})(jQuery);