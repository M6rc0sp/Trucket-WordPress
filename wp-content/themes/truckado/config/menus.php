<?php

function mvl_menu_general(){
	$page_title = 'Editar opções gerais do site';
	$menu_title = 'Opções Gerais';
	$capability = 'manage_options';
	$menu_slug = 'opcoes-gerais';
	$function = 'opcoes_gerais_page';
	$icon_url = 'dashicons-admin-site';
	$position = 3;

	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	function opcoes_gerais_page(){
	    get_template_part('config/menus/opcoes','gerais');
	}
}
add_action('admin_menu','mvl_menu_general');


function mvl_menu_general_redessociais() {
	$parent_slug = 'opcoes-gerais';
	$page_title = 'Redes Sociais';
	$menu_title = 'Redes Sociais';
	$capability = 'manage_options';
	$menu_slug = 'opcoes-gerais-redessociais';
	$function = 'opcoes_gerais_redessociais';
	add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

	function opcoes_gerais_redessociais(){
	    get_template_part('config/menus/opcoes','redessociais');
	}
}
add_action('admin_menu','mvl_menu_general_redessociais');

