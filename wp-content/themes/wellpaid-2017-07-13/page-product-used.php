<?php get_header();?>

<section class="bnr_sec" style="background:url(<?php echo get_template_directory_uri();?>/images/banner/1.jpg) no-repeat center center / cover" >
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

<div class="proUsed_sec">
    <div class="container">
        <div class="cmnHding">
            <h2><?php the_field('usedproduct_main_title','option');?></h2>
        </div>
        <div class="missionBox">
           <?php the_field('productused_description','option');?> 
        </div>
        <div class="prousedWrap">
            <div class="row">
              <?php if( have_rows('productused_repeater','option') ):

                            while ( have_rows('productused_repeater','option') ) : the_row();?>
                <div class="col-sm-4">
                    <div class="single_usedPro">
                        <div class="usedPro_thumb">
                            <a href="<?php the_sub_field('used_product_img_url','option');?>"><img src="<?php
                            $usedproduct_images = get_sub_field('usedproduct_image','option'); echo  $usedproduct_images['url'];

                            ;?>" alt="" /><a>
                        </div>
                        <h3><a href="<?php the_sub_field('usedproduct_title_url','option');?>"><?php the_sub_field('usedproduct_title','option');?></a></h3>
                        <a href="<?php the_sub_field('usedproduct_sub_title_url','option');?>"><span><?php the_sub_field('usedproduct_sub_title','option');?></span></a>
                    </div>
                </div>
                <?php endwhile;endif;wp_reset_query();?>
            </div>
        </div>                
    </div>
</div>

<?php get_footer();?>