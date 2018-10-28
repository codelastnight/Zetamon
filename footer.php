<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saintsrobotics
 */

?>


	<!--scripts-->


	<footer id="colophon" class="site-footer">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri().'lib/aos/dist/aos.js'; ?>"></script>
		<script src="<?php echo get_stylesheet_directory_uri().'lib/aos/dist/main.js'; ?>"></script>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
