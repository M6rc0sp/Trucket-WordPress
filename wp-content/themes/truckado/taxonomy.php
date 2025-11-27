<?php get_header() ?>

<div class="container">
	<div class="row">
        <div class="col-md-3">
            <?php $taxonomies = get_object_taxonomies( 'cpt-seminovos', 'objects' ); ?>

            <form action="" class="form-filter-container">
                <div class="widget-filter widget-filter-<?php echo $tax->name; ?>">
                    <div class="widget-filter-fields">
                        <div class="form-group">
                            <label>
                                <input type="checkbox">
                                <span class="checkbox-item">Preço de custo</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="widget-filter widget-filter-collap widget-close widget-filter-<?php echo $tax->name; ?>">
                    <div class="widget-filter-title">
                        <h3>Ordenar</h3>
                        <i class="icon-ico-arrow-down"></i>
                    </div>
                    <div class="widget-filter-fields">
                        <select name="" id="" class="form-control">
                            <option value="">Menor preço</option>
                            <option value="">Maior preço</option>
                        </select>
                    </div>
                </div>

                <div class="widget-filter widget-filter-collap widget-close widget-filter-<?php echo $tax->name; ?>">
                    <div class="widget-filter-title">
                        <h3>Checkbox</h3>
                        <i class="icon-ico-arrow-down"></i>
                    </div>
                    <div class="widget-filter-fields">
                        <div class="form-group">
                            <label>
                                <input type="checkbox">
                                <span class="checkbox-item">Opt 01</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox">
                                <span class="checkbox-item">Opt 02</span>
                            </label>
                        </div>  
                        <div class="form-group">
                            <label>
                                <input type="checkbox">
                                <span class="checkbox-item">Opt 03</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="widget-filter widget-filter-collap widget-close widget-filter-<?php echo $tax->name; ?>">
                    <div class="widget-filter-title">
                        <h3>Campo</h3>
                        <i class="icon-ico-arrow-down"></i>
                    </div>
                    <div class="widget-filter-fields">
                        <input type="text" class="form-control">
                    </div>
                </div>
                
                <div class="widget-filter widget-filter-<?php echo $tax->name; ?>">
                    <div class="widget-filter-title">
                        <a href="#">
                            <h3>Link</h3>
                            <i class="icon-ico-link"></i>
                        </a>
                    </div>

                </div>
            
                <button class="btn btn-outline-secondary">
                    Filtrar
                </button>

            </form>


            <?php foreach($taxonomies as $tax) : ?>
                <!-- <div class="widget-filter widget-filter-<?php echo $tax->name; ?>">
                    <div class="widget-filter-title">
                        <h3><?php echo $tax->label; ?></h3>
                        <i class="icon-ico-arrow-down"></i>
                        <i class="icon-ico-link"></i>
                    </div>
                    <div class="widget-filter-fields">
                        <input type="text" class="form-control">

                        <select name="" id="" class="form-control">
                            <option value="">Opt 01</option>
                            <option value="">Opt 02</option>
                            <option value="">Opt 03</option>
                        </select>
                    </div>
                </div> -->
            <?php endforeach; ?>

            <pre style="display:none">
                <?php var_dump($taxonomies) ?>
            </pre>
        </div>
		<div class="col-md-9">

            <div class="seminovos-lista">
				<?php
					$tax = get_queried_object();
                    $_seminovos_destacados = new WP_Query(array(
                        'post_type' 		=> 'cpt-seminovos',
						'posts_per_page'    => 12,
						'tax_query'			=> array(
							'taxonomy'	=> $tax->taxonomy,
							'field'	=> 'slug',
							'terms'	=> $tax->slug,
						)
					));

                ?>
                <?php if( $_seminovos_destacados->have_posts() ) : ?>
                    <div class="row">
                        <?php while( $_seminovos_destacados->have_posts() ) : $_seminovos_destacados->the_post(); ?>
                            <div class="col-md-4">
                                <?php get_template_part( 'template/spot','seminovos' ); ?>
                            </div>
                        <?php endwhile ?>

                        <?php 
                        if (  $_seminovos_destacados->max_num_pages > 1 ){
                            echo '<a class="seminovos_loadmore btn btn-outline-secondary" href="#">Carregar mais</a>';
                        }
                        
                        ?>
                    </div>
                <?php endif; ?>
            </div>

		</div>
	</div>
</div>
<?php get_footer() ?>