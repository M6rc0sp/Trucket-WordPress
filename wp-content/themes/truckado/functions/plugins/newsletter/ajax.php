<?php
define('WP_USE_THEMES',TRUE);
require_once('../../../../../../wp-load.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$telefone = $_POST['telefone'];
$local = $_POST['local'];

$i=1;
$args = array('post_type' => 'cpt-newsletter','posts_per_page' => -1);
$news = new wp_query($args);
if($news->have_posts()){ while($news->have_posts()){$news->the_post();
if(get_post_meta( get_the_id() , 'email' , true ) == $email){
        $i=0;
}}}

if($email != null AND $i==1) {

    wp_insert_post( array(

        'post_title'   => $email,
        'post_status'  => 'publish',
        'post_type'  => 'cpt-newsletter',
        'meta_input'   => array(
            'nome' => $nome,
            'email' => $email,
            'empresa' => $empresa,
            'Telefone' => $telefone,
            'local' => $local,
        ),
    ),  $wp_error = false );

    $to = get_option('mvl_email_newsletter');
    $subject = 'Novo Cadastro de Newsletter';
    $body = '<h1>Newsletter</h1><h3>Novo cadastro</h3><h4>'.$email.'</h4>';
    $headers = array('Content-Type: text/html; charset=UTF-8');
     
    wp_mail( $to, $subject, $body, $headers );

    echo "E-mail <strong>{$email}</strong> cadastrado com sucesso!";
} else {
    echo "O e-mail <strong>{$email}</strong> já está cadastrado!";
}

?>

