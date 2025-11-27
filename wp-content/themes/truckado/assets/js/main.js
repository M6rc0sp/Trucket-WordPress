var $=jQuery;

$(document).ready(function(){



    $(window).load(function(){

        $('div#loading').animate({

            opacity:0

        },1000,function(){

            $('body').removeClass('loading');

        });

    });



    setScrolledClass();



    function setScrolledClass(){

        function setScrolledClassFn(){

          var offset = 180;

          var topHeight = $(window).scrollTop();

  

          if(topHeight > offset) {

            $('body').addClass('show-header-fixed');

          }else{

            $('body').removeClass('show-header-fixed');

          }

        }

        setScrolledClassFn();

        $(window).on('scroll', function(){

          setScrolledClassFn();

        });

      }



    $('div#main-menu-responsive .close-menu-responsive').on('click',function(e){

        e.preventDefault();

        $('body').removeClass('show-menu-responsive');

    });

    $('.menu-toggle').on('click',function(e){

        e.preventDefault();

        $('body').addClass('show-menu-responsive');

        window.scroll({

            top: 0,

        });

    });

    $('.main-header .btn-whatsapp> a').on('click',function(e){

        e.preventDefault();

    });





    $('.slick-slider').slick({

        dots: true,

        infinite: false,

        speed: 300,

        adaptiveHeight: true,

        centerPadding: '60px',

    });



    $('.seminovo-thumbnail-slick').slick({

        dots: true,

        infinite: false,

        speed: 300,

        adaptiveHeight: true,

    });



    $('.cliente-thumbnail-slick').slick({

        dots: true,

        infinite: false,

        speed: 300,

        adaptiveHeight: true,

    });



    $('.seminovos-lista-slick:not(.disable-caroussel)').slick({

        dots: true,

        infinite: false,

        speed: 300,

        slidesToShow: 4,

        slidesToScroll: 4,

        responsive: [

            {

            breakpoint: 1024,

            settings: {

                slidesToShow: 3,

                slidesToScroll: 3,

                infinite: true,

                dots: true

            }

            },

            {

            breakpoint: 600,

            settings: {

                slidesToShow: 2,

                slidesToScroll: 2

            }

            },

            {

            breakpoint: 480,

            settings: {

                slidesToShow: 1,

                slidesToScroll: 1

            }

            }

        ]

    });

    $('.marcas-lista ul').slick({

        dots: true,

        infinite: false,

        speed: 300,

        slidesToShow: 6,

        slidesToScroll: 6,

        responsive: [

            {

            breakpoint: 1024,

            settings: {

                slidesToShow: 3,

                slidesToScroll: 3,

                infinite: true,

                dots: true

            }

            },

            {

            breakpoint: 600,

            settings: {

                slidesToShow: 2,

                slidesToScroll: 2

            }

            },

            {

            breakpoint: 480,

            settings: {

                slidesToShow: 1,

                slidesToScroll: 1

            }

            }

        ]

    });



    if($('#instagram-feed').length > 0){

        function setInstagram(){            

//             $.instagramFeed({

//                 'username': 'trucketcaminhoes',

//                 'container': ".instagram-feed-wrap",

//                 'display_profile': false,

//                 'display_biography': false,

//                 'display_gallery': true,

//                 'styling': true,

//                 'items': 6,

//                 'items_per_row': 6,

//                 'margin': .5

//             });

        }

        setInstagram();

    }



    // Post content collapsed

    var seminovo_collapsed = $('.post-content-collapsed');

    if( seminovo_collapsed.length!=0 && seminovo_collapsed.height()>400 ){

        var h = seminovo_collapsed.height();

        seminovo_collapsed.css({

            height:"400px"

        });



        if( $('.btn-post-content-collapsed').length == 0 ) {

            seminovo_collapsed.after('<a href="#" class="btn btn-outline-secondary btn-post-content-collapsed">Descrição completa</a>');



            $('.btn-post-content-collapsed').on('click',function(e){

                e.preventDefault();



                seminovo_collapsed.animate({

                    height:h

                },600,function(){

                    $('.btn-post-content-collapsed').slideToggle('fast');

                });

            });

        }

    }



    //Filtro

    $('.widget-filter.widget-filter-collap .widget-filter-title').on('click',function(e){

        e.preventDefault();

        $(this).closest('.widget-filter').toggleClass('widget-close');

    });



    $('.spot-seminovos .seminovos-title').matchHeight();

    $('.spot-seminovos .seminovos-price-container').matchHeight();

    $('.spot-seminovos .icones-destaque').matchHeight();



    $('.form-filter-submit').on('click',function(e) {

        e.preventDefault();

        $('body').toggleClass('show-modal-filter-seminovos');

        $('#modal-filter-seminovos').slideToggle();

    });



    //Redirect Whatsapp Form

    document.addEventListener( 'wpcf7submit', function( event ) {

        console.log(event);

        console.log(event.path[1].className);

        if( event.path[1].className ==="modulo-whatsapp") {

            var name = event.detail.inputs[0].value;

            var phone = event.detail.inputs[1].value;

            var redirect = 'https://wa.me/5541999068201?text=*Quero receber novidades via Whatsapp da Truckado*%0ANome: '+name+'%0AWhatsapp: '+phone;

            window.open(redirect,"_blank");

        }

        // location = 'http://example.com/';

    }, false );

    

    // Spot Simule Financiamento

    if( window.location.search==='?financiamento' ) {

        if( $('h2#financiamento').length!=0 ) {

            var box = $('h2#financiamento').closest('form');

            box.addClass('box-alert');



            box.on('click',function(){

                box.removeClass('box-alert');

            });



            window.scroll({

                top: box.offset().top - 80,

                behavior: 'smooth'

              });

        }

    }



    //Ajax load clientes



    function loadmore_seminovos(){

        jQuery(window).scroll(function(){

            var btn = jQuery('.clientes_loadmore:not(.loading)');

            if(btn.length != 0){

                var btn_top = btn.offset().top;

                var window_h = jQuery(window).height();

    

                var offset = jQuery(window).scrollTop() + jQuery(window).height() - 20;

                if( offset >= btn_top) {

                    console.log('Carregando...');

                    btn.click();

                    btn.attr('disabled','disabled');

                    jQuery('.clientes_loadmore').addClass('loading');

                    

                }

            }

        });

    }

    loadmore_seminovos();



    $('.clientes_loadmore').click(function(e){



        var btnText = $(this).html();

        e.preventDefault();

        var button = $(this),

            data = {

          'action': 'clientes_loadmore',

          'query': JSON.stringify(posts_clientes), // that's how we get params from wp_localize_script() function

          'page' : current_clientes

        };

     

        $.ajax({ // you can also use $.post here

          url : params.ajaxurl, // AJAX handler

          data : data,

          type : 'POST',

          beforeSend : function ( xhr ) {

            button.text('Carregando...'); // change the button text, you can also add a preloader image

          },

          success : function( data ){

            if( data ) { 

              button.text( btnText ).before(data); // insert new posts

              current_clientes++;

              jQuery('.clientes_loadmore').removeClass('loading');

              if ( current_clientes == max_clientes ) 

                button.remove(); // if last page, remove the button

            } else {

              button.remove(); // if no data, remove the button as well

            }

          }

        });

      });

    if( $('._insert_input_url').length>0 ){
		$('._insert_input_url').val(window.location.href)
	}
	
	$('.venobox').venobox();
});

