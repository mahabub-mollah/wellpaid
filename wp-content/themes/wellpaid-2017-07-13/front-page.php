<?php get_header();?>
<div class="slider_sec">
    <ul id="sliderCaro">
        <li class="single_slide" style="background-image:url(<?php $hmbaner_bg_image = get_field('banner_image','option'); echo $hmbaner_bg_image['url'];?>)"> 
            <div class="slide_item_table">
                <div class="slide_item_tableCell">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 noPaddingRight">
                                <div class="slideCap">
                                    <h3><?php the_field('banner_title','option');?></h3>
                                    <h2><?php the_field('banner_subtitle','option');?> </h2>
                                    <?php the_field('banner_description','option');?>
                                    <a class="cmnBtn" href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <!--<li class="single_slide slide_bg_1">
            <div class="slide_item_table">
                <div class="slide_item_tableCell">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 noPaddingRight">
                                <div class="slideCap">
                                    <h3>tesst</h3>
                                    <h2>As Good as New </h2>
                                    <p>Unam incolunt Belgae, aliam Aquitani, tertiam. Ullamco laboris nisi ut aliquid ex ea commodi consequat. Ambitioni dedisse scripsisse iudicaretur. </p>
                                    <a class="cmnBtn" href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>-->
    </ul>
</div>

<div class="ourMission">
    <div class="container">
   
     
        <div class="cmnHding">
            <h2><?php the_field('ourmission_title','option');?></h2>
        </div>
        <div class="missionBox">
            <?php the_field('ourmission_description','option')?>
            <a class="cmnBtn" href="#"><?php the_field('ourmission_ancor_text','option')?></a>
        </div>
   
    </div>
</div>

<div class="celaningBox" style="background:url(<?php $image = get_field('cleaning_bg_image','option');echo $image['url'];?>) no-repeat center top;">
    <div class="container">
            <h2><?php the_field('book_title','option');?></h2>
            <div class="cleanForm" id="book">
            
            
            <?php echo do_shortcode('[bookly-form show_number_of_persons="1"]');

            ?> 
               

            </div>
    </div>
</div>


<div class="approach_sec">
    <div class="container">
        <div class="approach_secCont">
            <div class="approach_contLft deskTopApprch">
                <div class="app_img">
                    <img src="<?php $image = get_field('approach_image','option');echo $image['url'];?>" alt="" />
                </div>
            </div>
            <div class="approach_contRgt">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cmnHding">
                            <h2><?php the_field('approach_title','option');?></h2>
                        </div>
                        <div class="missionBox">
                          <?php the_field('approach_description','option');?> 
                        </div>
                    </div>
                </div>
                <div class="single_appWrap">

                        <?php if( have_rows('approach_repeater_image','option') ):

                            while ( have_rows('approach_repeater_image','option') ) : the_row();?>
                      <div class="single_approach margin33">
                      <img src="<?php $repeaterimage = get_sub_field('aproach_repeater_images','option');echo $repeaterimage['url'];?>"/>

                        <h5><?php the_sub_field('approach_repeater_images_title','option');?></h5>
                     </div>
                     <?php endwhile;endif;wp_reset_query();?>
                </div>
            </div>
            <div class="approach_contLft mobileApprch">
                <div class="app_img">
                    <img src="<?php echo get_template_directory_uri();?>/images/woman.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mediaBox">
    <div class="container">
        <div class="cmnHding">
            <h2>Media</h2>
        </div>
        <div class="mediaBox_In">
            <div class="mediaBox_Inner">
                <?php
                 query_posts(array(
                'post_type'=>'medianews',
                 'posts_per_page'=>-1,
                'order'=>'ASC'
                 ));
                while (have_posts() ) :
                the_post();?>
                            
                <div class="cmnMediaBox">
                    <div class="mediaImg">
                        <?php the_post_thumbnail('media-image');?>
                    </div>
                    <div class="mediaText">
                        <a class="news" href="<?php the_permalink()?>"><?php the_title();?></a>
                        <span><?php the_time( get_option( 'date_format' ) ); ?></span>
                        <?php the_excerpt();?>
                    </div>
                </div>
            <?php endwhile;wp_reset_query();?>
                
                
            </div>
        </div>
    </div>
</div>

<div class="testimonials" style="background:url(<?php echo get_template_directory_uri()?>/images/testomials_bg.jpg) no-repeat;">
    <div class="container">
        <h2><?php the_field('testimonial_title','option');?></h2>
        <div class="test_contBox">
        <?php if( have_rows('testimonial_repeater_field','option') ):
       $i=0;
        while ( have_rows('testimonial_repeater_field','option') ) : the_row();
        
         if($i%2 == 0){
			 $testi_class = 'test_contLft';
		 }else{
			 $testi_class = 'test_contRgt';
		 }
        ?>

            <div class="<?php echo $testi_class; ?>">
                <div class="test_lftContIn">
                    <div class="test_lftContIn_Img">
                        <img src="<?php $testimonialimage = get_sub_field('client_image','option');echo $testimonialimage['url'];?>" alt="" />
                    </div>
                    <div class="test_lftContIn_txt">
                        <h6><?php the_sub_field('client_name');?></h6>
                    </div>
                </div>
                <?php the_sub_field('client_praising');?>
            </div>
        <?php 
        $i++;
         endwhile;endif;?>
        
            
        </div>
    </div>
</div>


<?php get_footer();?>