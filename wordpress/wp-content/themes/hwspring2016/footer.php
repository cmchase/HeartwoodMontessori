			<section id="contact-section" class="contact-section" role="banner">
				<article>
					<h1>Contact Heartwood</h1>
					<div class="intro-col">
						<h4>We'd love to hear from you!</h4>
						<p>We're always eager to answer questions &mdash; please contact us and we'll be happy to talk.</p>
					</div>
					<div class="form-col">
						<?php echo do_shortcode('[contact-form-7 id="140" title="Footer Contact"]'); ?>
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
									<span class="icon"></span><a href="mailto:info@heartwoodmontessori.com">info@heartwoodmontessori.com</a>
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
						<a href="https://www.facebook.com/Heartwood-Montessori-School-146119348754602/" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo-facebook.png"
						</a>
						<a href="https://twitter.com/hwmontessori" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo-twitter.png"
						</a>
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
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-78751089-1', 'auto');
		  ga('send', 'pageview');
		</script>
	</body>
</html>
