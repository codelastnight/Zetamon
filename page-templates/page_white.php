<?php 
/* Template Name: light mode*/

get_header(); ?>

  <div id="primary" class="site-content" style="background-color: #fcfbf9; color: #0c0c0c; min-height: 100vh; ">
    <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="" data-aos="fade">
              <div class="container-medium">
                <div class="row">
                    <div class="col-md-12">
                    <?php the_title( '<h1 class="text-huge page-title">', '</h1>' ); ?>
                    </div>
                </div>
            </div>

            <div class="entry-content" data-aos="fade">
               <div class="container-medium">
              <?php the_content(); ?>
              </div>

            </div><!-- .entry-content -->

          </article><!-- #post -->

      <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_footer(); ?>