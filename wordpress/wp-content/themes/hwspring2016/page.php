<?php get_header(); ?>

<main class="main-content" role="main">

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<section class="post-header">
			<h1 class="post-title">
				<?php the_title(); ?>
			</h1>
		</section>

	<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
		<section class="hero">
		<?php
			the_post_thumbnail();
			if (has_excerpt(get_post_thumbnail_id())) {
					echo "<span class='caption'><span class='caption-text'>" . get_post(get_post_thumbnail_id())->post_excerpt . "</span></span>";
				}
		?>
		</section>
	<?php endif; ?>

	<section class="post-content">

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_content(); ?>

			<?php comments_template( '', true ); // Remove if you don't want comments ?>

			<br class="clear">

			<?php edit_post_link(); ?>

		</article>
		<!-- /article -->

	</section>

	<?php endwhile; ?>

	<?php else: ?>

	<section class="post-content">
		<!-- article -->
		<article>

			<h2><?php _e( 'Sorry, nothing to display.', 'heartwood' ); ?></h2>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- End page-content -->
	<section class="post-sidebar">
		<?php get_sidebar(); ?>
	</section>
</main>



<?php get_footer(); ?>
