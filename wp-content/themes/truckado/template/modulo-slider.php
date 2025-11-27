<?php

$slider_args = array(
    'post_type'             => 'cpt-slider',
    'posts_per_page'        => -1,
    'meta_key'              => 'dispositivo',
    'meta_value'              => 'desktop',
    'tax_query' => array(
        array(
            'taxonomy' => 'tax-slider-local',
            'field'    => 'slug',
            'terms'    => $args,
        ),
    ),
);

$_SLIDER = new WP_Query($slider_args);
?>

<?php if( $_SLIDER->have_posts() ) : ?>
    <section class="main-slider main-slider-desktop d-none d-md-block slick-slider">
    <?php while( $_SLIDER->have_posts() ) : $_SLIDER->the_post(); ?>
        <?php global $post;?>
        <div class="slider-item">
            <?php if( has_post_thumbnail() ) : ?>
                <div class="slider-content-image" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>);">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <?php if( $post->post_content != '' ) : ?>
                <div class="slider-content-text" style="none">
                    <?php the_content() ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
    </section>
<?php else : ?>
    <div class="offset-main-slider"></div>
<?php endif; ?>
<?php wp_reset_query(); ?>

<?php

$slider_args = array(
    'post_type'             => 'cpt-slider',
    'posts_per_page'        => -1,
    'meta_key'              => 'dispositivo',
    'meta_value'              => 'mobile',
    'tax_query' => array(
        array(
            'taxonomy' => 'tax-slider-local',
            'field'    => 'slug',
            'terms'    => $args,
        ),
    ),
);

$_SLIDER = new WP_Query($slider_args);
?>

<?php if( $_SLIDER->have_posts() ) : ?>
    <section class="main-slider main-slider-mobile  d-block d-md-none slick-slider">
    <?php while( $_SLIDER->have_posts() ) : $_SLIDER->the_post(); ?>
        <?php global $post;?>
        <div class="slider-item">
            <?php if( has_post_thumbnail() ) : ?>
                <div class="slider-content-image" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>);">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <?php if( $post->post_content != '' ) : ?>
                <div class="slider-content-text" style="none">
                    <?php the_content() ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
    </section>
<?php else : ?>
    <div class="offset-main-slider"></div>
<?php endif; ?>
<?php wp_reset_query(); ?>