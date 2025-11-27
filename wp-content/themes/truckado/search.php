<?php get_header() ?>
<div class="container">
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
<?php get_footer() ?>