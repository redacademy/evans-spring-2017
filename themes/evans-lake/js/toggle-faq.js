jQuery(document).ready(function($) {
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
}); 