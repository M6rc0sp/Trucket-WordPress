<div class="seminovos-lista modulo-homepage">



    <?php

        $_seminovos_destacados_args = array(
            'post_type'         => 'cpt-seminovos',
            // 'posts_per_page'    => 12,
            'offset' => get_option( 'posts_per_page' )
        );

        if(isMobile()){
            $_seminovos_destacados_args['posts_per_page'] = 3;
            $_seminovos_destacados_args['offset'] = 3;
        }

        $_seminovos_destacados = new WP_Query( $_seminovos_destacados_args );

        // $_seminovos_destacados = new WP_Query( seminovos_query() );

    ?>

    <?php if( $_seminovos_destacados->have_posts() ) : ?>

        <div class="row">

            <?php while( $_seminovos_destacados->have_posts() ) : $_seminovos_destacados->the_post(); ?>

                <div class="col-xl-3 col-lg-4">

                    <?php get_template_part( 'template/spot','seminovos' ); ?>

                </div>

            <?php endwhile ?>

        </div>



        <?php 

            // if (  $_seminovos_destacados->max_num_pages > 1 ){

                echo "<div class='text-center'>";

                echo '<a class="btn btn-secondary" href="'.home_url().'/seminovos" style="background-color:#ff0000;box-shadow:0 2px 4px rgba(0,0,0,1);border:0;    padding: 12px 35px;">Ver mais</a>';

                echo "</div></br>";

            // }

            

            ?>



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