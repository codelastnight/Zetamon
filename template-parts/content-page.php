<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saintsrobotics
 */

?>

<article class="pages "id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">
		<?php the_title( '<h1 class="text-huge page-title">', '</h1>' ); ?>
		</div>

	<?php saintsrobotics_post_thumbnail(); ?>
<div class="container">
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'saintsrobotics' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'saintsrobotics' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
		</div>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
