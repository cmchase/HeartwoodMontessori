<?php get_header(); ?>

<main class="main-content" role="main">

	<section class="post-content">

		<h1 class="page-title"><?php _e( 'Page not found', 'heartwood' ); ?></h1>
		<p>
			<a href="<?php echo home_url(); ?>"><?php _e( 'Return home!?', 'heartwood' ); ?></a>
		</p>

	</section>
	<!-- End page-content -->
	<section class="post-sidebar">
		<?php get_sidebar(); ?>
	</section>
</main>

<?php get_footer(); ?>