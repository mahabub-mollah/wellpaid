<?php
/* theme support*/


function wellpaid_theme_support(){

add_theme_support('post-thumbnails');
 add_image_size('media-image',400,300,true);
 add_image_size('blog-image',400,300,true);

 
 register_nav_menus(array(

 	'wellpaid_menu'=>'Wellpaid Menu',
 	'wellpaid_footer_menu'=>'Wellpaid Footer Menu',
 ));
}
add_action('after_setup_theme','wellpaid_theme_support');


add_action( 'after_setup_theme', 'register_my_menu' );



function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'register_my_menu1' );
function register_my_menu1() {
  register_nav_menu( 'secondary', __( 'Srimary Menu', 'theme-slug' ) );
}


function wellpaid_fallback_menu(){
echo'<ul class="nav navbar-nav">';
	
echo'<li><a href="'.esc_url(home_url()).'">Home Wellpaid</a></li>';
echo'</ul>';
}

/* Defining first and last li class for specifying...  

/function add_first_and_last($items){

	
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'cmnBtn  bookbtn
    ';
    return $items;
    
    

add_filter('wp_nav_menu_objects', 'add_first_and_last');
}
*/


/*   enqueue script and style*/

function well_paid_scripts() {
	
	wp_enqueue_style( 'slick',get_template_directory_uri().'/css/slick.css',array(), null );

	

wp_enqueue_style( 'slick-theme', get_template_directory_uri().'/css/slick-theme.css' , array(), '1.0' );
	
wp_enqueue_style( 'animate-css', get_template_directory_uri().'/css/animate.css' , array(), '1.0' );


  wp_enqueue_style( 'jquery-ui', get_template_directory_uri().'/css/jquery-ui.css' , array(), '1.0' );

  wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' , 
  	array( ), '1.0' );

  wp_enqueue_style('themestyle', get_stylesheet_uri() );

  wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive.css' , array(), '1.0' );

    wp_enqueue_script('jquery' );
	

	wp_enqueue_script( 'jq-min', get_template_directory_uri().'/js/jquery.min.js', array(), '1.0', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui.js', array(), '1.0', true );
	
	wp_enqueue_script( 'slick-min', get_template_directory_uri().'/js/slick.min.js', array(), '1.0', true );
	
	wp_enqueue_script( 'main-js', get_template_directory_uri().'/js/main.js', array(), '1.0', true );
	
	wp_enqueue_script( 'jq-min', get_template_directory_uri().'/js/jquery.min.js', array(), '1.0', true );
	}	
add_action( 'wp_enqueue_scripts', 'well_paid_scripts' );



/*   ACF THEME OPTIONS  */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Home  Settings',
		'menu_title'	=> 'Home',
		'menu_slug' 	=> 'our-mission',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home banner',
		'menu_title'	=> ' Home banner',
		'parent_slug'	=> 'our-mission',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Mission',
		'menu_title'	=> ' Mission',
		'parent_slug'	=> 'our-mission',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Booking',
		'menu_title'	=> ' Booking',
		'parent_slug'	=> 'our-mission',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Approach',
		'menu_title'	=> ' Approach',
		'parent_slug'	=> 'our-mission',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Testimonial',
		'menu_title'	=> ' Testimonial',
		'parent_slug'	=> 'our-mission',
	));


	acf_add_options_page(array(
		'page_title' 	=> 'Product used',
		'menu_title'	=> 'Product used',
		'menu_slug' 	=> 'product-used',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'product used',
		'menu_title'	=> ' product used',
		'parent_slug'	=> 'product-used',
	));
	acf_add_options_page(array(
		'page_title' 	=> 'About Us',
		'menu_title'	=> 'About Us',
		'menu_slug' 	=> 'about-us',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'about mission standard',
		'menu_title'	=> ' about mission standard',
		'parent_slug'	=> 'about-us',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Team',
		'menu_title'	=> ' Team',
		'parent_slug'	=> 'about-us',
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Book',
		'menu_title'	=> 'Book',
		'menu_slug' 	=> 'book',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Logo Image',
		'menu_title'	=> 'Logo',
		'menu_slug' 	=> 'logo',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> ' Footer Logo Image',
		'menu_title'	=> 'Footer Logo',
		'menu_slug' 	=> 'footerlogo',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'footer copy right',
		'menu_title'	=> 'footer copy right ',
		'parent_slug'	=> 'footerlogo',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'footer icon right',
		'menu_title'	=> 'footer icon right ',
		'parent_slug'	=> 'footerlogo',
	));

	
}









include_once('inc/wellpaid_custom_post.php');