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

function imagelist($html) {
  // remove <noscript> elements from html
  $html = preg_replace("/<noscript[^>]*>(.*?)<\/noscript>/i", " ", $html);  
  preg_match_all('/<img[^>]+>/i',$html, $result); 
   
   
  if ( !$result == null ) {
   
    $img = array();
    foreach ($result as $img_tag) {
      
      foreach ($img_tag as $b) {
       preg_match_all('/(src)=("[^"]*")/i',$b, $img[$b]);
      }
      
    }
   
    foreach ($img as $value) {
      
     // foreach($value as $a) {
        //print_r($value[0][0]);
        ?>
        <div class="resize">
        <img <?=$value[0][0];?> />
        </div>
        <?php
     // }
    }
  }
}

function frontPageContent($pagename,$alignment ='align-left',$headercss='',$image_hero=false,$imagelist=false) {
  $your_query = new WP_Query( 'pagename='.$pagename );
  // "loop" through query (even though it's just one page)
  while ( $your_query->have_posts() ) : $your_query->the_post();
  ob_start();
  the_content();
  $content = ob_get_clean();
  
    if (has_post_thumbnail( $post->ID ) && $image_hero==true ): {
				$imagea = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				$image = $imagea[0];
			} else: {
				$image_hero=false;
			}
			endif;
			

   

    ?>
    <div data-aos="fade-up" class='<?=$alignment?>'>
      <?php
      the_title('<h1 class="text-huge'.$headercss.' " id='.$pagename.'>', '</h1>' );
      echo get_first_paragraph($content);
      ?>
      <a class="button button-secondary" href="<?=the_permalink() ?>">Learn more</a>

    </div>
    <?php
    if ($imagelist==true) {
        ?>
          <div class="image-list" data-aos="fade-up" >
        <?php
           imagelist($content);
       ?>
         </div> 
     <?php
    }
    
  endwhile;
  // reset post data (important!)
  wp_reset_postdata();
}


get_header(); ?>
<div id="home" class="landing"  >
  <div class="image-slider"  data-aos="fade" data-aos-offset="0" >
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
            <p  data-aos="fade-right" data-aos-mirror="true">INTERLAKE</p>

            <p  data-aos="fade-right"  data-aos-delay="50" data-aos-mirror="true">SAINTS</p>

            <p  data-aos="fade-right"  data-aos-delay="100" data-aos-mirror="true">ROBOTICS</p>
          </div>
        </div>
          <div class="col-md-6 hidden-xs hidden-sm">
            <ul id="events-upcoming">
            </ul>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="landing-logo"  data-aos="fade-up" data-aos-mirror="true" >
            <a href="#trigger-menu"> who are we
              <div class='arrow-big'>

              </div>
            </a>
          </div>

        </div>
      </div>

    </div>
    <div class="section landing-footer"  data-aos="fade-up" data-aos-offset="0" data-aos-mirror="true">

      <div class="caption">
        <h5> image caption</h5>
        <p>
          doing stuff i guess lol
        </p>
        <div class="swiper-container" >
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <div class="scroll-btn">
        <a href="#trigger-menu">
          <div class="text-vertical">
            SCROLL
          </div>
          <div class="vertical-line hidden-xs">

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

      <div class="row is-flex">
        <div class="col-md-5 col-md-offset-1 ">

             <?php
               frontPageContent("about-us","align-right")
             ?>
           </div>
        <div class="col-md-6">
            <div  data-aos="fade-up" class="div-round gmap ">
              <iframe async defer src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d672.2916398599913!2d-122.11685113967444!3d47.62289350181041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906dbdfa0f55b7%3A0x35a096d8775d8148!2sNorthup+Way+%26+168th+Ave+NE!5e0!3m2!1sen!2sus!4v1542588102080" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

        </div>
      </div>
      </div>
    </section>
  </div>
  <div class="section hero-light" style="">
      <div class="container">
        <?php  frontPageContent("community-outreach","align-center"," text-with-subtitle") ?>
      </div>
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

  <div class="section hero-light" style="">
      <div class="container">
        <?php  frontPageContent("sponsors","align-center"," text-with-subtitle",false, true) ?>
      </div>
  </div>
  <div class='container'>
    <section class="section">
    <div class="row">
      <div class="col-md-12">
        <?php
        frontPageContent("about-first") ?>
        </div>
      </div>
    </section>
  </div>

</div>


<script>
//menu click change
jQuery(document).ready(function($) {
  $('.menu-item-home > a').attr("href", "#trigger-menu").html("about");
  
  $(document).scroll(function() {
   if($(window).scrollTop() <= 40) {
     $('.menu-item-home > a').attr("href", "#trigger-menu").html("about");
   }
  });
})
document.addEventListener('aos:in:about', (function( detail ){
  if($(window).scrollTop() >= 40) {
  jQuery('.menu-item-home > a').html("home").attr("href", "#home");
}
}));
</script>
<?php

get_footer();
?>
