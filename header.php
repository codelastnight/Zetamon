<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saintsrobotics
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/lib/aos/dist/aos.css'; ?>" />

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/sierra.css'; ?>" />

</head>

<body <?php body_class(); ?>>



	<header id="header-dynamic">

		<div class='header-mobile '>
			<button class="hamburger hamburger--elastic" type="button" aria-label="Menu" aria-controls="navigation" onclick="menuToggle(this)">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>

			</button> vv
		</div>
		<div class='header-overlay' data-aos="fade-in" aria-hidden="true">
      <?php wp_nav_menu(array('container' => '','walker'         => new Sublevel_Walker,)); ?>


			<div class='header-footer  ' >
				<div class='aligner-space-between'>
					<div>
					</div>
					<div class='contact'>
						<div>
							<a href="" class='button button-transparent'><i class="fab fa-youtube"></i></a>
							<a href="" class='button button-transparent'><i class="fab fa-instagram"></i></a>
							<a href="" class='button button-transparent '><i class="fab fa-facebook-f"></i></a>
						</div>
						<div>
							<a href="" class='button button-transparent '>contact</a>
						</div>

					</div>
				</div>


			</div>


		</div>

	</header>

	<header class="header-disable-dynamic-color disable-mobile">
		<div class='header-overlay'>
			<div class="main-logo" data-aos="fade-in">
				<a href=""><img src="<?php echo get_stylesheet_directory_uri().'/resources/logo.svg'; ?>" alt="svg not supported">
					<div class="text-vertical">
						TEAM 1899
					</div>
				</a>
			</div>
			<div class='header-footer ' >
				<div class='aligner-space-between'>
					<div class='copyright '>
						<div class=' aligner-item-bottom' >
							Copyright MMXVIII Interlake Saints Robotics
						</div>
					</div>
				</div>
			</div>
		</div>


	</header>



  <main>
