<?php

function sc_modulo( $atts ) {
	ob_start();

	if(isset($atts['filtro'])) {
		get_template_part('template/modulo', $atts['filtro']);
	}
	
	return ob_get_clean(); }
add_shortcode( 'modulo', 'sc_modulo' );

function sc_slider( $atts ) {
	ob_start();

	get_template_part('template/modulo', 'slider',$atts['filtro']);
	
	return ob_get_clean(); }
add_shortcode( 'slider', 'sc_slider' );

function sc_newsletter( $atts ) {
	ob_start();
	?>
	<div class="snippet-newsletter">
		<div class="snippet-newsletter-texto">
			<?php echo $atts['texto'] ?>
		</div>
		<form action="">
			<input type="text" name="your-name" placeholder="Nome">
			<input type="email" name="your-email" placeholder="E-mail">
			<button action="submit">
				Receber
			</button>
		</form>
	</div>
	<?php
	return ob_get_clean(); }
add_shortcode( 'newsletter', 'sc_newsletter' );

