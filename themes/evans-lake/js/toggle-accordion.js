jQuery(document).ready(function($) {
  // Accordion
  $( function() {

    if ($('body').hasClass('page-id-38')) {
      var optionExpanded = false;
    } 

    var icons={
      header: 'iconClosed',
      activeHeader: 'iconOpen'
    };
    $( '.accordion' ).accordion({
      collapsible: true,
      heightStyle: 'content',
      icons: icons,
      active: optionExpanded
    });

    $( '.accordion.closed' ).accordion({
      collapsible: true,
      heightStyle: 'content',
      icons: icons,
      active: false
    });
  });
    // Tabs
    $( function() {
      $( '#tabs' ).tabs();
    } );

}); 


