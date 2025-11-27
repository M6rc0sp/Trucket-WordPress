<?php
if (!current_user_can('manage_options'))  {
	wp_die( __('You do not have sufficient permissions to access this page.') );
}
?>

<style type="text/css">
.half{width:50%;float:left;}
.wrap{zoom:1;overflow:auto;}
.text-right {text-align: right;display: block;}
.header_infos {padding:15px 45px 15px 0;}
.header_infos img {max-width:200px;margin-bottom:;}
.header_infos a {display: inline-block;}
</style>

<div class="mvl_options_general">

	<div class="wrap header_infos">
		<div class="half">
			<h1>Opções Gerais</h1>

			<p>Seja bem vindo a página de atualizações das Opções Gerais de seu website.<br/>
			Se precisar de suporte, entre em contato conosco.
			<br/>
			<?php if(defined('AG_EMAIL')) : ?>
				<a href="mailto:<?php echo AG_EMAIL ?>" target="_blank" style="display: block">
					<?php echo AG_EMAIL ?>
				</a>
			<?php endif ?>
			<?php if(defined('AG_SITE')) : ?>
				<a href="<?php echo AG_SITE ?>" target="_blank" style="display: block">
					<?php echo AG_SITE ?>
				</a>
			<?php endif ?>

			</p>
		</div>
		<div class="half text-right">
			<a href="<?php echo AG_SITE ?>" target="_blank">
				<img src="<?php theConfigAssets()?>/img/logo.png" alt="<?php echo AG_NAME ?>" />
			</a>
		</div>
	</div>

	<?php if($_POST) : ?>
	<div id="message" class="updated notice notice-success is-dismissible"><p>Configurações atualizadas. </p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dispensar este aviso.</span></button></div>
	<?php endif; ?>

	<table class="form-table">
		<hr>
		<form action="" method="post">

			<!-- REDES SOCIAIS -->

			<td colspan="2"><h2>Redes Sociais</h2></td>

			<?php create_form_field(array(
				'type' => 'text',
				'name' => 'Facebook',
				'id'	=> 'mvl_facebook',
				'slug'	=> 'facebook',
				'placeholder'	=> 'Url do Facebook'
				))?>

			<?php create_form_field(array(
				'type' => 'text',
				'name' => 'Instagram @',
				'id'	=> 'mvl_instagram',
				'slug'	=> 'instagram',
				'placeholder'	=> '@ do Instagram'
				))?>

			<?php create_form_field(array(
				'type' => 'text',
				'name' => 'Youtube',
				'id'	=> 'mvl_youtube',
				'slug'	=> 'youtube',
				'placeholder'	=> 'Url do Youtube'
				))?>

			<?php create_form_field(array(
				'type' => 'text',
				'name' => 'Twitter',
				'id'	=> 'mvl_twitter',
				'slug'	=> 'twitter',
				'placeholder'	=> 'Url do Twitter'
				))?>


			<?php create_form_field(array(
				'type' => 'text',
				'name' => 'LinkedIn',
				'id'	=> 'mvl_linkedin',
				'slug'	=> 'linkedin',
				'placeholder'	=> 'Url do Linkedin'
				))?>


			<!-- SALVAR TUDO -->

			<tr>
				<th><input type="submit" name="Submit" value="Salvar alterações" class="button button-primary" /></th>
			</tr>

		</form>
	</table>


</div>