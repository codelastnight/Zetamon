<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saintsrobotics
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">

		<?php
			the_title( '	<h1 class="entry-title text-huge">', '</h1>' );
			the_date('d F, Y','<h2 class="entry-meta text-medium">','</h2>');
			?>
			<?php
		if ( 'post' === get_post_type() ) :
			?>

		<?php endif; ?>
	</div><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'saintsrobotics' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		// wp_link_pages( array(
		// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'saintsrobotics' ),
		// 	'after'  => '</div>',
		// ) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-footer">
		<?php //saintsrobotics_entry_footer(); ?>
	</div><!-- .entry-footer -->
</article><!-- #post- <?php the_ID(); ?> -->
