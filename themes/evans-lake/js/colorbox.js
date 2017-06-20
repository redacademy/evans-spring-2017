(function($) {
  $(function() {

    var cbSettings = {
      rel: 'cboxElement',
      width: '95%',
      height: 'auto',
      maxWidth: '750',
      maxHeight: 'auto',
      title: function() {
        return $(this).find('img').attr('alt');
      }
    }

  $('.gallery a[href$=".jpg"], .gallery a[href$=".jpeg"], .gallery a[href$=".png"], .gallery a[href$=".gif"]').colorbox({transition:'none',
    rel: 'gallery',
    opacity:.85,
 
    title: function() {
    return $(this).find('img').attr('alt');
    } });

  $(window).on('resize', function() {
      $.colorbox.resize({
      width: window.innerWidth > parseInt(cbSettings.maxWidth) ? cbSettings.maxWidth : cbSettings.width
    }); 
  });

})
})(jQuery);