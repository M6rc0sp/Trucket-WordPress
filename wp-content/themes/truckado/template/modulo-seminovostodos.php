
    <?php
        $_seminovos_terms = new WP_Query( seminovos_query() );
        $_seminovos_destacados = new WP_Query( seminovos_query() );
    ?>
    <?php if( $_seminovos_destacados->have_posts() ) : ?>

		<div class="row">

			<div class="col-md-12">

				<div class="section-title">

					<h2><i class="icon-ico-arrow-right"></i>Seminovos</h2>

				</div>

			</div>

		</div>

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
