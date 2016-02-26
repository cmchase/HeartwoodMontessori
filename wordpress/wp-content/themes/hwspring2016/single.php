<?php get_header(); ?>
<main class="main-content" role="main">

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<section class="post-header">
		<h1 class="post-title">
			<?php the_title(); ?>
		</h1>
		<div class="post-author">
			<img />
			<span class="author-intro">Written by </span>
			<span class="author-name"><?php the_author(); ?></span>
		</div>
	</section>

	<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
		<section class="hero">
			<?php the_post_thumbnail();
				echo "<span class='caption'><span class='caption-text'>" . get_post(get_post_thumbnail_id())->post_excerpt . "</span></span>"; ?>
		</section>
	<?php endif; ?>

		
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<section class="post-details">
			<span class="activity-date">
				<span class="day"><?= the_time('D'); ?></span>
				<span class="month"><?= the_time('M'); ?></span>
				<span class="date"><?= the_time('j'); ?></span>
			</span>
		</section>
		<section class="post-content">
			<?php the_content(); // Dynamic Content ?>


			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
		</section>
		
		


	</article>

	<?php endwhile; ?>

	<?php else: ?>

	<article>

		<h1><?php _e( 'Sorry, nothing to display.', 'heartwood' ); ?></h1>

	</article>

<?php endif; ?>

</main>

<?php get_footer(); ?>
