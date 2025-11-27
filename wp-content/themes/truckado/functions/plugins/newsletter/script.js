$(document).ready(function(){

	(function ( $ ) {
 
	    $.fn.newsletter = function( options ) {

	    	this.append('<br style="clear:both"><div class="response"></div></div>');
	 
	        // This is the easiest way to have default options.
	        var settings = $.extend({
	            // These are the defaults.
	            nome: '',
				email: '',
				empresa: '',
				telefone: '',
				local: '',
				themeUrl: ''
	        }, options );
	 	
	 		// Salva os itens
	       return this.submit(function(data){
				data.preventDefault();

				$.ajax({
				  method: "POST",
				  url: settings.themeUrl+'/functions/plugins/newsletter/ajax.php',
				  data: $(this).serialize()
				})
				  .done(function( msg ) {
				   $('#'+data.originalEvent.target.id).find('.response').addClass('show');
				   
				   $('#'+data.originalEvent.target.id).find('.response').html(msg);
				   
				   $('#'+data.originalEvent.target.id).find('input[type="text"]').val('');
				   $('#'+data.originalEvent.target.id).find('input[type="email"]').val('');
				   $('#'+data.originalEvent.target.id).find('input[type="number"]').val('');
				   $('#'+data.originalEvent.target.id).find('input[type="textarea"]').val('');

				  });
			});
	    };
	}( jQuery ));
});