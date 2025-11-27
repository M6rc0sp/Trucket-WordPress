<?php get_header() ?>
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h3>Clientes</h3>
            </div>
        </div>
		<div class="col-md-10 offset-md-1">
			<?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                    <div class="page-title">
						<h1><?php the_title() ?></h1>
					</div>

					<div class="clientes-img">

                        <div class="cliente-thumbnail-slick">
                            <?php if(has_post_thumbnail()) {
                                echo '<div class="post-thumbnail">';
                                the_post_thumbnail();
                                echo '</div>';
                            }?>
                            <?php if( get_field('galeria_de_imagens') ) : ?>
                                <?php foreach (get_field('galeria_de_imagens') as $k_img => $v_img) : ?>
                                    <div class="post-thumbnail">
                                        <img src="<?php echo $v_img['imagem']['url']?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

					</div>
					
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
        <div class="col-md-12 text-center">
            <a class="btn btn-outline-secondary" href="<?php echo home_url() ?>/nossos-clientes">Veja mais clientes</a>
        </div>
	</div>
</div>
<?php get_footer() ?>