<?php
define('WP_USE_THEMES',true);
require_once('../../../../../../wp-load.php');
header('Content-Encoding: UTF-8');
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=newsletter.csv');
echo "\xEF\xBB\xBF"; ?>
e-mail,nome,empresa,telefone,local
<?php
$args = array('post_type'	=> 'cpt-newsletter'); $news = new WP_query($args);
if($news->have_posts()) : while($news->have_posts()) : $news->the_post();
echo get_post_meta( $post->ID , 'email' , true ).','.
get_post_meta( $post->ID , 'nome' , true ).','.
get_post_meta( $post->ID , 'empresa' , true ).','.
get_post_meta( $post->ID , 'telefone' , true ).','.
get_post_meta( $post->ID , 'local' , true ); 
echo "\n";
endwhile; endif;?>