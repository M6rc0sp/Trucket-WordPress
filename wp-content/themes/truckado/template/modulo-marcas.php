<section class="modulo-marcas">
    <div class="section-title-secondary">
        <h2>Marcas que trabalhamos</h2>
    </div>

    <div class="marcas-lista">
        <?php
        $marcas = get_terms(array(
            'taxonomy'      => 'tax-seminovos-marcas',
            'meta_key'      => 'logotipo',
            'meta_value'    => "",
            'meta_compare'  => "!=",
            'hide_empty'    => 0
        ));
        ?>
        <?php if( $marcas ) : ?>
            <ul>
            <?php foreach($marcas as $marca) : ?>
                <?php $img = get_field('logotipo',$marca); ?>
                <?php if( isset($img['url']) ) : ?>
                <li>
                    <a href="<?php echo get_term_link( $marca, $marca->taxonomy ); ?>">
                        <img src="<?php echo $img['url'] ?>">
                    </a>
                </li>
                <?php endif; ?>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>