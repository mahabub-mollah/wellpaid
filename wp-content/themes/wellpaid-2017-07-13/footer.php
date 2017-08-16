<footer class="footer">
    <div class="ftrNav">
        <div class="container">
            <div class="ftrNav_cont">
                <div class="ftrLogo">
                <a href="<?php get_field('ftr_logo_url','option');?>"><img src="<?php $ftrlogoimage = get_field('footer_logo_image','option');echo $ftrlogoimage['url'];?>" alt="" /></a>
                </div>
                <div class="ftrMenu">
                <?php wp_nav_menu(array(
                        'theme_location' => 'secondary',
                        'fallback_cb'=>'wellpaid_fallback_menu',
                        'container'=>'',
                        'menu_class'=>'ftrMenu'
                         ));?>
                   <!-- <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Products Used</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Book Now</a></li>
                    </ul>-->
                </div>
                <div class="ftrLogo_rgt">
                    <a href="#"><img src="<?php echo get_template_directory_uri();?>/images/ftrImg2.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php the_field('copyright_text','option');?>
                </div>
                <div class="col-sm-6">
                    <div class="copyLogo">
                        <div class="copy_Company">
                        <?php if( have_rows('footer_repeater','option') ):
                       while ( have_rows('footer_repeater','option') ) : the_row();?>
                            <a href="<?php get_sub_field('repeater_image_url','option');?>"><img src="<?php $ftrmainlogoimage = get_sub_field('repeater_image','option');echo $ftrmainlogoimage['url'];?>" alt="" /></a>
                              <?php endwhile;endif;?>
                        </div>
                        <div class="copyShare">
                         <?php if( have_rows('ftr_icon','option') ):
                       while ( have_rows('ftr_icon','option') ) : the_row();?>
                            <a href="<?php the_sub_field('icon_url','option')?>"><i class="fa <?php the_sub_field('fantawesome_icon_name','option')?>" aria-hidden="true"></i></a>
                             <?php endwhile;endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</footer>


 <?php wp_footer();?>
</body>
</html>