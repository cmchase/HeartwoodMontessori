<?php get_header(); ?>

	<main class="main-content" role="main">
		<!-- section -->
		<section class="post-content">
		
			<h1 class="page-title"><?php _e( 'Latest News & Posts', 'heartwood' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>

		<section class="post-sidebar">
			<?php get_sidebar(); ?>
		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>