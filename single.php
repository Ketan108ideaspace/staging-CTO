<?php
get_header();
?>

<!-- Main Content -->
<div id="Content">
<div class="content_wrapper clearfix">
	<div class="sections_group">
		<div class="entry-content">
			
			<?php
				if (have_posts()) :
					while ( have_posts() ) : the_post();?>
						<div class="section column-margin-30px" style="padding-top:50px; padding-bottom:20px; background-color:#fff">
							<div class="section_wrapper clearfix">
								<div class="items_group clearfix">
									
									<?php
										if(has_post_thumbnail()){
											$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
											$nvImage = $nvImage[0];
											?>													
											<!-- One Third (1/3) Column -->
											<div class="column one-third column_image">
												<div class="image_frame no_link scale-with-grid no_border">
													<div class="image_wrapper"><img class="scale-with-grid" src="<?php echo $nvImage; ?>" alt="">
													</div>
												</div>
											</div>
											<?php
											$nvThirdCls = "two-third";
										}
									?>
									<!-- Two Third (2/3) Column -->
									<div class="column column_column <?php echo $nvThirdCls; ?>">
										<div class="column_attr ">
											<!-- One Second (1/2) Column -->
											<div class="column one">
												<h2><?php echo get_the_title(); ?></h2>
												<p class="big"><?php echo apply_filters('the_content', get_post_field('post_content', get_the_ID())); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile;
				endif;
			?>

		</div>
	</div>
</div>
</div>

<?php
get_footer();
?>
