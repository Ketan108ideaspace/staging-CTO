	<footer>
		<div class="footer-top">
			<nav id="footer-nav">
				<?php
					$nvAryFooter = array(
						'theme_location' => 'footer_menu',
						'menu' => 'footer_menu', 
						'menu_class' => 'footer-nav',
						'container' => false,
						'echo' => true,
						'fallback_cb' => false,
						'depth' => 0,
					);
					if (!empty($nvAryFooter)){
						wp_nav_menu( $nvAryFooter );
					}
				?>
			</nav>
				
			<div class="footer-secondary-nav">
				<a href="#" class="blue-bt section-bt">CAREERS</a>
				<a href="#" class="blue-bt section-bt">PUBLICATIONS</a>
				<a href="#" class="blue-bt section-bt">SUBSCRIBE</a>
			</div>
				
			<div class="footer-form">
				<ul class="subscribe-form">
					<li>
						  <input type="text" class="input-text" required/>
						<label class="floating-label">NAME</label>
					</li>
				<li>
					  <input type="text" class="input-text" required/>
					<label class="floating-label">EMAIL</label>
				</li>			
				<li>
					<span>
					<input id="newsletter-subscribe" type="checkbox" value="Newsletter" class="input-check" />
					<label for="newsletter-subscribe">Newsletter</label>
					</span>
					<span>
					<input id="events-subscribe" type="checkbox" value="Events" class="input-check" />
					<label for="events-subscribe">Events</label>						
					</span>

				</li>
				<li>
				<input type="button" class="blue-bt submit-bt" value="SUBSCRIBE">	
				</li>
				
				</ul>

			</div>
			
			<div class="contact-footer">
				<?php
					$nvAdd = apply_filters('the_excerpt', of_get_option( 'footer_address' )); 
					echo $nvAdd;
				?>
			</div>

		</div>
		<div class="footer-bottom">
			<ul>
				<li>
					<?php
						$nvftrLary = array(
							'theme_location' => 'footer_l_menu',
							'menu' => 'footer_l_menu', 
							'menu_class' => 'ftb-left',
							'container' => false,
							'echo' => true,
							'fallback_cb' => false,
							'depth' => 0,
						);
						if (!empty($nvftrLary)){
							wp_nav_menu( $nvftrLary );
						}
					
						if(of_get_option( 'copyright_text' )!="") {
							echo '<ul class="ftb-mid"><li><a href="#">'.of_get_option( 'copyright_text' ).'</a></li></ul>';
						}
					
						$nvftrLary = array(
							'theme_location' => 'footer_r_menu',
							'menu' => 'footer_r_menu', 
							'menu_class' => 'ftb-right',
							'container' => false,
							'echo' => true,
							'fallback_cb' => false,
							'depth' => 0,
						);
						if (!empty($nvftrLary)){
							wp_nav_menu( $nvftrLary );
						}
					?>
				</li>
			</ul>			
		</div>
	</footer>
	<a class="back-to-top" href="#">back to top</a>	
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-custom.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
$(function () {
   
	$("a.close_bt").click(function() {
	//	alert();
		$("#mp-pusher").removeClass('mp-pushed');
		$("#mp-level").removeClass('mp-level-open');
		$("body").removeClass('disabled');
		$("#mp-pusher").css({
			transform: 'translate3d(0px, 0px, 0px)',
			MozTransform: 'translate3d(0px, 0px, 0px)',
			WebkitTransform: 'translate3d(0px, 0px, 0px)',
			msTransform: 'translate3d(0px, 0px, 0px)'
		});
        //scrollToAnchor('#services');
    });

   
	$("#trigger").click(function() {
	//	alert();
		$("#mp-pusher").addClass('mp-pushed');
		$("#mp-level").addClass('mp-level-open');
		$("body").addClass('disabled');
		$("#mp-pusher").css({
		 transform: 'translate3d(320px, 0px, 0px)',
		 MozTransform: 'translate3d(320px, 0px, 0px)',
		 WebkitTransform: 'translate3d(320px, 0px, 0px)',
		 msTransform: 'translate3d(320px, 0px, 0px)'
		});
        //scrollToAnchor('#services');
    });
});		
</script>	
<?php wp_footer(); ?>
<script>
// Picture element HTML shim|v it for old IE (pairs with Picturefill.js)

document.createElement( "picture" );
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
	type : 'cover',
});
</script>
</body>
</html>