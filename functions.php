<?php
/**
 * saintsrobotics functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package saintsrobotics
 */

if (!function_exists('saintsrobotics_setup')): /**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    function saintsrobotics_setup()
    {   
        //add_action('wp_enqueue_scripts', 'no_more_jquery');
        
        function front_page_gallery($atts) {
        	
        	global $post;
        	$pid = $post->ID;
        	$gallery = "";
        
        	if (empty($pid)) {$pid = $post['ID'];}
        
        	if (!empty( $atts['ids'] ) ) {
        	   	$atts['orderby'] = 'post__in';
        	   	$atts['include'] = $atts['ids'];
        	}
        
        	extract(shortcode_atts(array('orderby' => 'menu_order ASC, ID ASC', 'include' => '', 'id' => $pid, 'itemtag' => 'dl', 'icontag' => 'dt', 'captiontag' => 'dd', 'columns' => 3, 'size' => 'large', 'link' => 'file'), $atts));
        		
        	$args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'orderby' => $orderby);
        
        	if (!empty($include)) {$args['include'] = $include;}
        	else {
        	   	$args['post_parent'] = $id;
        		$args['numberposts'] = -1;
        	}
        
        	if ($args['include'] == "") { $args['orderby'] = 'date'; $args['order'] = 'asc';}
        
        	$images = get_posts($args);
        		
        	foreach ( $images as $image ) {
        		//print_r($image); /*see available fields*/
        		$thumbnail = wp_get_attachment_image_src($image->ID, 'large');
        		$thumbnail = $thumbnail[0];
        		$gallery .= "  <div class='swiper-slide'><img src='".$thumbnail."'></div>";
        	}
	
        	return $gallery;
        }
       function the_featured_image_gallery( $atts = array() ) {
            $setting_id = 'featured_image_gallery';
            $ids_array = get_theme_mod( $setting_id );
            if ( is_array( $ids_array ) && ! empty( $ids_array ) ) {
               
                $atts['ids'] = implode( ',', $ids_array );
                 
                 echo front_page_gallery( $atts );
            }
        }
        
        add_shortcode('galleryFront', 'my_new_gallery_function');
        /*
          submenus should only appear on that page
        */
        class Sublevel_Walker extends Walker_Nav_Menu
          {
            function start_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "\n$indent<div class='subheader' aria-hidden='true'  ><ul class='sub-menu' data-aos-easing='ease-in-out'  data-aos-id='about' data-aos-anchor-placement='top-center'>\n";
            }
            function end_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "$indent</ul></div>\n";
            }
          }

          /*
           * retrieve only first paragraph
           */


        function get_first_paragraph($html) {
          global $post;

        	$first_paragraph_str =  $html ;
            $first_heading_str = $first_paragraph_str;
            //echo strpos($first_heading_str, '<h2>');
            // echo strpos($first_paragraph_str, '<p>');
            if (strpos($first_heading_str, '<h2>') < strpos($first_paragraph_str, '<p>')) {
               $first_heading_str =  substr($first_heading_str, 0, strpos($first_heading_str, '</h2>')); 
            } else {
             $first_heading_str = "";
            };
        	$first_paragraph_str = substr($first_paragraph_str, strpos($first_paragraph_str, '<p>'), strpos($first_paragraph_str, '</p>'));
        	$first_paragraph_str = strip_tags($first_paragraph_str, '<a><strong><em>');
        	$first_heading_str = strip_tags($first_heading_str, '<a><strong><em>');
        	return '<h2 class="text-big">'.$first_heading_str.'</h2><p>' . $first_paragraph_str . '</p>';
        }
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on saintsrobotics, use a find and replace
         * to change 'saintsrobotics' to the name of your theme in all the template files.
         */
        load_theme_textdomain('saintsrobotics', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'saintsrobotics')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('saintsrobotics_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => ''
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true
        ));
    }
endif;
add_action('after_setup_theme', 'saintsrobotics_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saintsrobotics_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('saintsrobotics_content_width', 640);
}
add_action('after_setup_theme', 'saintsrobotics_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saintsrobotics_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('unused', 'saintsrobotics'),
        'id' => 'front-page',
        'description' => esc_html__('Add widgets here.', 'saintsrobotics'),
        'before_widget' => '<section id="%1$s">',
        'after_widget' => '</section>',
        'before_title' => '',
        'after_title' => ''
    ));

}
add_action('widgets_init', 'saintsrobotics_widgets_init');



/**
 * replace wordpress jquery with updated one
 */
 function replace_core_jquery_version() {
            wp_deregister_script( 'jquery' );
            // Change the URL if you want to load a local copy of jQuery from your own server.
            wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.3.1.min.js", array(), '3.3.1' );
          //  wp_register_script( 'aos-animate', get_stylesheet_directory_uri().'/lib/aos/dist/aos.js');
             wp_register_script( 'aos-animate','https://unpkg.com/aos@next/dist/aos.js');
            wp_enqueue_script('aos-animate');
             wp_enqueue_script( 'Swiper', ("https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"), array(), '4.3.5',false);
        
           
 
        }
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );
/**
 * Enqueue scripts and styles.
 */
function saintsrobotics_scripts()
{
    wp_enqueue_style('saintsrobotics-style', get_stylesheet_uri());
    wp_enqueue_style('saintsrobotics-style-main', get_template_directory_uri() . '/css/sierra.css');
    
    //    wp_enqueue_script( 'saintsrobotics-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
   // wp_enqueue_script( 'ajax-pagination',  get_stylesheet_directory_uri() . '/js/ajax-pagination.js', array( 'jquery' ), '1.0', true );
    //    wp_enqueue_script( 'saintsrobotics-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'saintsrobotics_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load in TGM plugin activator
 */
require_once get_template_directory() . '/lib/TGM/class-tgm-plugin-activation.php';

function saintsrobotics_plugin_register_required_plugins() {

    $plugins = array(
      
        array(
  			'name'      => 'wp-customize-image-gallery-control',
  			'slug'      => 'wp-customize-image-gallery-control',
  			'source'    => 'https://github.com/xwp/wp-customize-image-gallery-control/archive/master.zip',
        'required'  => true,
  		),
        array(
  			'name'      => 'Github Updater for WP',
  			'slug'      => 'github-updater',
  			'source'    => 'https://github.com/afragen/github-updater/archive/master.zip',
        'required'  => false,
  		),



    );
    /*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'saintsrobotics-plugin',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.



	);
		tgmpa( $plugins, $config );


}
add_action( 'tgmpa_register', 'saintsrobotics_plugin_register_required_plugins' );


?>
