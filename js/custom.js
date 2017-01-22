jQuery(document).ready(function () {

	$('.picture').hover(function () {
		$(this).find('.image-overlay-link').stop().fadeTo(150, 1);
	},function () {
		$(this).find('.image-overlay-link').stop().fadeTo(150, 0);
	});

  $('.wp1').waypoint(function() {
		$('.wp1').addClass('animated fadeInUp');
	}, {
		offset: '90%'
	});
  $('.wp2').waypoint(function() {
    $('.wp2').addClass('animated slideInLeft');
  }, {
    offset: '80%'
  });
  $('.wp3').waypoint(function() {
    $('.wp3').addClass('animated zoomIn');
  }, {
    offset: '90%'
  });
  $('.wp4').waypoint(function() {
    $('.wp4').addClass('animated fadeInUp');
  }, {
    offset: '90%'
  });

});
