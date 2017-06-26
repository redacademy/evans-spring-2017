jQuery(document).ready(function($) {
  if ($('body').hasClass ("page-id-38")) {
    // Set Default Tab
    $('.menu-item-1').addClass('selected');
  
    // Add Event Handler to all Tabs
    $('.tab-head').on('click', function(event){
      event.preventDefault();
      console.log('click');
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

}); 