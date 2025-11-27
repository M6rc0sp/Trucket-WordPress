<div class="widget widget-contato">
    <form action="">
        <h2>Gostou?<br/>Solicite um contato!</h2>
        <a href="tel:(41) 3069-4450" class="btn btn-primary">Ligar para (41) 3069-4450</a>
        <?php if( get_field('whatsapp') ) : ?>
        <a href="//wa.me/55<?php echo preg_replace('/[^0-9.]+/', '', get_field('whatsapp')) ?>" class="btn btn-primary btn-custom-whatsapp">WhatsApp <?php the_field('whatsapp') ?></a>
        <?php else : ?>
        <a href="//wa.me/5541987891592" class="btn btn-primary">WhatsApp (41) 9 8789-1592</a>
        <?php endif; ?>
    </form>
</div>