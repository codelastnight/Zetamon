<?php
/* Template Name: posts timeline*/

get_header();
?>
//search bar
	<div class="container">
		<section>

gggfhghfgfh

		</section>

</div>

<div class="container">
	<div class="row post-list-flex">
		<!-- Start the Loop. -->
		 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		 	<!-- Test if the current post is in category 3. -->

		 	<?php// if ( in_category( '3' ) ) : ?>
		 	<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
		
		
		 	<!-- Display the Post's content in a div box. -->
		
		 	<a class="div-hover" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <div class="col-sm-6 col-lg-4  post-preview"  >
            <div class="img-container" style=" background-image: linear-gradient(to bottom,rgba(50,233,234,0.0),rgba(0,0,0,0.7)), url('resources/1.jpg')">

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

		
		<?php// endif; ?>
		
		
		 	<!-- Stop The Loop (but note the "else:" - see next line). -->
		
		 <?php endwhile; else : ?>
		
		
		 	<!-- The very first "if" tested to see if there were any Posts to -->
		 	<!-- display.  This "else" part tells what do if there weren't any. -->
		 	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		
		
		 	<!-- REALLY stop The Loop. -->
		 <?php endif; ?>
	</div>
</div>
			<?php

get_footer();
