<?php get_header(); ?>

<main class="main-content" role="main">

	<section class="page-content">

		<h1><?php _e( 'Page not found', 'heartwood' ); ?></h1>
		<h2>
			<a href="<?php echo home_url(); ?>"><?php _e( 'Return home!?', 'heartwood' ); ?></a>
		</h2>

	</section>
	<!-- End page-content -->
	<section class="page-sidebar">
		<?php get_sidebar(); ?>
	</section>
</main>

<?php get_footer(); ?>