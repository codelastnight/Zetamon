<?php
/**
 * Template part for displaying posts preview
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saintsrobotics
 */

?>
<a class="div-hover" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
	 <div class="col-sm-6 col-lg-4  post-preview"  >
		 <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		 <div class="img-container" style=" background-image: linear-gradient(to bottom,rgba(50,233,234,0.0),rgba(0,0,0,0.7)), url('<?php echo $image[0]; ?>')">
		 <?php else: ?>
			 <div class="img-container" style=" background-image: linear-gradient(to bottom,rgba(50,233,234,0.0),rgba(0,0,0,0.7)), url('<?php echo $image[0]; ?>')">

<?php endif; ?>
			 <div class="content">
				 <div class="date-year">
					 2018
				 </div>
				 <div class="post-title">
					 <div class="date-day">
						 March 27-29
					 </div>
					 <h1 ><?php the_title(); ?></h1>

				 </div>

			 </div>
			 </div>

		 </div>

 </a>
