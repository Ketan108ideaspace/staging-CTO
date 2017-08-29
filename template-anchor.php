<?php
/* 
Template Name: Anchor link Template
*/
get_header();
?>
<main>
	<div class="inside-content-wrap">
		<div class="breadcrumb-wrap"><a href="#">Home</a> <span>&gt;</span> <a href="#">CTO Stream</a> <span>&gt;</span> Anchor Links</div>
		<?php if (function_exists('bcn_display')) { ?> <div class="breadcrumb-wrap"><?php bcn_display(); ?></div><?php } ?>
		
		<aside>
			<h2 class="border">CTO Stream</h2>
			<ul class="sidebar-nav accordion">
			<li><a href="#">Overview</a></li>	
			<li><a href="#" class="current-menu-item">Anchor Links</a></li>
			<li><a href="#">Participating Sites</a></li>
			<li><a href="#">Submission Process</a></li>
			<li><a href="#">REB Selection Process</a></li>
			<li><a href="#" >CTO Qualified REBs</a></li>
			<li><a href="#">Fees</a></li>
			<li><a href="#">Agreements</a></li>
			<li><a href="#">Training &amp; Education</a></li>	
			<li><a href="#">Practice Management</a></li>
			<li><a href="#">Resources</a>
			<ul>
			<li><a href="#">Manage Your Licence</a></li>
			<li><a href="#">Complaints &amp; Discipline</a></li>
			<li><a href="#">Practice Review</a></li>
			</ul>	
			</li>
			<li><a href="#">Technical Details</a></li>
			<li><a href="#">Glossary</a></li>
			</ul>	
		</aside>	
	
		<section class="main-content-inside">
			<a id="skip-content"></a>
			<div class="content-area-inside">
				<?php
					if (have_posts()) :
						while (have_posts()) : the_post();
							echo '<h1>'.get_the_title().'</h1>';
							the_content();
						endwhile;
					endif;
				?>
				<div class="anchor-links">
				<?php	 
					if( have_rows('anchor_link_items') ):
						echo '<h2 id="top-content">TABLE OF CONTENTS D</h2><ul>';
						while ( have_rows('anchor_link_items') ) : the_row();
							echo '<li><a href="#'.str_replace(" ","",get_sub_field('title')).'">'.get_sub_field('title').'</a></li>';
						endwhile;
						echo '</ul>';
					endif;
				
					if( have_rows('anchor_link_items') ):
						while ( have_rows('anchor_link_items') ) : the_row();
							echo '<div class="anchor-content"><h2 class="border" id="'.str_replace(" ","",get_sub_field('title')).'">'.get_sub_field('title').'<span><a href="#top-content">back to top</a></span></h2><p>'.get_sub_field('description').'</p></div>';
						endwhile;
					endif;
				?>
				</div>
			</div>	
		</section>
		<div class="sub-sidebar">
			<h3>Related Links</h3>
			<ul class="sidebar-subnav related-links top-border">
			<li><a href="#">Submission Process</a></li>	
			<li><a href="#">Agreements</a></li>
			<li><a href="#">Resources</a></li>
			<li><a href="#">Technical Details</a></li>
			</ul>	
		</div>
	</div>		
</main>
<?php
get_footer();
?>
