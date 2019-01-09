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

function frontPageContent($pagename,$alignment ='align-left',$headercss='',$image_hero=false,$imagelist=false, $overrideFormat=false) {
  $your_query = new WP_Query( 'pagename=about/'.$pagename );
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
			

   
  if ($overrideFormat=false) { ?> <div class="row"> <?php } ?>
     
    <div data-aos="fade-up" class='<?=$alignment?>'>
      <?php
      the_title('<h1 class="text-huge'.$headercss.' " id='.$pagename.'>', '</h1>' );
      echo get_first_paragraph($content);
      ?>
      <a class="button button-secondary" href="<?=the_permalink() ?>">Learn more</a>
    </div>
    
    <?php
    if ($overrideFormat=false) { ?> </div> <?php }
    
    if ($imagelist==true) {
        ?>
          <div class="row border-top border-bottom">
          <div class="image-list" data-aos="fade-up" >
        <?php
           imagelist($content);
       ?>
         </div> 
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
    <div class="swiper-container">
            <div class="swiper-wrapper">
              <?php the_featured_image_gallery(); ?>
            </div>
        </div>
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
        <div class="col-md-12" data-aos="fade-up" data-aos-mirror="true">
          <div class="landing-logo"   >
            <a href="#trigger-menu"> who are we
              <div class='arrow-big'>

              </div>
            </a>
          </div>

        </div>
      </div>

    </div>
    <div class="section landing-footer"  data-aos="fade-up" data-aos-offset="0" data-aos-mirror="true">

      <!--<div class="caption">-->
      <!--  <h5> image caption</h5>-->
      <!--  <p>-->
      <!--    doing stuff i guess lol-->
      <!--  </p>-->
      <!--  <div class="swiper-container" >-->
      <!--    <div class="swiper-pagination"></div>-->
      <!--  </div>-->
      <!--</div>-->
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
      

      <div class="row is-flex">
        <div class="section">
        <div class="col-md-5 col-md-offset-1 ">

             <?php
               frontPageContent("about-us","align-right",$overrideFormat=true)
             ?>
           </div>
        <div class="col-md-6">
            <div id="gmap"  data-aos="fade-up" class="div-round gmap ">
              <iframe async defer src="" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

        </div>
      </div>
      </div>
    </section>
  </div>
  <div class="section hero hero-background" style="
              background-image:  linear-gradient(to left,rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url('<?php echo get_stylesheet_directory_uri().'/resources/1.jpg'; ?>');
            ">
      <div class="container">
         <section class="section">
          <div class="row">
            <div class="col-md-6">
            
             
                <img src="<?php echo get_stylesheet_directory_uri().'/resources/SHARE.png' ?>" />
            
              
            </div>
            <div class="col-md-6 ">
                 <?php  frontPageContent("community","align-left"," text-with-subtitle",$overrideFormat=true) ?>
            </div>
           </div>
        </div>
      </div>
  </div>
  <div class='container'>
    <section class="section">

      
        <?php
        frontPageContent("organization","col-md-6") ?>

    </section>
  </div>

  <div class="section hero-light" style="">
      <div class="container">
        
          <?php  frontPageContent("sponsors","align-center col-md-6 col-md-offset-3"," text-with-subtitle",false, true) ?>
        
      </div>
  </div>

    <section class="section hero-light">
        <div class='container border-top'>
      <hr>
      
        <?php
        frontPageContent("about-first", "align-center  col-md-8 col-md-offset-2") ?>
      </div>
    </section>
  </div>

</div>

<script src="<?php echo get_stylesheet_directory_uri().'/js/homepage.js'; ?>" async ></script>

<?php

get_footer();
?>
