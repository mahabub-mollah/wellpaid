<?php get_header();?>

<section class="bnr_sec about_sec" style="background:url(<?php $about_bg_image = get_field('about_banner_image','option'); echo $about_bg_image['url']; ?>) no-repeat center center / cover">
    <div class="bnrWrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="bnr_title">About Us</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about_sec1" >
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="about_sec1Cont">
                    <div class="cmnHding">
                        <h2><?php the_field('about_misiion_title','option');?></h2>
                    </div>
                    <?php the_field('about_mission_description','option');?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="about_sec1Cont about_sec1RgtCont">
                    <div class="cmnHding">
                        <h2><?php the_field('standard_title','option');?></h2>
                    </div>
                    <?php the_field('standard_description','option');?>
                    <a class="cmnBtn" href="#">Click Here</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ourTeam">
    <div class="container">
        <div class="teamCont">
            <h2>Our Team</h2>
            <div class="teamContIn">
             <?php if( have_rows('team_info','option') ):
             while ( have_rows('team_info','option') ) : the_row();?>
                <div class="team_snglBox">
                    <div class="team_snglBoxIn">
                        <div class="team_Profile">
                            <div class="teamProImg">
                                <a href="#"><img src="<?php $teamimage = get_sub_field('image','option');echo $teamimage['url'];?>" alt="" /></a>
                            </div>
                            <a href="#"><?php the_sub_field('name','option');?></a>
                        </div>
                        <div class="teamProTxt">
                         <?php the_sub_field('description','option');?> 
                        </div>
                    </div>
                </div>
                 <?php endwhile;endif;?>
               </div>
        </div>
    </div>
</section>

<?php get_footer();?>