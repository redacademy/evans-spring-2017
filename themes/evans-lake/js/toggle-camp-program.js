(function($){

  $('.tab-head').on('click', function(event){
    event.preventDefault();
    var tabHeadId = "#" + event.target.id,
        tabBodyId = "#" + event.target.id + "-body", 
        $tabBodies = $('.tab-body'),
        $tabHeads = $('.tab-head');

    $tabHeads.removeClass('selected');
    $tabBodies.removeClass('selected');
    $(tabHeadId).addClass('selected');
    $(tabBodyId).addClass('selected');  
  });
  
})(jQuery);