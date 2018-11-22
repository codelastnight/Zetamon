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
	 <div class="col-sm-6 col-lg-6 post-preview"  >
		 <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		 <div class="img-container post-container" style=" background-image: linear-gradient(to bottom,rgba(50,233,234,0.0),rgba(0,0,0,0.7)), url('<?php echo $image[0]; ?>')">
		 <?php else: ?>
			 <div class="img-container post-container" style=" background-image: linear-gradient(to bottom,rgba(0,0,0,0.2),rgba(0,0,0,0.7)), url('<?php echo get_stylesheet_directory_uri().'/resources/placeholder.jpg'; ?>')">

			<?php endif; ?>
			 <div class="content">

					 <?php
					 $full_date = the_date('Y, F d', '', '', FALSE);
					 $my_date = explode(",", $full_date);

					 ?>
					 <div class="date-year">
						 <?php echo $my_date[0]; ?>
					 </div>

				 <div class="post-title">
					 <div class="date-day">
						 <?php echo $my_date[1]; ?>
					 </div>
					 <h1 ><?php the_title(); ?></h1>

				 </div>

			 </div>
			 </div>

		 </div>

 </a>
