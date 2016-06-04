<?php  /* Template Name: Static Front Page Template */ define( 'WP_USE_THEMES', false ); get_header(); ?>

	<main class="main-content" role="main">

		<section class="hero hero-header">
				<picture>
					<source media="print" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero-header04-md.jpg">
					<source media="(max-width: 480px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero-header04-sm.jpg">
					<source media="(max-width: 640px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero-header04-md.jpg">
					<source media="(max-width: 1024px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero-header04-lg.jpg">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/hero-header04-lg.jpg" alt="Heartwood Montessori School serves all ages throughout Raleigh, Cary, Morrisville and Apex North Carolina">
				</picture>
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

				<p>Heartwood Montessori School is a child-centered community who focuses on providing an excellent, whole-child, Montessori education. Our classrooms are staffed with warm, caring, Montessori (American Montessori Society, or AMS)  certified teachers and equipped with the full complement of Montessori materials for their respective age groups.</p>

				<p>Peace Education is at the <strong>HEART</strong> of every aspect of our curriculum and it shows in the strong community we build among the students, parents and staff. Believing that a sense of respect for self, others, and the environment (wherever one finds oneself) is the surest path to peace, we attempt to model it in everything we do, from the way we interact with each other to the way the adults treat the materials in the classrooms, to the way we model conflict resolution to the children.</p>

				<h1>Quality Education for Students 18 Months to 18 Years</h1>

				<p>Heartwood Montessori School serves students aged 18 months to 18 years. In addition to the Montessori curriculum presented by our certified teachers, students participate in: Art, Physical Education, Yoga, Foreign Language (Spanish for 18 mos-12 year-olds) and Movement for the younger students. There are also private violin, guitar and piano lessons available on campus</p>

			</article>
			<article class="events-col">
				<h1>Events</h1>
				<div id="upcomingEvents"></div>
			</article>
		</section>

		<section class="hero">
			<picture>
				<source media="print" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero02-md.jpg">
				<source media="(max-width: 480px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero02-sm.jpg">
				<source media="(max-width: 640px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero02-md.jpg">
				<source media="(max-width: 1024px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero02-lg.jpg">
				<img src="<?= get_template_directory_uri(); ?>/img/splash/hero02-lg.jpg" alt="The child should live in an environment of beauty. - Maria Montessori">
			</picture>
		</section>

		<section class="splash-row-centered">
			<article class="main">
				<h1>Why Choose Heartwood Montessori?</h1>

				<p>At all levels and in all areas, <strong>Heartwood places the needs of the child first</strong>.  The Montessori certified staff believe that we are teaching children, not lessons. We encourage students to be self-motivated and learn through interaction with the carefully prepared environment. Our multi-age setting offers the child an opportunity to work with other children at their same developmental level.</p>

				<p>When you come to Heartwood Montessori School, you are truly a part of a community of parents, students and teachers who are all here to support you and your family!</p>
			</article>
		</section>

		<section class="hero">
				<picture>
					<source media="print" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero01-md.jpg">
					<source media="(max-width: 480px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero01-sm.jpg">
					<source media="(max-width: 640px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero01-md.jpg">
					<source media="(max-width: 1024px)" srcset="<?= get_template_directory_uri(); ?>/img/splash/hero01-lg.jpg">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/hero01-lg.jpg" alt="To assist a child we must provide him with an environment which will enable him to to develop freely. - Maria Montessori">
				</picture>
		</section>

		<section class="splash-row-modules">
			<article class="main">
					<h1>Our Philosophy</h1>

					<p>The cornerstone of Heartwood's philosophy is one that is at the root of Montessori philosophy: respect for the child and his/her cognitive, social and emotional development.  We recognize, as trained Montessorians, that children go through sensitive periods during which they are more open to receiving certain lessons and concepts.  By carefully looking for, recognizing and respecting these planes of development, teachers are able to maximize student learning while maintaining and even expanding the child’s natural curiosity about the world and interest in learning.</p>

					<p>As we are unceasingly engaged in Peace Education, we believe that one of the most important aspects of our school is that we provide an environment, both in the classroom and out, that encourages the development of peaceful individuals who engage in thoughtful, compassionate interactions with others.</p>
			</article>

			<article class="module module-1">
				<a href="<?php echo esc_url( get_permalink(12) ); ?>">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/module01.jpg">
					<span class="caption">Tuition</span>
				</a>
			</article>
			<article class="module module-2">
				<a href="<?php echo esc_url( get_permalink(27) ); ?>">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/module02.jpg">
					<span class="caption">School Tour</span>
				</a>
			</article>
			<article class="module module-3">
				<a href="<?php echo esc_url( get_permalink(279) ); ?>">
					<img src="<?= get_template_directory_uri(); ?>/img/splash/module03.jpg">
					<span class="caption">Why Heartwood</span>
				</a>
			</article>
			<article class="module module-4">
				<a href="<?php echo esc_url( get_permalink(29) ); ?>">
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
