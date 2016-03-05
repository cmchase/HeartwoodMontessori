<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="entry-<?php the_ID(); ?>" <?php post_class('entry-list-item'); ?>>

		<!-- post details -->
		<section class="entry-details">
			<span class="activity-date">
				<span class="day"><?= the_time('D'); ?></span>
				<span class="month"><?= the_time('M'); ?></span>
				<span class="date"><?= the_time('j'); ?></span>
			</span>
			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="entry-thumbnail">
					<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
				</a>
			<?php endif; ?>
			<!-- /post thumbnail -->
			<span class="author-info">
				<span class="author-intro">Written by </span>
				<span class="author-name"><?php the_author(); ?></span>
			</span>
		</section>
		<!-- /post details -->

		<!-- post title -->
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->


		<?php hw_excerpt('hw_index'); // Build your custom callback length in functions.php ?>

		<?php edit_post_link(); ?>

	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'heartwood' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
