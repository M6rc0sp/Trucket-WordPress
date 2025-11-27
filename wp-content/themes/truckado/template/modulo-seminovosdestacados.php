<section class="modulo-seminovos">



    <div class="row">

        <div class="col-md-12">

            <div class="section-title">

                <h2><i class="icon-ico-arrow-right"></i>Seminovos</h2>

            </div>

        </div>

    </div>

        

    <div class="seminovos-lista">

        <?php

            $_seminovos_destacados_args = array(

                'post_type' => 'cpt-seminovos',

                // 'posts_per_page'    => 12,

            );

            if(isMobile()){
                $_seminovos_destacados_args['posts_per_page'] = 3;
            }

            $_seminovos_destacados = new WP_Query( $_seminovos_destacados_args );

        ?>

        <?php if( $_seminovos_destacados->have_posts() ) : ?>

            <div class="seminovos-lista-slick disable-caroussel row">

                <?php while( $_seminovos_destacados->have_posts() ) : $_seminovos_destacados->the_post(); ?>

                    <?php //get_template_part( 'template/spot','seminovos' ); ?>

                    <div class="col-xl-3 col-lg-4">

                        <?php get_template_part( 'template/spot','seminovos' ); ?>

                    </div>

                <?php endwhile ?>

            </div>

            <?php 
            echo "<div class='text-center'>";
            echo '<a class="btn btn-secondary" href="'.home_url().'/seminovos" style="background-color:#ff0000;box-shadow:0 2px 4px rgba(0,0,0,1);border:0;    padding: 12px 35px;">Veja o estoque completo</a>';
            echo "</div></br>"; ?>

        <?php endif; ?>

    </div>

</section>