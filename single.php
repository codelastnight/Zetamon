<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package saintsrobotics
 */

get_header();
?>
	<div class=" " data-aos="fade"></a>
		<!-- <a href="" class='button button-transparent'><span class="glyphicon glyphicon-chevron-left"></span> Back</a> -->
		<div class="  post-single post-container container">
			<?php
			while ( have_posts() ) :
				the_post();
				if (has_post_thumbnail( $post->ID ) ): {
					$imagea = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$image = $imagea[0];
				} else: {
					$image = get_stylesheet_directory_uri().'/resources/placeholder.jpg';
				}
					endif; ?>

		 		 <div class="CoverImage FlexEmbed FlexEmbed--3by1" style=" background-image: url('<?php echo $image; ?>')"></div>
				<?php

				get_template_part( 'template-parts/content', get_post_type() );

				//the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					//comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>

	</div>




<?php
get_sidebar();
get_footer();
