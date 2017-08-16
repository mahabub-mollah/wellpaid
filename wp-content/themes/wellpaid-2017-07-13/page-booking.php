<?php get_header();?>

<section class="bnr_sec booking_sec" style="background:url(<?php $about_bg_image = get_field('about_banner_image','option'); echo $about_bg_image['url']; ?>) no-repeat center center / cover">
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

<div class="bookingBox">
    <div class="container">
        <div class="cmnHding">
            <h2><?php the_title();?></h2>
        </div>
        
        <div class="countBox">
            <div class="countBoxIn">
                <span class="countNmbr">1</span>
                <h6>Choose your <span>date and time</span></h6>
            </div>
            
            <div class="countBoxIn secondBox">
                <span class="countNmbr">2</span>
                <h6>pay <span>securely online</span></h6>
            </div>
                                
            <div class="countBoxIn">
                <span class="countNmbr">3</span>
                <h6><span>Cancel anytime</span></h6>
            </div>
                                
            <div class="countBoxIn lastBox">
                <span class="countNmbr">4</span>
                <h6><span>No hidden feese</span></h6>
            </div>
        </div>
        
        <div class="bookingForm">
            <div class="row">
                <div class="col-sm-5">
                    <div class="formInner">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="cmnInput">
                                        <label>Name</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="cmnInput">
                                        <label>Phone Number</label>
                                        <input class="form-control" type="tel">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="cmnInput">
                                        <label>Email</label>
                                        <input class="form-control" type="email">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="cmnInput">
                                        <label>Message</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="cmnInput">
                                        <label>Service Address</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="selectBox">
                                        <div class="cmnInput">
                                            <label>Service Type</label>                                            
                                            <div class="customSelect">
                                                <select>
                                                    <option>Service Type</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="cmnInput">
                                            <label>Frequency</label>                                          
                                            <div class="customSelect">
                                                <select>
                                                    <option>$20</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                            </div>
                                        </div>
                                  	</div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="cmnInput">
                                        <label>Frequency</label>
                                        <div class="calendar">
                                            <input class="form-control" type="text" id="datepicker">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="cmnInput">
                                        <label>Promo Code</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="cmnInput">
                                        <label>Payment Details</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                    
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-sm-7">
                    <div class="productBox">
                    <?php if( have_rows('booking_info','option') ):
                     while ( have_rows('booking_info','option') ) : the_row();?>
                        <div class="cmnPrdctBox">
                            <div class="boxLeft">
                                <img src="<?php $bookimg = get_sub_field('image','option');echo $bookimg['url'];?>" alt="">
                            </div>
                            <div class="boxRght">
                                <h3><?php the_sub_field('title','option');?></h3>
                                <?php the_sub_field('description','option');?>
                                <a class="cmnBtn" href="<?php the_sub_field('ancor_url','option');?>"><?php the_sub_field('ancor_text','option');?></a>
                            </div>
                        </div>
                         <?php endwhile;endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>