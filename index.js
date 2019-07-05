jQuery(document).ready( function($) {

	// Slideshow settings.
	$('.acf-slideshow').slick({
		autoplay:true,
		dots: true,
		speed:1000,
		responsive:[
			{
				breakpoint: 1024,
				settings:{
					arrows:true,
				}
			},
			{
				breakpoint: 1023,
				settings:{
					arrows:false,
				}
			},
		]
	});

} );