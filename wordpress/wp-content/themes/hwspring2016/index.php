<?php get_header(); ?>

	<main class="main-content" role="main">
		<!-- section -->
		<section class="post-content">
		
			<h1><?php _e( 'Latest Posts', 'heartwood' ); ?> !!</h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>

		<section class="sidebar-content">
			<?php get_sidebar(); ?>
		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
