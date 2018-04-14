<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<?php if ( is_active_sidebar( 'footer_1') || is_active_sidebar( 'footer_2') || is_active_sidebar( 'footer_3') || is_active_sidebar( 'footer_4') ) { ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>">

	<div id = "footerWidgets" class = "row">

		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_1'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_2'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_3'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_4'); ?>
		</div>

	</div><!-- #footerWidgets -->

	</div><!-- .container -->

	<?php } ?>

	<div id = "bottomFooter" class = "container-fluid">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer text-center" id="colophon">

					<div class="site-info">
					
					<span>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></span><br />
					<span>Website by <a href = "http://www.designs4theweb.com">Designs 4 The Web</a></span>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- .container-fluid -->

</div><!-- wrapper end -->

</div><!-- #page-wrapper -->

<?php wp_footer(); ?>

</body>

</html>
