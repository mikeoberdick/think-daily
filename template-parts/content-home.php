<?php $image = get_field('hero_image'); ?>
<div class="container-fluid heroSection" tabindex="-1" style = "background-image: url('<?php echo $image['url']; ?>')">
	<div class = "row opacityLayer">
		<div class = "container">
			<div class = "row">
				<div class = "col-sm-12 hpCallout">
						<h2 class = "mb-5 text-center pl-5 pr-5 hpCTA"><?php the_field('homepage_cta'); ?></h2>
				</div>
			</div>
				
				<div class ="row hpButtons">
					<div class = "col-sm-6 text-center">
						<a href = "<?php echo bloginfo('url'); ?>/candidates"><button type="button" class="btn btn-primary btn-lg">CTA 1</button></a>
					</div>
					<div class = "col-sm-6 text-center">
						<a href = "<?php echo bloginfo('url'); ?>/employers"><button type="button" class="btn btn-primary btn-lg">CTA 2</button></a>
					</div>
				</div><!-- .row -->

		</div><!-- .container -->
	</div><!-- #opacityLayer -->	
</div><!-- .container-fluid -->
