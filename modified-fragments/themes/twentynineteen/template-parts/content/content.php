<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'twentynineteen' ) );
		}
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<?php twentynineteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?>

		<?php
			$args = array(
			'post_type' => 'post',
			'posts_per_page' => '4',
			'post__not_in' => array( $post->ID )
			);
			// the query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) { ?>

				<section class="recent-posts clear">

					<?php while ( $query->have_posts() ) : $query->the_post() ; ?>
				
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'left' ); ?>>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_title(); ?>
							</a>
						</article>

					<?php endwhile; ?>
			
				</section>
			
			<?php }
			/* Restore original Post Data */
			wp_reset_postdata();
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentynineteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-${ID} -->
