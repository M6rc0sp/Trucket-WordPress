<article class="spot-clientes">
    <a href="<?php the_permalink() ?>">
        <div class="clientes-img">
            <?php if( has_post_thumbnail()) : ?>				
                <?php the_post_thumbnail( 'medium_large' ) ?>
            <?php else : ?>
                <img src="<?php theImgAssets() ?>/default.png" alt="<?php bloginfo('title'); ?>">
            <?php endif; ?>
        </div>
        <div class="clientes-title">
            <h2><?php the_title() ?></h2>
        </div>
    </a>
</article>