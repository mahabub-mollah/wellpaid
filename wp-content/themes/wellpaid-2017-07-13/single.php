<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="blogSec">
	<!-- start slider -->
	<div class="container">
	<div class="row">
			
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post()?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blogcmncontent">
    <div class="col-sm-3">
		    <div class="blogimg">
			<?php the_post_thumbnail(); ?>
			</div>
 </div>
    <div class="col-sm-9">
	<header class="entry-header">
		

		<?php the_title( sprintf( '<h2 class="entry-title"><a rel="bookmark">', null), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
 
	<?php the_content(); ?>
	</div>
    </div>
</article><!-- #post-## -->

			<!-- If comments are open or we have at least one comment, load up the comment template.-->
			<?php if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'wellpaid-2017-07-13' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', '' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'wellpaid-2017-07-13' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'wellpaid-2017-07-13' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'wellpaid-2017-07-13' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;
		?>

	</div>
	</div>
	

<?php get_footer(); ?>
