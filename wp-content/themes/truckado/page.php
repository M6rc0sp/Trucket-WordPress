<?php get_header() ?>
<div class="container">
	<div class="row">
		<div class="<?php if( !is_front_page() ) : ?>col-md-10 offset-md-1<?php else : ?> col-md-12 <?php endif; ?>">
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<?php if(has_post_thumbnail()) {
						echo '<div class="post-thumbnail">';
						the_post_thumbnail();
						echo '</div>';
					}?>
					<div class="content">
						<?php the_content() ?>
					</div>
				<?php endwhile ?>
			<?php endif ?>
		</div>
	</div>
</div>
<?php get_footer() ?>