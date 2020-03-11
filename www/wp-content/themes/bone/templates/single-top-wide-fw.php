<?php
$classes = array(
	'postSingle',
	'postSingle--fullwidth',
	'postSingle--headerWide',
	'hentry',
);
$format = md_bone_get_post_format();
?>
<?php get_header(); ?>

<?php if (have_posts()): the_post(); ?>
<main class="layoutBody clearfix<?php if (!has_post_thumbnail()) echo ' noThumb'; ?>">
	<article <?php md_bone_post_class( $classes ); ?>>
		<?php md_bone_single_schema_meta(); ?>
		<div class="container">
			<div class="layoutContent">
				<?php md_bone_single_header('fullwidth'); ?>

				<?php md_bone_post_format('md_bone_xxxl'); ?>
				
				<div class="contentWrap">

					<?php if ($post->post_content !== '') { ?>
						<div class="postContent postContent--fullwidth bodyCopy entry-content clearfix">
							<?php the_content(); ?>
						</div>
						
						<?php md_bone_post_pagination(); ?>

						<?php md_bone_review_score(); ?>
						
					<?php } ?>

					<?php md_bone_single_footer(); ?>

					<?php if(is_active_sidebar('adsidebar-3')) { ?>
						<div class="adSidebar adSidebar--3">
						<?php dynamic_sidebar('adsidebar-3'); ?>	
						</div>
					<?php } ?>

					<?php if (md_bone_get_option('authorbox-switch', '1')) get_template_part('templates/author-box'); ?>
				</div>

				<?php if (md_bone_get_option('postnav-switch', '1')) { 
					get_template_part('templates/post-navigation-fw');
				} ?>
								
				<?php if (md_bone_get_option('related-post-switch', '1')) get_template_part('templates/related-posts-fw'); ?>

				<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
				
			</div><!-- end layoutContent -->
		</div><!-- end container -->

	</article>
</main>
<?php endif; ?>

<?php if (is_active_sidebar('adsidebar-2')) { ?>
	<div class="adSidebar adSidebar--2">
		<div class="container">
			<?php dynamic_sidebar('adsidebar-2'); ?>
		</div>
	</div>
<?php } ?>

<?php get_footer();