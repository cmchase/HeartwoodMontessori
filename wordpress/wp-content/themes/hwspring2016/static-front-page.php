<?php  /* Template Name: Static Front Page Template */ define( 'WP_USE_THEMES', false ); get_header(); ?>

	<main class="main-content" role="main">

		<section class="hero hero-header">
			<img src="<?= get_template_directory_uri(); ?>/img/splash/hero-header04.jpg" alt="Heartwood Montessori School serves all ages throughout Raleigh, Cary, Morrisville and Apex North Carolina" />
		</section>

		<section class="splash-row-intro">
			<article class="supp">
				<img src="<?= get_template_directory_uri(); ?>/img/splash/supp-selfie.jpg" alt="Montessori for Preschool, Elementary, Middle and High School">
				<span class="caption">
				Programs for all ages, <em>Toddlers through High School</em>
				</span>
			</article>
			<article class="main">
				<h1>A Warm &amp; Welcoming
				<span class="soft-break">Montessori Experience</span></h1>

				<p>Heartwood Montessori School provides students with an authentic Montessori education. Certified teachers use authentic materials to teach a wide range of Montessori works including the five Great Lessons.</p>

				<p>Peace Eduction is at the heart of everything we do. Heartwood Montessori School prides itself on the respect we show our students and the community we build with our families.</p>

				<h1>Quality Education for Students 18 Months to 18 Years</h1>

				<p>Heartwood Montessori School serves students aged 18 months to 18 years. In addition to the Montessori curriculum presented by our certified teachers, students are also provided lessons in art, movement and Spanish.</p>

			</article>
			<article class="events-col">
				<h1>Events</h1>
				<div id="upcomingEvents"></div>
			</article>
		</section>

		<section class="hero">
		<img
			srcset="<?= get_template_directory_uri(); ?>/img/splash/hero02-lg.jpg	1270w,
			        <?= get_template_directory_uri(); ?>/img/splash/hero02-md.jpg	768w,
			        <?= get_template_directory_uri(); ?>/img/splash/hero02-sm.jpg   480w"
			src="<?= get_template_directory_uri(); ?>/img/splash/hero02-md.jpg"
			sizes="100vw"
			alt="The child should live in an environment of beauty. - Maria Montessori"
		/>
		</section>

		<section class="splash-row-centered">
			<article class="main">
				<h1>Why Chose Heartwood Montessori</h1>

				<p>At all levels and in all areas, <strong>Heartwood places the needs of the child first</strong>. The AMS credentialed staff believes that children, not subjects, are taught. At Heartwood Montessori School you are truly part of a community of parents, students and teachers. We are here to support you and your family in any way we can.</p>

				<p>The Montessori approach encourages children to learn through self-motivation within a carefully prepared environment. The multi-age setting offers the child an opportunity to relate to, and work with others at his/her developmental level.</p>
			</article>
		</section>

		<section class="hero">
			<img src="<?= get_template_directory_uri(); ?>/img/splash/hero01.jpg" alt="To assist a child we must provide him with an environment which will enable him to to develop freely. - Maria Montessori" />
		</section>

		<section class="splash-row-modules">
			<article class="main">
					<h1>Our Philosophy</h1>

					<p>The cornerstone of Heartwood's philosophy is the respect it has for it's students and their cognitive, social and emotional development. At Heartwood we recognize that a child is more responsive to certain learning experiences at particular times in their development. By carefully looking for and respecting these "sensitive periods" in their growth, teachers are able to maximize student learning while maintaining and even expanding the child's nature curiosity and interest in learning.</p>

					<p>As practioners of Peace Education, we believe that the most important role a teacher plays in their students social and emotional growth is to provide an environment deliberately designed to promote the development of peaceful individuals and interactions. </p>
			</article>

			<article class="module module-1">
				<a href="#">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/module01.jpg">
					<span class="caption">Tuition</span>
				</a>
			</article>
			<article class="module module-2">
				<a href="#">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/module02.jpg">
					<span class="caption">School Tour</span>
				</a>
			</article>
			<article class="module module-3">
				<a href="#">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/module03.jpg">
					<span class="caption">Programs</span>
				</a>
			</article>
			<article class="module module-4">
				<a href="#">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/module04.jpg">
					<span class="caption">Community</span>
				</a>
			</article>
		</section>

		<section class="splash-row-posts">
			<header>
				<h1>Recent News</h1>
			</header>
			<?php
				query_posts('showposts=4&category_name=spotlight&orderby=date&order=desc');
				while ( have_posts() ) : the_post();
			    if ($wp_query->current_post == 0) :
			 ?>
				<article class="main">
					<section class="spotlight-post">
						<span class="activity-date">
							<span class="day"><?= the_time('D'); ?></span>
							<span class="month"><?= the_time('M'); ?></span>
							<span class="date"><?= the_time('j'); ?></span>
						</span>
						<h3><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?= the_post_thumbnail('spotlight') ?>
						<?php hw_excerpt('hw_index'); ?>
					</section>
				</article>
				<article class="posts-archive-col">
					<ul class="activity-list">
					<?php
						endif;
						endwhile;
						while ( have_posts() ) : the_post();
				    	if ($wp_query->current_post > 0) : ?>
						<li class="activity-item">
							<a href="<?= the_permalink(); ?>" class="activity-link">
								<span class="activity-date">
									<span class="day"><?= the_time('D'); ?></span>
									<span class="month"><?= the_time('M'); ?></span>
									<span class="date"><?= the_time('j'); ?></span>
								</span>

								<span class="activity-title"><?= the_title(); ?></span>
							</a>
						</li>
		 			<?php endif; endwhile; ?>
					</ul>
					<a href="#" class="activity-more">
						<span class="icon"></span>View All News
					</a>

				</article>

		</section>

	</main>

<?php get_footer(); ?>
