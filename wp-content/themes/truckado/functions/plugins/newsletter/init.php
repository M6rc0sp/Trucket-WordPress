<?php
// Add scripts to wp_footer()
function newsletter_footer_script() {
	$url = get_bloginfo('template_directory').'/functions/plugins/newsletter';
    echo '<script src="'.$url.'/script.js"></script>';

}
add_action( 'wp_footer', 'newsletter_footer_script' );

// Plugin Create LEAD to Newsletter

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function cpt_leads() {

	$labels = array(
		'name'               => __( 'Newsletter', 'text-domain' ),
		'singular_name'      => __( 'Lead', 'text-domain' ),
		'add_new'            => _x( 'Adicionar novo lead', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Adicionar novo lead', 'text-domain' ),
		'edit_item'          => __( 'Editar lead', 'text-domain' ),
		'new_item'           => __( 'Novo lead', 'text-domain' ),
		'view_item'          => __( 'Ver lead', 'text-domain' ),
		'search_items'       => __( 'Buscar lead', 'text-domain' ),
		'not_found'          => __( 'Nenhum lead encontrado', 'text-domain' ),
		'not_found_in_trash' => __( 'Nenhum lead encontrado no lixo', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent lead:', 'text-domain' ),
		'menu_name'          => __( 'Newsletter', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-email',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => false,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => false,
		'can_export'          => true,
		'rewrite'             => false,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'custom-fields',
		),
	);

	register_post_type( 'cpt-newsletter', $args );
}

add_action( 'init', 'cpt_leads' );

// Add the custom columns to the book post type:
add_filter( 'manage_cpt-newsletter_posts_columns', 'set_custom_edit_newsletter_columns' );
function set_custom_edit_newsletter_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['date'] );

    $columns['nome'] = __( 'Nome', 'your_text_domain' );
    $columns['empresa'] = __( 'Empresa', 'your_text_domain' );
    $columns['telefone'] = __( 'Telefone', 'your_text_domain' );
    $columns['local'] = __( 'Local', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_cpt-newsletter_posts_custom_column' , 'custom_newsletter_column', 10, 2 );
function custom_newsletter_column( $column, $post_id ) {
    switch ( $column ) {

        case 'nome' :
            echo get_post_meta( $post_id , 'nome' , true ); 
            break;
        case 'empresa' :
            echo get_post_meta( $post_id , 'empresa' , true ); 
            break;
        case 'telefone' :
            echo get_post_meta( $post_id , 'telefone' , true ); 
            break;
        case 'local' :
            echo get_post_meta( $post_id , 'local' , true ); 
            break;

    }
}

// ADD MENU PAGE
add_action('admin_menu', 'create_page_to_export_news_on_csv');
function create_page_to_export_news_on_csv() {
	add_submenu_page(
		$parent_slug	= 'edit.php?post_type=cpt-newsletter',
		$page_title		= 'Exportar CSV',
		$menu_title		= 'Exportar CSV',
		$capability 	= 'manage_options',
		$menu_slug		= 'export',
		$function 		= 'export_as_csv'
	);
}

function export_as_csv(){
?>
	 <div class="wrap">
        <h1><?php _e( 'Exportar contatos', 'mvl' ); ?></h1>
        <p><button id="export" data-type="csv" class="button button-primary button-large"><?php _e( 'Exportar em CSV', 'mvl' ); ?></button></p>
    </div>

    <script type="text/javascript">
    	$a = jQuery.noConflict();
    	$a(document).ready(function(){
    		$a('#export').on('click','',function(data){
    			var themeUrl = "<?php bloginfo('template_directory')?>";
    			var wnd = window.open(themeUrl+'/functions/plugins/newsletter/exportCsv.php');
			    setTimeout(function() {
			      wnd.close();
			    }, 5000);
			    return false;
			});	
    	});
    	

    </script>
<?php
}