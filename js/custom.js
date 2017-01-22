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

	$( "#signout" ).click(function() {
		firebase.auth().signOut();
		window.location.replace("index.html");
		//delete cookie?
	});

	var $container = $('#projectsWrap');
	$select = $('#filters select');

	$('.isotope').isotope({
  // options
  itemSelector: '.project-item',
  layoutMode: 'fitRows'
});


$select.change(function() {

	var filters = $(this).val();

		$container.isotope({
			filter: filters
		});

	});

	var $optionSets = $('#filters .option-set'),
		  	$optionLinks = $optionSets.find('a');

				$optionLinks.click(function(){

							var $this = $(this);
							// don't proceed if already selected
							if ( $this.hasClass('selected') ) {
						  		return false;
							}
						var $optionSet = $this.parents('.option-set');
						$optionSet.find('.selected').removeClass('selected');
						$this.addClass('selected');

						// make option object dynamically, i.e. { filter: '.my-filter-class' }
						var options = {},
							key = $optionSet.attr('data-option-key'),
							value = $this.attr('data-option-value');
						// parse 'false' as false boolean
						value = value === 'false' ? false : value;
						options[ key ] = value;
						if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
						  // changes in layout modes need extra logic
						  changeLayoutMode( $this, options )
						} else {
						  // otherwise, apply new options
						  $container.isotope( options );
						}

						return false;

					  });


});
