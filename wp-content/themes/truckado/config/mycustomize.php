<?php
// Customizar o Footer do WordPress
function remove_footer_admin () {
    echo '<a href="'.AG_SITE.'">'.AG_NAME.'</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Customizar Widget do Dashboard
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', AG_NAME, 'custom_dashboard_help');
}
function custom_dashboard_help() {
echo '<p style="text-align:center"><img src="'.getConfigAssets().'/img/logo.png" alt="'.AG_NAME.'" style="max-width:85%;"/></p>';
echo '<p>Seja bem vindo ao painel de administração de seu site. Navegue pelo menu lateral para ter acesso às funcionalidades do site e se precisar, entre em contato com a gente.';

	if(defined('AG_EMAIL')) {
		echo "<a href='mailto:".AG_EMAIL."' target='_blank' style='display: block'>";
			echo AG_EMAIL;
		echo "</a>";
	}
	
	if(defined('AG_SITE')) {
		echo "<a href='".AG_SITE."' target='_blank' style='display: block'>";
			echo AG_SITE;
		echo "</a>";
	}
}

function my_login_logo() { ?> 
 <style type="text/css">
 #login h1 a,
 .login h1 a {
 	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/config/assets/img/logo.png);
 	width: 212px;
 	background-size: 212px;
 	height: 100px;
 }

 body.login{ /*background-color: #1e2847!important;*/}

 p#nav, p#backtoblog {
 	display:none;
 }

 .login form {
 	background:#fbfbfb !important;
 	padding:40px!important;
 }
</style> 
 <?php } add_action( 'login_enqueue_scripts', 'my_login_logo' );


function my_admin_style() { ?>
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon{
	width:60px!important;
	height:20px!important;
}
 #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before {
 	content:''!important;
 	width:60px;
 	height:20px;
 	display: block;
 	background-image: url('<?php echo getConfigAssets() ?>/img/icon-top.png');
 	}
 </style>
 <?php } add_action('admin_enqueue_scripts','my_admin_style');?>