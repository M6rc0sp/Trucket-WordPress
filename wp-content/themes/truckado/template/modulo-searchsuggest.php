<?php  $suggests = new WP_query(array('post_type' => 'cpt-search-suggest')) ?>  
<?php  if( $suggests->have_posts()  ) : ?>
    <section class="search-suggest mb-2">
        <?php  while( $suggests->have_posts()  ) : $suggests->the_post(); ?>
            <div class="suggest-item">
                <a href="<?php the_field('link') ?>" class="btn btn-light btn-sm mb-1 mr-1">
                    <span><?php the_title() ?></span>
                </a>
            </div>
        <?php endwhile; ?>
    </section>
<?php endif; ?>