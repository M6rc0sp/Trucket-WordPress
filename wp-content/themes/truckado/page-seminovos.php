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
        <div class="col-md-3">
            <aside class="page-seminovos-side-filter">
                <?php get_template_part('template/seminovos','filter');?>
            </aside>
        </div>
		<div class="col-md-9">

            <div class="seminovos-lista">
                <?php
                    $_seminovos_terms = new WP_Query( seminovos_query() );

                    /*
                    if( isset($_GET['term']) ) {
                        $_seminovos_keywords = new WP_Query(array(
                            'post_type'	=> 'cpt-seminovos',
                            'meta_query' => array(
                                array(
                                    'key'     => 'search_keywords',
                                    'value'   => $_GET['term'],
                                    'compare' => 'LIKE',
                                )
                            ),
                        ));

                        //create new empty query and populate it with the other two
                        $_seminovos_destacados = new WP_Query();
                        $_seminovos_destacados->posts = array_merge( $_seminovos_terms->posts, $_seminovos_keywords->posts );

                        //populate post_count count for the loop to work correctly
                        $_seminovos_destacados->post_count = $_seminovos_terms->post_count + $_seminovos_keywords->post_count;
                    } else {
                        $_seminovos_destacados = new WP_Query( seminovos_query() );

                    }
                    */
                    $_seminovos_destacados = new WP_Query( seminovos_query() );
                ?>
                <?php if( $_seminovos_destacados->have_posts() ) : ?>
                    <div class="row">
                        <?php while( $_seminovos_destacados->have_posts() ) : $_seminovos_destacados->the_post(); ?>
                            <div class="col-md-4">
                                <?php get_template_part( 'template/spot','seminovos' ); ?>
                            </div>
                        <?php endwhile ?>

                        <?php 
                        if (  $_seminovos_destacados->max_num_pages > 1 ){
                            echo '<a class="seminovos_loadmore btn btn-outline-secondary" href="#">Carregar mais</a>';
                        }
                        
                        ?>
                    </div>
                <?php else : ?>

                    <div class="text-center">
                        <img src="<?php theImgAssets() ?>/truck-erro.png" alt="Oops!">
                        <p>
                            Nenhum seminovo encontrado para a sua busca! <br/>
                            <strong>Utilize o filtro lateral ou faça sua procura no buscador acima.</strong>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

		</div>
	</div>
</div>
<?php get_footer() ?>