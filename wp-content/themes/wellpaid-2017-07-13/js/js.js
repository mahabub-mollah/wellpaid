$(document).on('click', 'a', function($){
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
});



jQuery(document).ready(function($) {
	$('.reviewSlider ul').slick({
		dots: false,
		slidesToShow: 1,
		slidesToScroll: 1,		
		autoplay: true,
		fade: true
	});
	
	$('.teamSlider ul').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 639,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});
	
    //Select box
    //if( !$.browser.opera ){
    $('.customSelect select').each(function() {
        var title, cls = 'select-esa';
        title = ($('option:selected', this).length > 0) ? $('option:selected', this).text() : $('option:eq(0)', this).text();
        //title = '';
        $(this)
        .addClass('transparent') //css({'opacity':0,'-khtml-appearance':'none'})
        .after('<span class="' + cls + '"><b><em>' + title + '</em></b></span>')
        .change(function() {
            val = ($('option:selected', this).length > 0) ? $('option:selected', this).text() : $('option', this).eq(0).text();
            $(this).next().find('em').text(val);
        }).hover(function() {
            $(this).next('span.' + cls).toggleClass(cls + '_hover')
        });
    });
    //}
	
	$('.playBtn').fancybox();
});