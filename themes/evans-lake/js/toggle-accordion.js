jQuery(document).ready(function($) {

  // Accordion
  $( function() {
    var icons={
      header: 'iconClosed',
      activeHeader: 'iconOpen'
    };
      $( '.accordion' ).accordion({
        collapsible: true,
        heightStyle: 'content',
        icons: icons
      });
    } );

    // Tabs
    $( function() {
      $( '#tabs' ).tabs();
    } );

}); 


