(function($){
  var $youthTabHead = $('.tab-head.youth-camp-8-12'),
        $youthTabBody = $('.tab-body.youth-camp-8-12'),
        $juniorTabHead = $('.tab-head.junior-teen-10-14'),
        $juniorTabBody = $('.tab-body.junior-teen-10-14'),
        $teenTabHead = $('.tab-head.teen-camp-13-16'),
        $teenTabBody = $('.tab-body.teen-camp-13-16'),
        $oakTabHead = $('.tab-head.oak-13-16'),
        $oakTabBody = $('.tab-body.oak-13-16'),
        $leaderTabHead = $('.tab-head.leadership-14-16'),
        $leaderTabBody = $('.tab-body.leadership-14-16')
        
  $youthTabHead.on('click', function(e){
    e.preventDefault();
    $('.tab-head.selected').removeClass('selected');
    $('.tab-body.selected').removeClass('selected');
    $youthTabHead.addClass('selected');
    $youthTabBody.addClass('selected');
  });

  $juniorTabHead.on('click', function(e){
    e.preventDefault();
    $('.tab-head.selected').removeClass('selected');
    $('.tab-body.selected').removeClass('selected');
    $juniorTabHead.addClass('selected');
    $juniorTabBody.addClass('selected');
  });

  $teenTabHead.on('click', function(e){
    e.preventDefault();
    $('.tab-head.selected').removeClass('selected');
    $('.tab-body.selected').removeClass('selected');
    $teenTabHead.addClass('selected');
    $teenTabBody.addClass('selected');
  });

  $oakTabHead.on('click', function(e){
    e.preventDefault();
    $('.tab-head.selected').removeClass('selected');
    $('.tab-body.selected').removeClass('selected');
    $oakTabHead.addClass('selected');
    $oakTabBody.addClass('selected');
  });

  $leaderTabHead.on('click', function(e){
    e.preventDefault();
    $('.tab-head.selected').removeClass('selected');
    $('.tab-body.selected').removeClass('selected');
    $leaderTabHead.addClass('selected');
    $leaderTabBody.addClass('selected');
  });
})(jQuery);