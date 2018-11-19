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
function frontPageContent($pagename,$alignment ='') {
  $your_query = new WP_Query( 'pagename='.$pagename );
  // "loop" through query (even though it's just one page)
  while ( $your_query->have_posts() ) : $your_query->the_post();
      ?><div class='<?=$alignment?>'>
        <?php
      the_title('<h1 class="text-huge " id='.$pagename.'>', '</h1>' );
      the_content();
      ?>
      <button class="button button-secondary" href="#">Learn more</button>

    </div><?php
  endwhile;
  // reset post data (important!)
  wp_reset_postdata();
}
function frontPageContentLight($pagename,$alignment ='') {
  $your_query = new WP_Query( 'pagename='.$pagename );
  // "loop" through query (even though it's just one page)
  while ( $your_query->have_posts() ) : $your_query->the_post();
      ?><div class='<?=$alignment?>'>
        <?php
      the_title('<h1 class="text-huge text-with-subtitle" id='.$pagename.'>', '</h1>' );
      the_content();
      ?>
      <button class="button button-secondary" href="#">Learn more</button>

    </div><?php
  endwhile;
  // reset post data (important!)
  wp_reset_postdata();
}
get_header(); ?>
<div id="home" class="landing">
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

<div class="about-page">
  <div class='container'>

    <section class="section" id="trigger-menu" >
      <div class="section">

  <div class="row">
    <div class="col-md-12">
    <?php
  frontPageContent("about-us")
      ?>
      </div>
    </div>
  </section>
</div>
<div class="section hero-light" >
    <div class="container text-center">
        <h3 class="text-huge text-white text-with-subtitle">We can be heroes</h3>
        <h4 class="text-big text-gray">just for one day</h4>
    </div>
</div>
<div class='container '>
  <section class="section ">

      <div class="row is-flex">
        <div class="col-md-5 ">

        <?php
            frontPageContent("about-us","align-right")
        ?>

        </div>
        <div class="col-md-7">

            <div class="div-round gmap ">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d672.2916398599913!2d-122.11685113967444!3d47.62289350181041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906dbdfa0f55b7%3A0x35a096d8775d8148!2sNorthup+Way+%26+168th+Ave+NE!5e0!3m2!1sen!2sus!4v1542588102080" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>

        </div>
      </div>
      </div>
    </section>
  </div>
  <div class="section hero-light" style="">
      <div class="container">
        <?php  frontPageContentLight("community-outreach","align-center") ?>
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
