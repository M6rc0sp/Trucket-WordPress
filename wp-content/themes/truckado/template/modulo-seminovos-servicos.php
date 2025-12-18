<?php $tax = get_terms('tax-seminovos-services'); ?>
<?php if( $tax ) : ?>
<div class="widget widget-servicos">
    <?php foreach( $tax as $term ) : ?>
        <div class="service-box mb-2">
            <label class="d-block">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="service-info mr-2">
                        <h3 class="mb-0"><?php echo esc_html( $term->name ); ?></h3>
                    </div>
                    <div class="service-radio">
                        <input type="radio" name="services[]" id="" readonly value="<?php echo esc_html( $term->name ); ?>" data-price="<?php echo esc_html( get_field('price', $term) ); ?>">
                    </div>
                </div>
                <div class="service-price">
                    <?php the_field('price',$term) ?>
                    <?php //echo formatCurrency(get_field('price',$term), 'BRL', 'pt_BR') . PHP_EOL; ?>
                </div>
                <div class="service-description">
                    <p><?php echo $term->description ?></p>
                </div>
            </label>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>