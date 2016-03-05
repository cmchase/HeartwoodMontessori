<?php get_header(); ?>

<main class="main-content" role="main">

	<section class="page-content">

		<h1><?php _e( 'Categories for ', 'heartwood' ); single_cat_title(); ?></h1>

		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>

	</section>
	<!-- End page-content -->
	<section class="page-sidebar">
		<?php get_sidebar(); ?>
	</section>
</main>

<?php get_footer(); ?>