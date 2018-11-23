<?php
/* Template Name: posts timeline*/

get_header();
?>

<article class="pages "  id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="container" data-aos="fade">
		<?php the_title( '<h1 class="text-huge page-title">', '</h1>' ); ?>
		</div>


  <div class="container">

    <div id="calendar" class="calendar-full">
  </div>
	<div class="container "data-aos="fade" data-aos-offset="50">
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
<script src="<?php echo get_stylesheet_directory_uri().'lib/fullcalendar/dist/fullcalendar.js'; ?>" defer></script>
<script src="<?php echo get_stylesheet_directory_uri().'lib/fullcalendar/dist/gcal.js'; ?>" defer></script>
<?php

get_footer();
