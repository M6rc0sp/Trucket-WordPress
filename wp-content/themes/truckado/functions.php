<?php
require_once('config/init.php'); //Init de Config
require_once('functions/post-type.php'); //Custom Post Types
require_once('functions/sidebar.php'); //Custom Sidebar (dynamic_sidebay)
require_once('functions/taxonomies.php'); //Taxonomies
require_once('functions/metabox.php'); //Metaboxes
require_once('functions/admin_scheme.php'); //Admin Scheme
require_once('functions/shortcode.php'); //Shortcode
//require_once('functions/setup-seminovos.php'); //Shortcode
require_once('assets/add/acf-repeater/acf-repeater.php'); //ACF repeater
require_once('functions/seminovos-query.php'); //Shortcode



add_filter('template_directory_uri', function($uri) {
    return 'https://72.61.59.20/wp-content/themes/truckado';
});



//  PLUGINS
// require_once('functions/plugins/newsletter/init.php'); //Custom Sidebar (dynamic_sidebay)

function WPAG_scripts(){
	
	/*********** CSS ***********/
	//// Bootstrap
	wp_enqueue_style(
		'bootstrapCss',
		getAddAssets().'/bootstrap/css/bootstrap.min.css',
		array(),
		$ver = false,
		$media = 'all'
	);

	//// Fontawesome
	// wp_enqueue_style(
	// 	'fontawesomeCss',
	// 	getAddAssets().'/fontawesome/css/all.min.css',
	// 	array(),
	// 	$ver = false,
	// 	$media = 'all'
	// );

	//// Slick
	wp_enqueue_style(
		'slickCss',
		getAddAssets().'/slick/slick.css',
		array(),
		$ver = false,
		$media = 'all'
	);
	wp_enqueue_style(
		'slickThemeCss',
		getAddAssets().'/slick/slick-theme.css',
		array(),
		$ver = false,
		$media = 'all'
	);

	// Venobox
	wp_enqueue_style(
		'venoboxCss',
		getAddAssets().'/venobox2/venobox.css',
		array(),
		$ver = false,
		$media = 'all'
	);

	//// Main
	wp_enqueue_style(
		'mainCss', get_bloginfo('template_directory').'/assets/css/main.css',
		array(),
		$ver = '1.4',
		$media = 'all'
	);

	/*********** Javascript ***********/
	//// jQuery
	wp_enqueue_script('jquery');

	//// Slick
	wp_enqueue_script(
		'slickJs',
		getAddAssets().'/slick/slick.min.js',
		array('jquery')
	);
	//// SmartWhatsapp
	wp_enqueue_script(
		'smartWhatsappJs',
		getJsAssets().'/smartWhatsapp.js',
		array('jquery')
	);
	// Venobox
	wp_enqueue_script(
		'venoboxJs',
		getAddAssets().'/venobox2/venobox.js',
		array('jquery'),
		'2'
	);

	// Venobox
	wp_enqueue_script(
		'mhJs',
		getJsAssets().'/jquery.matchHeight-min.js',
		array('jquery')
	);
	
	// Instagram
	wp_enqueue_script(
		'instagramJs',
		getJsAssets().'/instagram.min.js',
		array('jquery'),
		$ver = "1.15"
	);

	//// Main
	global $wp_query;
	wp_register_script( 'mainJs', getJsAssets().'/main.js', array('jquery') );
	wp_localize_script( 'mainJs', 'params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		// 'posts' => json_encode( $wp_query->query_vars ),
		// 'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		// 'max_page' => $wp_query->max_num_pages
	),$ver = "1" );
	wp_enqueue_script( 'mainJs' );
	 
	$_seminovos = new WP_Query(seminovos_query());
	wp_register_script( 'seminovosJs', getJsAssets().'/seminovos.js', array('jquery'),$ver='1' );
	wp_localize_script( 'seminovosJs', 'params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode( seminovos_query() ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $_seminovos->max_num_pages
	) );
 	wp_enqueue_script( 'seminovosJs' );
}
add_action( 'wp_enqueue_scripts', 'WPAG_scripts' );

function WPAG_admin_scripts(){
    wp_enqueue_style(
		'schemeCss',
		getConfigAssets()."/css/default_scheme.css",
		array(),
		$ver = false,
		$media = 'all'
	);
}
add_action( 'admin_enqueue_scripts', 'WPAG_admin_scripts' );

// POSTS THUMBNAIL
add_theme_support('post-thumbnails' );

// MENU
register_nav_menus(array(
	'principal' => 'Principal',
	'secundario' => 'Secundário',
	'rodape' => 'Rodapé',
	'mobile' => 'Mobile',
));

// SANITIZE FILE NAME
function my_custom_file_name ( $filename ){
	$info = pathinfo( $filename );
	$ext = empty( $info['extension'] ) ? '' : '.' . $info['extension'];
	$name = basename( $filename, $ext );
	$finalFileName = sanitize_title( $name );
	// File name will be the same as the image file name, but sanitized.
	return $finalFileName . $ext;
}
add_filter( 'sanitize_file_name', 'my_custom_file_name', 100 );

// ONLY NUMS
function onlyNums($num){
	preg_match_all('!\d+!', get_option('mvl_whatsapp'), $num);
}

// Customizer
function mytheme_setup() {
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'mytheme_setup');

// Remove admin top bar
show_admin_bar(false);

// set_default_admin_color
function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'mvl'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

//admin_bar_menu
function mvl_wp_admin_bar_menu( $wp_admin_bar ) {
    // Remove customize, background and header from the menu bar.   
    $wp_admin_bar->remove_node( 'about' );   
    $wp_admin_bar->remove_node( 'wporg' );  
    $wp_admin_bar->remove_node( 'documentation' );  
    $wp_admin_bar->remove_node( 'support-forums' );  
    $wp_admin_bar->remove_node( 'feedback' );  

	$wp_admin_bar->add_node( array(
		'parent' => 'wp-logo',
		'id'     => 'ag-site',
		'title'  => 'Site',
		'href'   => esc_url( AG_SITE ),
		'meta'   => array("target"=>"_blank")
	)); 

	$wp_admin_bar->add_node( array(
		'parent' => 'wp-logo',
		'id'     => 'ag-email',
		'title'  => 'E-mail',
		'href'   => esc_url( "mailto:".AG_EMAIL ),
		'meta'   => array("target"=>"_blank")
	)); 

	$wp_admin_bar->add_node( array(
		'parent' => 'wp-logo',
		'id'     => 'ag-contato',
		'title'  => 'Contato',
		'href'   => esc_url( AG_CONTATO ),
		'meta'   => array("target"=>"_blank")
	)); 
	
}
add_action( 'admin_bar_menu', 'mvl_wp_admin_bar_menu', 999 );

// Adds support for editor color palette.
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Azul', 'mvl' ),
		'slug'  => 'azul-truckado',
		'color'	=> '#15427F',
	),
	array(
		'name'  => __( 'Laranja', 'mvl' ),
		'slug'  => 'laranja-truckado',
		'color' => '#E84F35',
	),
	array(
		'name'  => __( 'Dark', 'mvl' ),
		'slug'  => 'black-truckado',
		'color' => '#455465',
       ),
	array(
		'name'  => __( 'Vermelho', 'mvl' ),
		'slug'  => 'vermelho-truckado',
		'color' => '#ff0000',
       ),
) );

if( !is_admin() ) {
	add_filter( 'pre_get_posts', 'search_seminovos' );
	function search_seminovos( $query ) {
		if ( $query->is_search ) {
			$query->set( 'post_type', array( 'cpt-seminovos' ) );
		}
		return $query;
	}
}
//Format Price Function
function price($price=null){
    if($price!=null){
        $number =  preg_replace("/[^0-9]/", "", $price);
        $money_number = number_format($number,0,',','.');
        return $money_number;
    }
}

// Clientes Loadmore
function clientes_loadmore(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
    ?>

        <?php if( have_posts() ) : ?>
                <?php while( have_posts() ) : the_post(); ?>
				<div class="col-md-6">
					<?php get_template_part( 'template/spot','clientes' ); ?>
				</div>
                <?php endwhile ?>
        <?php endif; ?>

    <?php
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_clientes_loadmore', 'clientes_loadmore'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_clientes_loadmore', 'clientes_loadmore'); // wp_ajax_nopriv_{action}

function isMobile() {
	return preg_match("/\b(?:a(?:ndroid|vantgo)|b(?:lackberry|olt|o?ost)|cricket|docomo|hiptop|i(?:emobile|p[ao]d)|kitkat|m(?:ini|obi)|palm|(?:i|smart|windows )phone|symbian|up\.(?:browser|link)|tablet(?: browser| pc)|(?:hp-|rim |sony )tablet|w(?:ebos|indows ce|os))/i", $_SERVER["HTTP_USER_AGENT"]);
}
function formatCurrency(
    float|null $amount,
    string $currency = 'USD',
    string $locale = 'en_US'
): string {

    // Normaliza valor nulo ou inválido
    if ($amount === null || !is_numeric($amount)) {
        $amount = 0.0;
    }

    if (class_exists(NumberFormatter::class)) {
        try {
            $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
            $result = $formatter->formatCurrency((float) $amount, $currency);

            if ($result !== false) {
                return $result;
            }
        } catch (Throwable $e) {
            // fallback
        }
    }

    return sprintf(
        '%s %s',
        $currency,
        number_format((float) $amount, 2, '.', ',')
    );
}
