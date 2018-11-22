$(document).ready(function(){
	$(window).scroll(function(){
		var scrollTop = $(this).scrollTop();
		if( !$('.gallery1').hasClass('animated') && scrollTop >= 400 ) {
			$('.gallery1').addClass('animated fadeInRight');
		}
		if( !$('.gallery2').hasClass('animated') && scrollTop >= 600 ) {
			$('.gallery2').addClass('animated fadeInLeft');
		}
	});
});