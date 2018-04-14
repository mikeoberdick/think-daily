//Automatically generate filler content height to ensure footer is on bottom of the page
jQuery(document).ready(function() {
	jQuery('#js-heightControl').css('height', jQuery(window).height() - jQuery('html').height() +'px');
});

//Dropdown on hover
jQuery('ul.navbar-nav li.dropdown').hover(function() {
	jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
	jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

//Archive dropdown functionality to send to correct page
jQuery(document).ready(function() {
	jQuery('#archiveDropdown').on('change', function(){
	    var month = jQuery('#month').val();
	    var year = jQuery('#year').val();
	    jQuery('#archiveFormSubmit').attr('href', '/' + year + '/' + month);
	});
});

//Archive dropdown functionality for business blog
jQuery(document).ready(function() {
	jQuery('#businessArchiveDropdown').on('change', function(){
	    var month = jQuery('#month').val();
	    var monthNum = ('0' + month).slice(-2);
	    var year = jQuery('#year').val();
	    jQuery('#archiveFormSubmit').attr('href', '/' + year + '/' + monthNum + '/?category_name=think-daily-for-businesspeople');
	});
});

//Post Slider in Modal
  jQuery('.postLauncher').click( function() {
      jQuery('.carousel-item').removeClass('active');
      var count = jQuery(this).data("count");
    jQuery('.carousel-item').eq(count).addClass('active');
  });