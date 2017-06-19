<?php
/**
 * The template for displaying the footer.
 *
 * @package Evans_Lake_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="social-media">
					<h3>Contact Info</h3>
					<p><i class="fa fa-facebook-official" aria-hidden="true" ></i>
						<i class="fa fa-twitter-square" aria-hidden="true"></i>
						<i class="fa fa-google-plus-square" aria-hidden="true"></i>
					</p>
				</div>
        <div class="contact-us">
					<ul>
						<li><a href="#">Contact Us</a></li>
            <li><a href="#">Camp Programs</a></li>
						<li><a href="#">Donation</a></li>
					</ul>
					<ul>
						<li><a href="#">Maps & Directions</a></li>
            <li><a href="#">Outdoor Education</a></li>
						<li><a href="#">job opportunities</a></li>
					</ul>		
				</div>	
				<hr>
				<div class="get-notified-email">
          <h3>Get notified when camp registration opens</h3>
				  <form action="#updates" onsubmit="return someKindOfFormValidation">
            <input type="email" id="your-email"  placeholder="Your Email">
						<input type="radio" name="" value="">I agree to recieve an emails from Evans lake. you can withraw your consent at anytime.<br>
          <button class="get-notified-button" type="submit">Get Notified</button>
        </form>
				</div>
				<div class="site-info">
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
