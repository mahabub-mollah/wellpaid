






$(document).ready(function () {
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
	if ($('#sliderCaro').length > 0) {
		$('#sliderCaro').slick({
			autoplay: true,
			slidesToScroll: 1,
			autoplaySpeed: 3000,
			slidesToShow: 1
		});
	}

    /*=======================================================================
     MOBILE MENU
     =========================================================================*/
    if ($('.mobileMenu').length > 0) {
        $('.mobileMenu').on('click', function () {
            $(this).toggleClass('active');
            $('.top_menu > ul').slideToggle('slow');
        });
        if ($(window).width() < 767)
        {
            $('.top_menu > ul li.has-menu-items > a').on('click', function (e) {
                e.preventDefault();
                $(this).parent().toggleClass('active');
//                $(this).parent().children('.sub-menu').slideToggle('slow');
            });
        }
    }
	
	$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "images/calendar.png",
		buttonImageOnly: true,
		buttonText: "Select date"
	});
});