<?php get_header() ?>
<div class="container">
	<div class="row">
        <div class="col-md-12">
            
            <?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<?php if(has_post_thumbnail()) {
						echo '<div class="post-thumbnail">';
						the_post_thumbnail();
						echo '</div>';
                    }?>
                    <div class="page-title">
						<h1><?php the_title() ?></h1>
					</div>
					<div class="content">
						<?php the_content() ?>
					</div>
				<?php endwhile ?>
			<?php endif ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">

            <div class="clientes-lista">
                <?php
                    $_clientes_destacados = new WP_Query(array(
                        'post_type' => 'cpt-clientes',
                        'posts_per_page'    => 8,
                    ));
                ?>
                <?php if( $_clientes_destacados->have_posts() ) : ?>
                    <div class="row">
                        <?php while( $_clientes_destacados->have_posts() ) : $_clientes_destacados->the_post(); ?>
                            <div class="col-md-6">
                                <?php get_template_part( 'template/spot','clientes' ); ?>
                            </div>
                        <?php endwhile ?>

                        <?php 
                        if (  $_clientes_destacados->max_num_pages > 1 ){
                            echo '<a class="clientes_loadmore btn btn-outline-secondary" href="#">Carregar mais</a>';
                        }
                        
                        ?>
                    </div>
                <?php endif; ?>
            </div>

		</div>
	</div>
</div>

<script>
    var posts_clientes = <?php echo json_encode( $_clientes_destacados->query ) ?>;
    var current_clientes = "<?php echo get_query_var( 'paged' ) ? get_query_var('paged') : 1 ?>";
    var max_clientes = "<?php echo $_clientes_destacados->max_num_pages ?>";
</script>
<?php get_footer() ?>