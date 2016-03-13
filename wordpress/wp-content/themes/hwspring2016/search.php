<?php get_header(); ?>

<main class="main-content" role="main">

	<section class="post-content">

		<h1 class="page-title"><?php echo sprintf( __( "%s Search Results for '", 'heartwood' ), $wp_query->found_posts ), "'"; echo get_search_query(); ?></h1>

		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>

	</section>
	<!-- End page-content -->
	<section class="post-sidebar">
		<?php get_sidebar(); ?>
	</section>
</main>

<?php get_footer(); ?>