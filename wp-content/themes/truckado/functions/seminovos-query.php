<?php
function seminovos_query(){

    $_filter_args = array(
        'post_type'         => 'cpt-seminovos',
        'posts_per_page'    => 12,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    );
    
    $i=0;
    foreach( $_GET as $k_search=>$search ) {

        if($k_search==='term') {
            $_filter_args['s'] = $search; 
        }


        if($k_search==='order') {
            $_filter_args['orderby'] = 'meta_value_num';
            $_filter_args['meta_key'] = 'preco_de_venda';
            $_filter_args['order'] = $_GET['order'];  
        }
        
        
        if( strpos($k_search,'tax-')===0 ) {
            $_filter_args['tax_query'][$i]['taxonomy'] = $k_search;
            $_filter_args['tax_query'][$i]['field'] = 'slug';
            $_filter_args['tax_query'][$i]['terms'] = $search;
        }
        
        if( $k_search==='preco_de_custo') {
            $_filter_args['meta_query'][$i]['key'] = $k_search;
            $_filter_args['meta_query'][$i]['value'] = $search;
            $_filter_args['meta_query'][$i]['compare'] = '=';
        }
        
        $i++;
    }

    return $_filter_args;
}

function seminovos_loadmore(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
    ?>

        <?php if( have_posts() ) : ?>
                <?php while( have_posts() ) : the_post(); ?>
                    <div class="col-md-4">
                        <?php get_template_part( 'template/spot','seminovos' ); ?>
                    </div>
                <?php endwhile ?>
        <?php endif; ?>

    <?php
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_seminovos_loadmore', 'seminovos_loadmore'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_seminovos_loadmore', 'seminovos_loadmore'); // wp_ajax_nopriv_{action}