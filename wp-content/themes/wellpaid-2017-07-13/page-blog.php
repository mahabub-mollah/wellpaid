<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage wellpaid-2017-07-13
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<section class="blogSec">
	<!-- start slider -->
	<div class="container">
	<div class="row">

	<?php if ( have_posts() ) :?> 

			<?php echo get_the_title();?>



                     <?php $ebit_post = null;
                      $ebit_post = new WP_Query(array(

                        'post_type'=>array('medianews', 'post'),
                        'posts_per_page'=>-1,
                        //'team_newsmedia'=>'blog,news,press',
                        


                        ));
                       if ($ebit_post->have_posts() ) :
                       while ($ebit_post->have_posts() ) :$ebit_post ->the_post();?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blogcmncontent">
    <div class="col-sm-3">
		    <div class="blogimg">
			<?php the_post_thumbnail('blog-image'); ?>
			</div>
 </div>
    <div class="col-sm-9">
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'wellpaid-2017-07-13' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink())), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
 
	<?php the_excerpt(); ?>
	<a class="blogcmnBtn" href="<?php the_permalink();?>">Know More</a>
	<?php the_time( get_option( 'date_format' ) ); ?>

   <!--<h4><?php $terms = get_terms("blog"); $count = count($terms); if ( $count > 0 ){ foreach ( $terms as $term ) { echo $term->name; } } ?> Blog</h4>-->
   <?php the_category( ', ' ); ?>

<?php echo get_the_term_list( $post->ID, 'team_newsmedia', 'cat: ', ', ' ); ?>
	</div>
    </div>
	

	
</article><!-- #post-## -->


			          <?php endwhile;
			          // Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'wellpaid-2017-07-13' ),
				'next_text'          => __( 'Next page', 'wellpaid-2017-07-13' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wellpaid-2017-07-13' ) . ' </span>',
			) );

			           endif;?>

		
			<?php
			// Start the loop.


		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;

		?>

		
</div>
</div>
</section>

<?php get_footer(); ?>
