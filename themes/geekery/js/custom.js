jQuery(document).ready(function() {
	
	if( geekeryScriptParam.geekery_image_link == ''){
		var divheight = jQuery('.header-wrap').height()+'px';
		jQuery('body').css({ "margin-top": divheight });
	}
	jQuery("#slider-wrap").owlCarousel({
		autoPlay: 3000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true
	});
});
