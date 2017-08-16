<?php get_header();



/*

template name: For contact




*/
?>


<section class="bnr_sec about_sec" style="background:url(<?php $about_bg_image = get_field('about_banner_image','option'); echo $about_bg_image['url']; ?>) no-repeat center center / cover">
    <div class="bnrWrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="bnr_title"><?php the_title();?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blogSec">
	<!-- start slider -->
	<div class="container">
	<div class="row">

        <div id="contactinfo">
        	<h1>021456987</h1>
        	<h1>Makhf@yahoo.com</h1>
        </div>
	</div>
	</div>
	</section>

<?php get_footer();?>