<?php /* Template Name: Recent Posts */ get_header(); ?>

<main class="main-content" role="main">
	<!-- section -->
	<section class="post-content">
	
		<h1><?php the_title(); ?></h1>

	<?php if (have_posts()): while(have_posts()) : the_post(); ?>
		<ul>
			<?php
			$myposts = get_posts('numberposts=-1&offset=$debut');
			foreach($myposts as $post) :
			?>
			<li><?php the_time('d/m/y') ?>: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endforeach; ?>
		</ul>
	<?php endwhile; ?>

	<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'heartwood' ); ?></h2>
	</article>
	<!-- /article -->

	<?php endif; ?>


	</section>
	<!-- /section -->
</main>


<?php get_footer(); ?>