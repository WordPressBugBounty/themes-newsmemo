<?php 
$newsmunch_hs_slider_left			= get_theme_mod('newsmunch_hs_slider_left','1');
$newsmunch_hs_slider_mdl			= get_theme_mod('newsmunch_hs_slider_mdl','1');
$newsmunch_hs_slider_right			= get_theme_mod('newsmunch_hs_slider_right','1');
$newsmunch_slider_bg_img			= get_theme_mod('newsmunch_slider_bg_img');
$newsmunch_slider_right_ttl		 	= get_theme_mod('newsmunch_slider_right_ttl','Today Update');
$newsmunch_tabfirst_cat			  	= get_theme_mod('newsmunch_tabfirst_cat','0');
$newsmunch_hs_slider_tab_title	  	= get_theme_mod('newsmunch_hs_slider_tab_title','1');
$newsmunch_hs_slider_tab_cat_meta 	= get_theme_mod('newsmunch_hs_slider_tab_cat_meta','1');
$newsmunch_hs_slider_tab_date_meta	= get_theme_mod('newsmunch_hs_slider_tab_date_meta','1');
$newsmunch_hs_slider_tab_auth_meta	= get_theme_mod('newsmunch_hs_slider_tab_auth_meta','1');
$newsmunch_hs_slider_tab_comment_meta = get_theme_mod('newsmunch_hs_slider_tab_comment_meta','1');
$newsmunch_hs_slider_tab_views_meta   = get_theme_mod('newsmunch_hs_slider_tab_views_meta','1');
$newsmunch_num_slides_tab		  	  = get_theme_mod('newsmunch_num_slides_tab','2');
$newsmunch_slider_tab1_posts	  	  = newsmunch_get_posts($newsmunch_num_slides_tab, $newsmunch_tabfirst_cat);
?>	
<section class="main-banner-section clearfix radius style-1 slider-4" <?php if(!empty($newsmunch_slider_bg_img)): ?> style="background-image: url(<?php echo esc_url($newsmunch_slider_bg_img); ?>);"<?php endif; ?>>
	<div class="dt-container-md">
		<div class="dt-row dt-g-4">  
			
			<?php if($newsmunch_hs_slider_mdl=='1'): ?>
				<div class="dt-col-xl-<?php if($newsmunch_hs_slider_left==''): esc_attr_e('8 dt-col-lg-8','newsmemo'); else: esc_attr_e('3 dt-col-md-12','newsmemo'); endif; ?>">
					<?php do_action('newsmunch_site_slider_middle'); ?>
				</div>
			<?php endif; ?>
			
			<?php if($newsmunch_hs_slider_left=='1'): ?>
				<div class="dt-col-xl-<?php if($newsmunch_hs_slider_mdl =='' && $newsmunch_hs_slider_right ==''): esc_attr_e('12','newsmemo'); elseif($newsmunch_hs_slider_mdl =='' || $newsmunch_hs_slider_right ==''):  esc_attr_e('9','newsmemo'); else: esc_attr_e('6','newsmemo'); endif; ?>">
					<?php do_action('newsmunch_site_slider_main');?>
				</div>
			<?php endif; ?>
			
			<?php if($newsmunch_hs_slider_right=='1'): ?>
				<div class="dt-col-xl-<?php if($newsmunch_hs_slider_left==''): esc_attr_e('4 dt-col-lg-4','newsmemo'); else: esc_attr_e('3 dt-col-md-12','newsmemo'); endif; ?>">
					<?php if(!empty($newsmunch_slider_right_ttl)):
						 ?>
						<div class="widget-header sl-right">
							<h4 class="widget-title"><?php echo wp_kses_post($newsmunch_slider_right_ttl); ?></h4>
						</div>
					<?php endif; ?>
					<div class="post_columns-grid">
						<?php
							if ($newsmunch_slider_tab1_posts->have_posts()) :
							while ($newsmunch_slider_tab1_posts->have_posts()) : $newsmunch_slider_tab1_posts->the_post();

							global $post;
							$format = get_post_format() ? : 'standard';	
						?>
							<div class="post featured-post-lg">
								<div class="details clearfix">
									<?php if($newsmunch_hs_slider_tab_cat_meta=='1'): newsmunch_getpost_categories();  endif; ?>
									<?php if($newsmunch_hs_slider_tab_title=='1'): newsmunch_common_post_title('h2','post-title'); endif; ?> 
									<ul class="meta list-inline dt-mt-0 dt-mb-0 dt-mt-3">
										<?php if($newsmunch_hs_slider_tab_auth_meta=='1'): ?>
											<li class="list-inline-item"><i class="far fa-user-circle"></i> <?php esc_html_e('By','newsmemo');?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" rel="author"><?php esc_html(the_author()); ?></a></li>
										<?php endif; ?>	
										
										<?php if($newsmunch_hs_slider_tab_date_meta=='1'): ?>
											<li class="list-inline-item"><i class="far fa-calendar-alt"></i> <?php echo esc_html(get_the_date( 'F j, Y' )); ?></li>
										<?php endif; ?>	
										
										<?php if($newsmunch_hs_slider_tab_comment_meta=='1'): ?>
											<li class="list-inline-item"><i class="far fa-comments"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></li>
										<?php endif; ?>	
										
										<?php if($newsmunch_hs_slider_tab_views_meta=='1'): ?>
											<li class="list-inline-item"><i class="far fa-eye"></i> <?php echo wp_kses_post(newsmunch_get_post_view()); ?></li>
										<?php  endif; newsmunch_edit_post_link(); ?>
									</ul>
								</div>
								<div class="thumb">
									<?php if ( $format !== 'standard' ): ?>
										<span class="post-format-sm">
											<?php do_action('newsmunch_post_format_icon_type'); ?>
										</span>
									<?php endif; ?>
									<a href="<?php echo esc_url(get_permalink()); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="inner data-bg-image" data-bg-image="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"></div>
										<?php else: ?>
											<div class="inner"></div>
										<?php endif; ?>
									</a>
								</div>
							</div>
						<?php endwhile;endif;wp_reset_postdata(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
