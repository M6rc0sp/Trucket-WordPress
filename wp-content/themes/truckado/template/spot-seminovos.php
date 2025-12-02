<article class="spot-seminovos">
    
    <?php //var_dump( get_field('galeria_de_imagens') ) ?>
    
    <div class="seminovos-img">
        <a href="<?php the_permalink() ?>">
            <?php if( get_field('galeria_de_imagens') ) : ?>
                <?php
                if( gettype( get_field('galeria_de_imagens') ) == "array" ) {
                    $imageField = get_field('galeria_de_imagens');
                    $image =  wp_get_attachment_image_src($imageField[0]['id'],'medium')[0];;
                } else {
                    $gallery = explode( ',' , get_field('galeria_de_imagens') );
                    $image = wp_get_attachment_image_src($gallery[0],'medium')[0];
                }
                
                ?>
                <pre style="display:none">
                    <?php echo gettype( get_field('galeria_de_imagens') ) ?>
                    <?php var_dump( $imageField ) ?>
                    <?php var_dump( $image ) ?>
                </pre>
                
                    <?php if( isset($image) ) : ?>
                        <img src="<?php echo $image ?>" alt="<?php bloginfo('title'); ?>">
                    <?php else:  ?>
                        <img src="<?php theImgAssets() ?>/default.png" alt="<?php bloginfo('title'); ?>">
                    <?php endif; ?>

            <?php else:  ?>
                <img src="<?php theImgAssets() ?>/default.png" alt="<?php bloginfo('title'); ?>">
            <?php endif; ?>
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
        </a>
    </div>
    <div class="seminovos-title">
        <a href="<?php the_permalink() ?>">
            <h2><?php the_title() ?></h2>
        </a>
    </div>
    <div class="seminovos-price-container">
        <div class="seminovos-price">
            <?php if( get_field('preco_de') ) : ?>
                <span class="price-from">de R$<?php echo price( get_field('preco_de') ) ?></span>
            <?php endif; ?>
            <?php if( get_field('preco_de_venda') ) : ?>
                <span class="price-to">por R$<?php echo price( get_field('preco_de_venda') ) ?></span>
            <?php endif; ?>
        </div>
        <a href="<?php the_permalink() ?>?financiamento" class="spot-simule">Simule</a>

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
	<div class="seminovos-cta">
		<div class="share">
			<?php $titulo = get_the_title();
				$titulo = str_replace(" ","%20",$titulo);
			?>
			<a href="https://www.facebook.com/share.php?u=<?php the_permalink();?>" target="_blank" title="Facebook"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/icon-facebook.png"></a>
			<a href="https://twitter.com/intent/tweet?text=<?php echo $titulo;?>&url=<?php the_permalink();?>" target="_blank" title="Twitter"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/icon-twitter.png"></a>
			<?php /*?><a href="http://m.me/truckadoveiculos" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/icon-messenger.png"></a><?php */?> 
			<a href="https://wa.me/?text=<?php echo $titulo;?>%20<?php the_permalink();?>" target="_blank" title="WhatsApp"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/icon-whatsapp.png"></a>
		</div>
        <a href="<?php the_permalink() ?>" class="btn btn-outline-secondary">Ver detalhes</a>
    </div>
    
    
</article>