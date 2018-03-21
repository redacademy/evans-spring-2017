<?php
/**
 * The template for displaying the footer.
 *
 * @package Evans_Lake_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<span class="footer container">
					<div class="social-media">
						<h3>Connect with us</h3>
						<ul>
							<li><a href="https://www.facebook.com/evanslake/"><img src="<?php echo( get_template_directory_uri() . '/assets/images/facebook-icon-footer.png'); ?>"></a></li>
							<li><a href="https://twitter.com/evanslake"><img src="<?php echo( get_template_directory_uri() . '/assets/images/twitter-icon-footer.png'); ?>"></a></li>
							<li><a href="https://www.flickr.com/photos/evanslake/ "><img src="<?php echo( get_template_directory_uri() . '/assets/images/flickr.png'); ?>"></a></li>
							<li><a href="https://www.youtube.com/channel/UC0sLPjsYd5fvI84iBFM4zAw?view_as=subscriber"><img src="<?php echo( get_template_directory_uri() . '/assets/images/youtube.png'); ?>"></a></li>
							<li><a href="https://www.instagram.com/evanslake/"><img src="<?php echo( get_template_directory_uri() . '/assets/images/instagram-icon-footer.png'); ?>"></a></li>
						</ul>	
					</div>
					<div class="contact-us">
						<ul>
							<li><a href="http://evanslake.com/contact-us/">Contact Us</a></li>
							<li><a href="http://evanslake.com/camp/camp-programs/">Camp Programs</a></li>
							<li><a href="http://evanslake.com/get-involved/donations/">Donation</a></li>
						</ul>
						<ul>
							<li><a href="http://evanslake.com/contact-us/">Maps & Directions</a></li>
							<li><a href="http://evanslake.com/venue-booking/outdoor-education/">Outdoor Education</a></li>
							<li><a href="http://evanslake.com/get-involved/job-openings/">Job Opportunities</a></li>
						</ul>		
					</div>
					<hr>
					<div class="get-notified-email">
						<h3>Get notified when camp registration opens</h3>
						<form action="https://formspree.io/lauren@evanslake.com" method="POST">
							<input type="email" id="your-email"  placeholder="Your Email">
							<input type="radio" name="" value=""><p>I agree to recieve an emails from Evans lake. you can withdraw your consent at anytime.</p>
							<button class="get-notified-button" type="submit">Get Notified</button>
						</form>
					</div>
				</span>
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
