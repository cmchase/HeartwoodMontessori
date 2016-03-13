			<section id="contact-section" class="contact-section" role="banner">
				<article>
					<h1>Contact Heartwood</h1>
					<div class="intro-col">
						<h4>We'd love to hear from you!</h4>
						<p>If any of your questions weren't answered by our <a>FAQs</a>, please
						contact us and we'll be happy to talk.</p>
					</div>
					<div class="form-col">
						<?php echo do_shortcode('[contact-form-7 id="140" title="Footer Contact"]'); ?>
						<!-- <input type="text" id="contactName" class="name" placeholder="Name" />
						<input type="email" id="contactEmail" class="email" placeholder="Email Address" />
						<textarea id="contactMessage" class="message" placeholder="Questions and Comments"></textarea>
						<button>Submit</button> -->
					</div>
					<div class="info-col">
						<address>
							<ul>
								<li class="address"><span class="icon"></span>
									112 Byrum Street<br />
									Cary, NC 27511<br />
								</li>
								<li class="telephone">
									<span class="icon"></span><a href="tel:19194652113">(919) 465-2113</a>
								</li>
								<li class="fax">
									<span class="icon"></span>(919) 461-8386
								</li>
								<li class="email">
									<span class="icon"></span><a href="mailto: info@heartwoodmontessori.com">info@heartwoodmontessori.com</a>
								</li>
							</ul>

							
						</address>
					</div>
				</article>
			</section>

			<!-- footer -->
			<footer id="main-footer" class="main-footer">

				<nav id="footer-nav" class="nav" role="navigation">
					<?php footer_nav(); ?>

					<div class="social-media">
						<a href="http://www.facebook.com">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo-facebook.png"
						</a>
						<a href="http://www.instagram.com">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo-instagram.png"
						</a>
						<a href="http://www.youtube.com">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo-youtube.png"
						</a
						<a href="http://www.imgur.com"></a>
						<a href="http://www.youtube.com"></a>
					</div>
				</nav>

				<div class="footer-branding">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="Heartwood Montessori" /> 
					</a>
					<p class="copyright">
						&copy; 2005-<?php echo date('Y'); ?> Heartwood Montessori School
					</p>
				</div>

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>




		<!-- This is hacked in until I get React working -->
		<script type="text/html" id="upcomingEventsTpl">
			<ul class="activity-list">
				<li class="activity-item">
					<a href="#" class="activity-link">
						<span class="activity-date">
							<span class="day">Tues</span>
							<span class="month">Feb</span>
							<span class="date">2</span>
						</span>
						<span class="activity-title">Open House with Middle School/High School teachers Missy and Ray</span>
						<span class="activity-time">6:30pm - 8:30pm</span>
					</a>
				</li>
			</ul>
			<a href="#" class="activity-more">
				<span class="icon"></span>View All Events
			</a>
		</script>
	</body>
</html>
