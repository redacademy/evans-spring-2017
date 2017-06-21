(function($){

  if ($('body').hasClass ("page-template-camp-programs")) {
    // Set Default Tab
    $('.youth-camp-8-12').addClass('selected'); 
    
    // Add Event Handler to all Tabs
    $('.tab-head').on('click', function(event){
      event.preventDefault();
      // Reduce number of jQuery queries using variables
      var tabHeadId = "#" + event.target.id,
          tabBodyId = "#" + event.target.id + "-body", 
          $tabBodies = $('.tab-body'),
          $tabHeads = $('.tab-head');

      // Remove any previous selection
      $tabHeads.removeClass('selected');
      $tabBodies.removeClass('selected');

      // Selected clicked tab head and body
      $(tabHeadId).addClass('selected');
      $(tabBodyId).addClass('selected');  
    });
  }
  
})(jQuery);