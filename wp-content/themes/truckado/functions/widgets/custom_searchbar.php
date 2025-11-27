<div class="widget">
	<div>
		<h2>Pesquisar</h2>

		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		        <input type="search" class="search-field"
		            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
		            value="<?php echo get_search_query() ?>" name="s"
		            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		    <button type="submit" class="search-submit" >
		    	<img src="<?php theImgAssets() ?>/icon-search.png">
		    </button>
		</form>
	</div>
</div>