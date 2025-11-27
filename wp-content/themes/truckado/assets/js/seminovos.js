function loadmore_seminovos(){
	jQuery(window).scroll(function(){
		var btn = jQuery('.seminovos_loadmore:not(.loading)');
		if(btn.length != 0){
			var btn_top = btn.offset().top;
			var window_h = jQuery(window).height();

			var offset = jQuery(window).scrollTop() + jQuery(window).height() - 20;
			if( offset >= btn_top) {
				console.log('Carregando...');
				btn.click();
				btn.attr('disabled','disabled');
				jQuery('.seminovos_loadmore').addClass('loading');
				
			}
		}
	});
}
loadmore_seminovos();

jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error


	$('.seminovos_loadmore').click(function(e){
        e.preventDefault();
		var button = $(this),
		    data = {
			'action': 'seminovos_loadmore',
			'query': params.posts, // that's how we get params from wp_localize_script() function
			'page' : params.current_page
        };
        
		console.log(data);

        button_text = button.html();
 
		$.ajax({ // you can also use $.post here
			url : params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Carregando...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( button_text ).before(data); // insert new posts
                    params.current_page++;
                    
                    $('.spot-seminovos .seminovos-title').matchHeight();
                    $('.spot-seminovos .seminovos-price-container').matchHeight();
					$('.spot-seminovos .icones-destaque').matchHeight();
					
					jQuery('.seminovos_loadmore').removeClass('loading');
 
					if ( params.current_page == params.max_page ) 
						button.remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});