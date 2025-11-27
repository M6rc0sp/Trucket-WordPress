<?php get_header() ?>
<article class="single-seminovos">
    <div class="container single-wrap">
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <a href="<?php echo home_url() ?>" title="Homepage">Home</a>
                        »
                        <a href="<?php echo home_url() ?>/seminovos" title="Seminovos" style="color:#ff0000">Veja nosso estoque</a>
                    </div>
                    <?php $marcas = get_the_terms( get_the_ID(), 'tax-seminovos-marcas' );?>
                    <?php if( $marcas ) : ?>
                        <div class="single-seminovos-marcas">
                            <ul>
                                <?php foreach ($marcas as $marca) : ?>
                                    <li>
										<?php if( get_field('icone_svg',$marca) ) : ?>
											<a href="<?php echo get_term_link( $marca->term_id, $marca->taxonomy ); ?>" class="">
												<?php echo get_field('icone_svg',$marca); ?>
											</a>
										<?php else : ?>
                                        <a href="<?php echo get_term_link( $marca->term_id, $marca->taxonomy ); ?>" class="btn btn-outline-secondary btn-sm">
                                            <?php echo $marca->name; ?>
                                        </a>
										<?php endif; ?>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row seminovo-header">

                <div class="col-md-8">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="col-md-4">
                    <div class="seminovos-price">
                        <?php if( get_field('preco_de') ) : ?>
                            <span class="price-from">R$<?php echo price(get_field('preco_de')) ?></span><br/>
                        <?php endif; ?>
                        <?php if( get_field('preco_de_venda') ) : ?>
                            <span class="price-to">R$<?php echo price(get_field('preco_de_venda')) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    
                    <div class="seminovos-img">

                        <div class="seminovo-thumbnail-slick">
                            <?php if( get_field('galeria_de_imagens') ) : ?>

                                <?php
                                    
                                    if( gettype( get_field('galeria_de_imagens') ) == "array" ) {
                                        $gallery = get_field('galeria_de_imagens');
                                    } else {
                                        $gallery = explode( ',' , get_field('galeria_de_imagens') );
                                    }
                                    
                                    ?>
                                    
                                <?php foreach ($gallery as $k_img => $v_img) : ?>
                                
                                <?php
                                    if( gettype( get_field('galeria_de_imagens') ) == "array" ) {
                                        $v_img = $v_img['id'];
                                    }
                                ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php echo wp_get_attachment_image_src($v_img,'full')[0]?>" class="venobox" data-gall="product-images">
                                            <img src="<?php echo wp_get_attachment_image_src($v_img,'full')[0]?>" alt="">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <?php if( get_field('selos') ) : ?>
                            <div class="seminovos-selos">
                                <?php $selos = get_field('selos'); ?>
                                <ul>
                                    <?php foreach ($selos as $selo) : ?>
                                    <li><span style="background-color:<?php echo $selo['cor_do_selo'] ?>"><?php echo $selo['valor_do_selo'] ?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="icones-destaque">
                        <ul>
                            <?php
                            $ano_tax = get_the_terms( get_the_ID(), 'tax-seminovos-ano' );
                            if(get_field('ano') && get_field('ano')!=" " || $ano_tax) : ?>
                            <li>
                                <span class="icone">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.939" height="26.367" viewBox="0 0 24.939 26.367"> <g id="Grupo_11" data-name="Grupo 11" transform="translate(0.5 0.5)"> <g id="Grupo_5" data-name="Grupo 5"> <path id="Caminho_22" data-name="Caminho 22" d="M40.488,34.787a2.913,2.913,0,0,1-2.977,2.845H19.527a2.913,2.913,0,0,1-2.977-2.845V17.6a2.913,2.913,0,0,1,2.977-2.845H37.512A2.913,2.913,0,0,1,40.489,17.6V34.787Z" transform="translate(-16.55 -12.266)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <g id="Grupo_4" data-name="Grupo 4" transform="translate(4.589 8.687)"> <g id="Grupo_2" data-name="Grupo 2"> <rect id="Retângulo_4" data-name="Retângulo 4" width="6.142" height="4.699" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <rect id="Retângulo_5" data-name="Retângulo 5" width="6.142" height="4.699" transform="translate(8.619)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> </g> <g id="Grupo_3" data-name="Grupo 3" transform="translate(0 7.204)"> <rect id="Retângulo_6" data-name="Retângulo 6" width="6.142" height="4.699" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <rect id="Retângulo_7" data-name="Retângulo 7" width="6.142" height="4.699" transform="translate(8.619)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> </g> </g> <line id="Linha_1" data-name="Linha 1" y2="4.978" transform="translate(7.66)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <line id="Linha_2" data-name="Linha 2" y2="4.978" transform="translate(16.278)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> </g> </g> </svg>
                                </span>
                                <span class="valor">
                                    <?php
                                    
                                    if( get_field('ano') && get_field('ano')!=" " ) {
                                        $ano = get_field('ano');
                                    } elseif( $ano_tax ) {
                                        $ano = $ano_tax[0]->name;
                                    } else {
                                        $ano = "-";
                                    }
                                    
                                    ?>
                                    <?php echo $ano ?>
                                </span>
                            </li>
                            <?php endif; ?>
                            <?php
                            $tracao_tax = get_the_terms( get_the_ID(), 'tax-seminovos-tracao' );
                            if(get_field('tracao') && get_field('tracao')!=" " || $tracao_tax) : ?>
                            <li>
                                <span class="icone">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.585" height="21.611" viewBox="0 0 22.585 21.611"> <g id="Grupo_12" data-name="Grupo 12" transform="translate(0.5 0.5)"> <g id="Grupo_6" data-name="Grupo 6" transform="translate(0 0)"> <ellipse id="Elipse_1" data-name="Elipse 1" cx="1.427" cy="1.363" rx="1.427" ry="1.363" transform="translate(17.321 16.536)" fill="#a5adb7"/> <ellipse id="Elipse_2" data-name="Elipse 2" cx="1.427" cy="1.363" rx="1.427" ry="1.363" transform="translate(1.411 16.536)" fill="#a5adb7"/> <ellipse id="Elipse_3" data-name="Elipse 3" cx="1.427" cy="1.363" rx="1.427" ry="1.363" transform="translate(17.321 1.348)" fill="#a5adb7"/> <line id="Linha_3" data-name="Linha 3" y2="15.188" transform="translate(21.585 2.712)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <line id="Linha_4" data-name="Linha 4" x1="15.91" transform="translate(2.838 20.611)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <line id="Linha_5" data-name="Linha 5" y1="15.311" x2="16.04" transform="translate(0.764 0.74)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <ellipse id="Elipse_6" data-name="Elipse 6" cx="2.838" cy="2.712" rx="2.838" ry="2.712" transform="translate(0 15.188)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <ellipse id="Elipse_5" data-name="Elipse 5" cx="2.838" cy="2.712" rx="2.838" ry="2.712" transform="translate(15.91 15.188)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <ellipse id="Elipse_4" data-name="Elipse 4" cx="2.838" cy="2.712" rx="2.838" ry="2.712" transform="translate(15.91)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> </g> </g> </svg>
                                </span>
                                <span class="valor">
                                <?php
                                    
                                    if( get_field('tracao') && get_field('tracao')!=" " ) {
                                        $tracao = get_field('tracao');
                                    } elseif( $tracao_tax ) {
                                        $tracao = $tracao_tax[0]->name;
                                    } else {
                                        $tracao = "-";
                                    }
                                    
                                    ?>
                                    <?php echo $tracao ?>
                                </span>
                            </li>
                            <?php endif; ?>
                            <?php if( get_field('km') ) : ?>
                            <li>
                                <span class="icone">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.938" height="16.043" viewBox="0 0 24.938 16.043"> <g id="Grupo_13" data-name="Grupo 13" transform="translate(0.5 0.5)"> <g id="Grupo_7" data-name="Grupo 7" transform="translate(0)"> <path id="Caminho_31" data-name="Caminho 31" d="M119.509,37.732a3,3,0,0,0,.482-1.62,3.291,3.291,0,0,0-6.574,0,3,3,0,0,0,.481,1.62Z" transform="translate(-104.704 -22.688)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <path id="Caminho_23" data-name="Caminho 23" d="M118.6,35.693l5.2-6.093-6.683,4.579a1.126,1.126,0,0,0-.281.18,1.057,1.057,0,0,0-.051,1.542,1.179,1.179,0,0,0,1.613.049A1.082,1.082,0,0,0,118.6,35.693Z" transform="translate(-105.485 -21.715)" fill="#a5adb7" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="0.802"/> <path id="Caminho_24" data-name="Caminho 24" d="M127.5,28.549a8.23,8.23,0,0,0-2.864-3.425l.714-1.142a9.577,9.577,0,0,1,3.474,4.158Z" transform="translate(-107.575 -20.092)" fill="#a5adb7"/> <path id="Caminho_25" data-name="Caminho 25" d="M114.177,21.926a10.483,10.483,0,0,1,2.793-.379,10.264,10.264,0,0,1,2.774.379l-.49,1.245a8.856,8.856,0,0,0-2.283-.3,9.088,9.088,0,0,0-2.307.3Z" transform="translate(-104.899 -19.389)" fill="#a5adb7"/> <path id="Caminho_26" data-name="Caminho 26" d="M105.564,28.134a9.6,9.6,0,0,1,3.473-4.157l.714,1.141a8.269,8.269,0,0,0-2.864,3.427Z" transform="translate(-102.696 -20.091)" fill="#a5adb7"/> <path id="Caminho_27" data-name="Caminho 27" d="M105.23,38.055a9,9,0,0,1-.583-2.146,9.138,9.138,0,0,1-.068-1.819l1.38.179a7.942,7.942,0,0,0,.065,1.466,7.863,7.863,0,0,0,.693,2.319H105.23Z" transform="translate(-102.439 -23.012)" fill="#a5adb7"/> <path id="Caminho_28" data-name="Caminho 28" d="M128.223,33.484Z" transform="translate(-108.492 -22.837)" fill="#a5adb7"/> <path id="Caminho_29" data-name="Caminho 29" d="M128.282,38.056a7.863,7.863,0,0,0,.761-3.782l1.378-.18a9.112,9.112,0,0,1-.633,3.962Z" transform="translate(-108.507 -23.013)" fill="#a5adb7"/> <path id="Caminho_30" data-name="Caminho 30" d="M125.031,33.556a10.91,10.91,0,0,0,.618-3.605,11.981,11.981,0,0,0-23.938,0,10.9,10.9,0,0,0,.618,3.605Z" transform="translate(-101.71 -18.513)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> </g> </g> </svg>
                                </span>
                                <span class="valor">
                                    <?php the_field('km')?>
                                </span>
                            </li>
                            <?php endif;?>
                            <?php if( get_field('motor') ) : ?>
                            <li>
                                <span class="icone">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.782" height="18.402" viewBox="0 0 25.782 18.402"> <g id="Grupo_14" data-name="Grupo 14" transform="translate(0.5 0.5)"> <g id="Grupo_10" data-name="Grupo 10"> <path id="Caminho_32" data-name="Caminho 32" d="M151.709,27.56h-2.792v4.615h2.512l2.577,3.985h9.405l2.576-3.985V23.446H154.2Z" transform="translate(-145.072 -18.758)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <rect id="Retângulo_8" data-name="Retângulo 8" width="2.448" height="8.729" transform="translate(22.334 4.688)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <rect id="Retângulo_9" data-name="Retângulo 9" width="2.448" height="7.597" transform="translate(0 7.249)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <path id="Caminho_33" data-name="Caminho 33" d="M160.351,20.375H162.8V19.193h2.751V16.854H157.6v2.339h2.751Z" transform="translate(-147.293 -16.854)" fill="none" stroke="#a5adb7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/> <path id="Icon_weather-lightning" data-name="Icon weather-lightning" d="M9.552,16.451h.207L13.4,11.059q.071-.143-.079-.143h-1.5L13.4,8.03c.048-.1.011-.143-.106-.143H11.279a.192.192,0,0,0-.154.1L9.653,11.9c-.011.1.021.143.1.143H11.21Z" transform="translate(2.828 -0.453)" fill="#a5adb7"/> </g> </g> </svg>
                                </span>
                                <span class="valor">
                                    <?php the_field('motor')?>
                                </span>
                            </li>
                            <?php endif;?>

                            <?php if( get_field('icones_-_caracteristicas') ) : ?>
                                <?php foreach (get_field('icones_-_caracteristicas') as $k_icones => $v_icones) : ?>
                                    <li>
                                        <span class="icone">
                                            <img src="<?php echo $v_icones['icone']['url'] ?>" alt="<?php echo $v_icones['icone']['alt'] ?>">
                                        </span>
                                        <span class="valor">
                                            <?php echo $v_icones['valor'] ?>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>  
                    </div>
                        
                    <div class="post-content post-content-collapsed">
                        <?php the_content() ?>
                    </div>
                    <div class="seminovo-video">
                        <?php $youtube = get_field('video_do_youtube'); ?>
                        <?php if( $youtube ) : ?>
                            <?php
                            $yt_id = false;
                            if( strpos($youtube,'?v=')>0 ){
                                $yt_id = explode("?v=",$youtube);
                            } else {
                                $yt_array = explode("/",$youtube);
                                $yt_id[1] = end($yt_array);
                            }

                            if( $yt_id ) : 
                            ?>
                            <div class="videoWrapper">
                                <iframe
                                    width="100%"
                                    height="315"
                                    src="https://www.youtube.com/embed/<?php echo $yt_id[1]?>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                            </div>

                            <?php endif; // $yt_id ?>
                        <?php endif; //$youtube ?>
                    </div>
                        
                </div>
                <div class="col-md-4">
                    <?php dynamic_sidebar( 'sidebar-single-seminovos' ); ?>
                    <div class="share-this">
                        <small>Compartilhe:</small><br/>
                        <?php echo linkShare('facebook','<svg xmlns="http://www.w3.org/2000/svg" width="35.997" height="35.779" viewBox="0 0 35.997 35.779"><path id="Icon_simple-facebook" data-name="Icon simple-facebook" d="M36,18a18,18,0,1,0-20.811,17.78V23.2h-4.57V18h4.57V14.033c0-4.511,2.687-7,6.8-7a27.68,27.68,0,0,1,4.029.352v4.429H23.744a2.6,2.6,0,0,0-2.933,2.811V18H25.8L25,23.2H20.811V35.779A18,18,0,0,0,36,18Z"/></svg>'); ?>
                        <?php echo linkShare('twitter','<svg xmlns="http://www.w3.org/2000/svg" width="36" height="29.239" viewBox="0 0 36 29.239"><path id="Icon_awesome-twitter" data-name="Icon awesome-twitter" d="M32.3,10.668c.023.32.023.64.023.959,0,9.754-7.424,20.992-20.992,20.992A20.85,20.85,0,0,1,0,29.307a15.263,15.263,0,0,0,1.782.091,14.776,14.776,0,0,0,9.16-3.152,7.391,7.391,0,0,1-6.9-5.117,9.3,9.3,0,0,0,1.393.114,7.8,7.8,0,0,0,1.942-.251,7.379,7.379,0,0,1-5.916-7.241V13.66A7.431,7.431,0,0,0,4.8,14.6,7.389,7.389,0,0,1,2.513,4.728a20.972,20.972,0,0,0,15.213,7.721,8.329,8.329,0,0,1-.183-1.69A7.385,7.385,0,0,1,30.312,5.711a14.526,14.526,0,0,0,4.683-1.782,7.358,7.358,0,0,1-3.244,4.066A14.791,14.791,0,0,0,36,6.853a15.86,15.86,0,0,1-3.7,3.815Z" transform="translate(0 -3.381)"/></svg>'); ?>
                        <?php echo linkShare('linkedin','<svg xmlns="http://www.w3.org/2000/svg" width="31.5" height="31.5" viewBox="0 0 31.5 31.5"><path id="Icon_awesome-linkedin" data-name="Icon awesome-linkedin" d="M29.25,2.25H2.243A2.26,2.26,0,0,0,0,4.521V31.479A2.26,2.26,0,0,0,2.243,33.75H29.25a2.266,2.266,0,0,0,2.25-2.271V4.521A2.266,2.266,0,0,0,29.25,2.25Zm-19.73,27H4.852V14.217H9.527V29.25ZM7.186,12.164A2.707,2.707,0,1,1,9.893,9.457a2.708,2.708,0,0,1-2.707,2.707ZM27.021,29.25H22.352V21.938c0-1.744-.035-3.987-2.426-3.987-2.433,0-2.805,1.9-2.805,3.86V29.25H12.452V14.217h4.479V16.27h.063a4.917,4.917,0,0,1,4.423-2.426c4.725,0,5.6,3.115,5.6,7.165Z" transform="translate(0 -2.25)"/></svg>'); ?>
                        <?php echo linkShare('whatsapp','<svg xmlns="http://www.w3.org/2000/svg" width="31.5" height="31.5" viewBox="0 0 31.5 31.5"><path id="Icon_awesome-whatsapp" data-name="Icon awesome-whatsapp" d="M26.782,6.827A15.614,15.614,0,0,0,2.215,25.664L0,33.75l8.276-2.173a15.562,15.562,0,0,0,7.46,1.9h.007A15.76,15.76,0,0,0,31.5,17.866,15.671,15.671,0,0,0,26.782,6.827ZM15.743,30.846a12.951,12.951,0,0,1-6.609-1.807l-.471-.281L3.755,30.045l1.308-4.788-.309-.492a13,13,0,1,1,24.11-6.9,13.119,13.119,0,0,1-13.12,12.98Zm7.116-9.717c-.387-.2-2.306-1.139-2.665-1.266s-.619-.2-.879.2-1.005,1.266-1.237,1.533-.457.3-.844.1a10.617,10.617,0,0,1-5.309-4.641c-.4-.689.4-.64,1.146-2.13a.723.723,0,0,0-.035-.682c-.1-.2-.879-2.116-1.2-2.9-.316-.759-.64-.654-.879-.668s-.485-.014-.745-.014a1.445,1.445,0,0,0-1.041.485A4.383,4.383,0,0,0,7.8,14.4a7.641,7.641,0,0,0,1.589,4.036c.2.26,2.749,4.2,6.666,5.892,2.475,1.069,3.445,1.16,4.683.977a4,4,0,0,0,2.63-1.856,3.262,3.262,0,0,0,.225-1.856C23.505,21.417,23.245,21.319,22.859,21.129Z" transform="translate(0 -2.25)"/></svg>'); ?>
                    </div>
                </div>
            </div>

            <?php
            $veja_tambem_tax_remove = get_the_ID();
            $veja_tambem_tax = get_the_terms( get_the_ID(), 'tax-seminovos-marcas' );
            ?>
            <?php endwhile ?>
            <?php wp_reset_query(); ?>
        <?php endif ?>

    </div>
</article>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php get_template_part('template/modulo','whatsappcta') ?>
        </div>
    </div>
</div>

<?php if( $veja_tambem_tax ) : ?>
<div class="container">
 
    <?php
        $_seminovos_veja_tambem = array(
            'post_type' => 'cpt-seminovos',
            'posts_per_page'    => 12,
            'post__not_in'     => array( $veja_tambem_tax_remove ),
            'tax_query'         => array(
                array(
                'taxonomy'	=> $veja_tambem_tax[0]->taxonomy,
                'field'	=> 'slug',
                'terms'	=> $veja_tambem_tax[0]->slug,
                ))
            );
        $_seminovos_veja_tambem_query = new WP_Query($_seminovos_veja_tambem);
        ?>
    <?php if( $_seminovos_veja_tambem_query->have_posts() ) : ?>

        <div class="row">
            <div class="col-md-12">
                <section class="modulo-seminovos">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2><i class="icon-ico-arrow-right"></i>Quem viu, também gostou!</h2>
                            </div>
                        </div>
                    </div>
                        
                    <div class="seminovos-lista">
                        <div class="seminovos-lista-slick">
                            <?php while( $_seminovos_veja_tambem_query->have_posts() ) : $_seminovos_veja_tambem_query->the_post(); ?>
                                <?php get_template_part( 'template/spot','seminovos' ); ?>
                            <?php endwhile ?>
                        </div>
                    </div>
                    </section>
            </div>
        </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

</div>
<?php endif; ?>
<?php get_footer() ?>