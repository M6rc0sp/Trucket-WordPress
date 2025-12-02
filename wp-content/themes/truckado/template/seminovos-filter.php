<?php $taxonomies = get_object_taxonomies( 'cpt-seminovos', 'objects' ); ?>

<pre style="display:none">
    <?php var_dump( seminovos_query() ) ?>
</pre>

<form action="<?php echo home_url() ?>/seminovos" method="get" class="form-filter-container">
    <div class="widget-filter widget-filter-">
        <div class="widget-filter-fields">
            <div class="form-group">
                <label>
                    <input
                        type="checkbox"
                        name="preco_de_custo"
                        value="1"
                        <?php echo ( isset( $_GET['preco_de_custo'] ) && $_GET['preco_de_custo']=='1') ? 'checked': "" ;?>
                        >
                    <span class="checkbox-item">Preço de custo</span>
                </label>
            </div>
        </div>
    </div>

    <div class="widget-filter widget-filter-collap">
        <div class="widget-filter-title">
            <h3>Ordenar</h3>
            <i class="icon-ico-arrow-down"></i>
        </div>
        <div class="widget-filter-fields">
            <select name="order" id="" class="form-control">
                <option value="asc" <?php echo ( isset( $_GET['order'] ) && $_GET['order']=='asc') ? 'selected': "" ;?>>Menor preço</option>
                <option value="desc" <?php echo ( isset( $_GET['order'] ) && $_GET['order']=='desc') ? 'selected': "" ;?>>Maior preço</option>
            </select>
        </div>
    </div>

    <?php foreach($taxonomies as $tax) : ?>
        <?php if( $tax->name && $tax->name=='tax-seminovos-outros') :?>

            <?php foreach( get_terms( array('taxonomy'=>$tax->name,'hide_empty'=>0) ) as $tax_item ) :?>
                <div class="widget-filter widget-filter-link widget-filter-<?php echo $tax_item->slug; ?> <?php echo ( isset( $_GET[$tax->name] ) && in_array($tax_item->slug,$_GET[$tax->name])) ? 'checked': "" ;?>">
                    <div class="widget-filter-title">
                        <a href="<?php echo get_term_link( $tax_item, $tax_item->taxonomy ) ?>">
                            <h3><?php echo $tax_item->name; ?></h3>
                            <i class="icon-ico-link"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            
        <?php elseif( $tax->name ) :?>
        <div class="widget-filter widget-filter-collap <?php echo ( isset( $_GET[$tax->name] ) ) ? : "widget-close" ;?> widget-filter__<?php echo $tax->name; ?>">
            <div class="widget-filter-title">
                <h3><?php echo $tax->label ?></h3>
                <i class="icon-ico-arrow-down"></i>
            </div>
            <div class="widget-filter-fields">
                <?php foreach( get_terms( $tax->name ) as $tax_item ) :?>
                <div class="form-group">
                    <label>
                        <input
                            type="checkbox"
                            name="<?php echo $tax->name; ?>[]"
                            value="<?php echo $tax_item->slug; ?>"
                            <?php echo ( isset( $_GET[$tax->name] ) && in_array($tax_item->slug,$_GET[$tax->name])) ? 'checked': "" ;?>
                            >
						<span class="checkbox-item">
						<?php if( get_field('icone_svg',$tax_item) ) : ?>
							<?php echo get_field('icone_svg',$tax_item); ?>
						<?php else : ?>
							<?php echo $tax_item->name; ?>
						<?php endif; ?>
						</span>
                        
                    </label>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif;?>
    <?php endforeach; ?>

    <button class="btn btn-outline-secondary">
        Filtrar
    </button>

</form>