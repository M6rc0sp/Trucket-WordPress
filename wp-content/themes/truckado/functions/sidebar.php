<?php
// SIDEBAR
// register_sidebar( array(
//     'id'          => 'sidebar-blog',
//     'name'        => __( 'Barra Lateral do Blog', 'mvl' ),
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
// 	'after_widget'  => '</div>',
// 	'before_title'  => '<h2 class="widgettitle">',
// 	'after_title'   => '</h2>'

// ) );

//WIDGET DASHBOARD

register_sidebar( array(
    'id'          => 'footer-1',
    'name'        => __( 'Rodapé 1', 'mvl' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'

) );

register_sidebar( array(
    'id'          => 'footer-2',
    'name'        => __( 'Rodapé 2', 'mvl' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'

) );

register_sidebar( array(
    'id'          => 'footer-3',
    'name'        => __( 'Rodapé 3', 'mvl' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'

) );

register_sidebar( array(
    'id'          => 'footer-4',
    'name'        => __( 'Rodapé 4', 'mvl' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'

) );

register_sidebar( array(
    'id'          => 'sidebar-single-seminovos',
    'name'        => __( 'Lateral Seminovos (interna)', 'mvl' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title d-none">',
	'after_title'   => '</h2>'

) );