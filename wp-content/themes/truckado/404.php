<?php //wp_redirect( home_url(), 302 ) ?>
<?php get_header() ?>
<div class="container">
	<div class="row page-interna page-erro">
		
		<div class="text-center" style="width:100%">
                        <img src="<?php theImgAssets() ?>/truck-erro.png" alt="Oops!">
                        <p>
                            Nenhum seminovo encontrado para a sua busca! <br/>
                            <strong>Faça sua busca na barra de pesquisa acima ou acesse nossa <a href="<?php echo home_url()?>/seminovos">página de seminovos</a>.</strong>
                        </p>
                    </div>
		<!--
		<div class="text-center">
			<h2>ERRO 404</h2>
			<p>Faça sua busca abaixo.</p>
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'EU QUERO …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				<input type="submit" class="search-submit red-button" value="<?php echo esc_attr_x( 'BUSCAR', 'submit button' ) ?>" />
			</form>
		</div> -->
	</div>
</div>

<?php get_footer() ?>