<?php
/**
 *  The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saintsrobotics
 */
function frontPageContent($pagename) {
  $your_query = new WP_Query( 'pagename='.$pagename );
  // "loop" through query (even though it's just one page)
  while ( $your_query->have_posts() ) : $your_query->the_post();
      the_title('<h1 class="text-huge" id='.$pagename.'>', '</h1>' );
      the_content();
  endwhile;
  // reset post data (important!)
  wp_reset_postdata();
}
get_header(); ?>
<div id="home"class="landing">
  <div class="image-slider">
  <?php
  $shortcode = get_theme_mod('landing_slider_shortcode', 'none');
  echo do_shortcode('[swiper_slider id='.$shortcode.']'); ?>

  </div>
  <?php
  $messageHidden = "";
  $messageColor = get_theme_mod('landing_message_style', 'none');
  $messageData = get_theme_mod('landing_message', '');
  if ($messageColor == "none") {
     $messageHidden = "aria-hidden='true'";
  };
?>
  <div class="absolute-top " <?= $messageHidden ?>>
    <div class="container">
      <div class="section">

      <div class="message-bar background-<?= $messageColor ?>" <?= $messageHidden ?>><p ><?= $messageData?></p><a href="#" class='close-div'><span class="glyphicon glyphicon-remove" ></span></a></div>
      </div>
    </div>
  </div>
  <div class="container center-vertical">


    <div class="section ">
      <div class="">
      <div class="row ">
        <div class="col-md-6 ">
          <div class="landing-logo">

            <p>INTERLAKE</p>

            <p>SAINTS</p>

            <p>ROBOTICS</p>
          </div>
        </div>
          <div class="col-md-6 hidden-xs hidden-sm">
            <ul id="events-upcoming">
            </ul>
      </div>
      </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="landing-logo">
            <a href="#trigger-menu"> who are we
              <div class='arrow-big'>

              </div>
            </a>
          </div>

        </div>
      </div>

    </div>
    <div class="section landing-footer">

      <div class="caption">
        <h5> image caption</h5>
        <p>
          doing stuff i guess lol
        </p>
        <div class="swiper-container">
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <div class="scroll-btn">
        <a href="#trigger-menu">
          <div class="text-vertical">
            SCROLL
          </div>
          <div class="vertical-line">

          </div>
        </a>
      </div>

    </div>
  </div>
</div>


<div class='container'>
  <section class="section" id="trigger-menu">

  <div class="row">
    <div class="col-md-12">
    <?php
  frontPageContent("about-us")
      ?>
      </div>
    </div>
  </section>
</div>
<div class="section hero-light" style="">
    <div class="container text-center">
        <h3 class="text-huge text-with-subtitle">We can be heroes</h3>
        <h4 class="text-big">just for one day</h4>
    </div>
</div>
<div class='container '>
  <section class="section ">

  <div class="row">
    <div class="col-md-12">
    <?php
    frontPageContent("community-outreach") ?>
      </div>
    </div>
  </section>
</div>
<div class='container'>
  <section class="section">
  <div class="row">
    <div class="col-md-12">
      <?php
      frontPageContent("organization") ?>
      </div>
    </div>
  </section>
</div>
<div class='container'>
  <section class="section">

  <div class="row">
    <div class="col-md-12">
      <?php
      frontPageContent("sponsors") ?>
      </div>
    </div>
  </section>
</div>


</div>
<script>
jQuery(document).ready(function($) {
  $('.menu-item-home > a').attr("href", "#trigger-menu");
})
</script>
<?php

get_footer();
?>
