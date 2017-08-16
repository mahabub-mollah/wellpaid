<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

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
	
<?php the_category( ', ' ); ?>

	</div>
    </div>
	

	
</article><!-- #post-## -->



