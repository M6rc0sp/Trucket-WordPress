jQuery(document).ready(function(){
    (function ( $ ) {
        
        $.fn.smartWhatsapp = function( options ) {
            // Dafault
            var settings = $.extend({
                whatsapp: false,
                headerText: "Preencha as informações abaixo e fale conosco pelo WhatsApp.",
                submitText: "Iniciar chat agora!",
                timer: false,
                avatarUrl: false,
                fields: {
                    insertName: true,
                    insertEmail: true,
                    insertPhone: true,
                    insertMsg: true,
                    options: {
                        title: "Selecione uma opção:",
                        fields: []
                    }
                }
            }, options );
            // console.log(settings);

            const _ = this;
            
            // Verifica Número
            if( !settings.whatsapp ) {
                console.warn("# SMARTWHATSAPP: Nenhum número de Whatsapp foi inserido!");
                return false;
            }

            // Insere HTML
            this.append(`
                <div class="smartwhatsapp-icon">
                    <svg class="" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" viewBox="300 -476.1 1792 1792"><path d="M1413 497.9c8.7 0 41.2 14.7 97.5 44s86.2 47 89.5 53c1.3 3.3 2 8.3 2 15 0 22-5.7 47.3-17 76-10.7 26-34.3 47.8-71 65.5s-70.7 26.5-102 26.5c-38 0-101.3-20.7-190-62-65.3-30-122-69.3-170-118s-97.3-110.3-148-185c-48-71.3-71.7-136-71-194v-8c2-60.7 26.7-113.3 74-158 16-14.7 33.3-22 52-22 4 0 10 .5 18 1.5s14.3 1.5 19 1.5c12.7 0 21.5 2.2 26.5 6.5s10.2 13.5 15.5 27.5c5.3 13.3 16.3 42.7 33 88s25 70.3 25 75c0 14-11.5 33.2-34.5 57.5s-34.5 39.8-34.5 46.5c0 4.7 1.7 9.7 5 15 22.7 48.7 56.7 94.3 102 137 37.3 35.3 87.7 69 151 101a44 44 0 0 0 22 7c10 0 28-16.2 54-48.5s43.3-48.5 52-48.5zm-203 530c84.7 0 165.8-16.7 243.5-50s144.5-78 200.5-134 100.7-122.8 134-200.5 50-158.8 50-243.5-16.7-165.8-50-243.5-78-144.5-134-200.5-122.8-100.7-200.5-134-158.8-50-243.5-50-165.8 16.7-243.5 50-144.5 78-200.5 134S665.3 78.7 632 156.4s-50 158.8-50 243.5a611 611 0 0 0 120 368l-79 233 242-77a615 615 0 0 0 345 104zm0-1382c102 0 199.5 20 292.5 60s173.2 93.7 240.5 161 121 147.5 161 240.5 60 190.5 60 292.5-20 199.5-60 292.5-93.7 173.2-161 240.5-147.5 121-240.5 161-190.5 60-292.5 60a742 742 0 0 1-365-94l-417 134 136-405a736 736 0 0 1-108-389c0-102 20-199.5 60-292.5s93.7-173.2 161-240.5 147.5-121 240.5-161 190.5-60 292.5-60z"></path></svg>
                    
                    <span class="smartwhatsapp-close">&times;</span>
                </div>
            `);

            if( settings.fields ) {
                this.append(`<div class="smartwhatsapp-dialog"></div>`);
                

                if( settings.headerText ) {
                    this.find('.smartwhatsapp-dialog').append(`<div class=\"dialog-chat dialog-chat-header\"> ${settings.headerText} </div>`);
                }

                this.find('.smartwhatsapp-dialog').append(`<form id="smartwhatsapp-dialog-form" action="/" method="post"></form>`);

                if( settings.fields.insertName ) {
                    this.find('#smartwhatsapp-dialog-form').append(`
                        <div class="dialog-chat dialog-chat-insertname">
                            <label>Seu Nome*
                                <input type="text" id="smartwhatsapp-dialog-form-name" name="name" placeholder="Seu nome" required>
                            </label>
                        </div>
                    `);
                    // console.log(this.find('#smartwhatsapp-dialog-form'));
                }

                if( settings.fields.insertEmail ) {
                    this.find('#smartwhatsapp-dialog-form').append(`
                        <div class="dialog-chat dialog-chat-insertemail">
                            <label>Seu E-mail*
                                <input type="email" id="smartwhatsapp-dialog-form-email" name="email" placeholder="Seu e-mail" required>
                            </label>
                        </div>
                    `);
                }

                if( settings.fields.insertPhone ) {
                    this.find('#smartwhatsapp-dialog-form').append(`
                        <div class="dialog-chat dialog-chat-insertphone">
                            <label>Telefone*
                                <input type="tel" id="smartwhatsapp-dialog-form-phone" name="phone" placeholder="(xx) xxxx xxxx" required>
                            </label>
                        </div>
                    `);
                }

                if( settings.fields.options ) {
                    this.find('#smartwhatsapp-dialog-form').append(`
                        <div class="dialog-chat dialog-chat-options">
                            <label> ${settings.fields.options.title}</label>
                            <ul></ul>
                        </div>
                    `);

                    var chooseOptions = settings.fields.options.fields;
                    chooseOptions.map(function(value, key){
                        $('#smartwhatsapp-dialog-form .dialog-chat.dialog-chat-options ul').append(`
                            <li><label><input type="radio" name="options" value="${value.value}"/><span class="input-button">${value.label}</span></label></li>
                        `);
                        // console.log( $('#smartwhatsapp-dialog-form .dialog-chat.dialog-chat-options') );
                    });
                }

                if( settings.fields.insertMsg ) {
                    this.find('#smartwhatsapp-dialog-form').append(`
                        <div class="dialog-chat dialog-chat-insertmsg">
                            <label>Mensagem*
                                <input type="text" id="smartwhatsapp-dialog-form-msg" name="message" placeholder="" required>
                            </label>
                        </div>
                    `);
                }

                this.find('#smartwhatsapp-dialog-form').append(`<input type="submit" value="${settings.submitText}">`);

                // Verifica Timer
                if( settings.timer ){
                    jQuery(window).load(function(){
                        // console.log( !_.hasClass('smartwhatsapp-open-dialog' ) );
                        if( !_.hasClass('smartwhatsapp-open-dialog') ){
                            setTimeout(function(){
                                _.addClass('smartwhatsapp-open-dialog');
                            },settings.timer);
                        }
                        
                    });
            
                }

                const elIcon = _.find('.smartwhatsapp-icon');
                elIcon.on('click',function(e){
                    e.preventDefault();
                    jQuery(this).parent().toggleClass('smartwhatsapp-open-dialog');
                }); 

                function hasInput(input){
                    if( _.find(input).length!=0 ) {
                        return true;
                    } else {
                        return false;
                    }
                }
    
                // Envio do form
                _.find('#smartwhatsapp-dialog-form').on('submit',function(e){
                    e.preventDefault();
    
                    var message = "";
                    var formData = [];
    
                    if( hasInput('input[name="name"]') ) {
                        message += "Nome: *"+jQuery('input[name="name"]').val()+"*\n";
                        formData.name = jQuery('input[name="name"]').val();
                    }
    
                    if( hasInput('input[name="email"]') ) {
                        message += "E-mail: "+jQuery('input[name="email"]').val()+"\n";
                        formData.email = jQuery('input[name="email"]').val();
                    }
    
                    if( hasInput('input[name="phone"]') ) {
                        message += "Telefone: "+jQuery('input[name="phone"]').val()+"\n";
                        formData.phone = jQuery('input[name="phone"]').val();
                    }
    
                    if( hasInput('input[name="options"]') ) {
                        message += "Opção: *"+jQuery('input[name="options"]').val()+"*\n";
                        formData.options = jQuery('input[name="options"]').val();
                    }
    
                    if( hasInput('input[name="message"]') ) {
                        message += "Mensagem: "+jQuery('input[name="message"]').val()+"\n";
                        formData.message = jQuery('input[name="message"]').val();
                    }
    
                    var currentUrl = window.location.href;
                    var formMessage = encodeURI(`${currentUrl}\n------\n${message}`);
    
                    var parseFormData = {
                        data: formData
                    }
          
                    jQuery( "#smartwhatsapp-dialog-form").trigger( "smartwhatsapp-ok", parseFormData );
            
                    if (jQuery(window).width() < 600) {
                        window.open('https://api.whatsapp.com/send?phone='+settings.whatsapp+'&text='+formMessage);
                     }
                     else {
                        window.open('https://web.whatsapp.com/send?phone='+settings.whatsapp+'&text='+formMessage);
                     }
            
                });
            
                jQuery( "#smartwhatsapp-dialog-form" ).on( "smartwhatsapp-ok", function( event, params ) {
                    // Evento do SmartWhatsapp
                    // Utilize o objeto 'params' para pegar os dados
                    console.log( params );
                });

            } else {

                const elIcon = _.find('.smartwhatsapp-icon');
                elIcon.on('click',function(e){
                    e.preventDefault();
                    if (jQuery(window).width() < 600) {
                        window.open('https://api.whatsapp.com/send?phone='+settings.whatsapp);
                    }
                    else {
                        window.open('https://web.whatsapp.com/send?phone='+settings.whatsapp);
                    }
                }); 


            }

             

            _.before(`<style>
                #smartwhatsapp {font-family:sans-serif;z-index:9999;position:relative;}
                #smartwhatsapp .dialog-chat-header{color:#666;margin-bottom:15px;line-height: 22px;}
                #smartwhatsapp *{box-sizing: border-box;transition:.6s}
                #smartwhatsapp .smartwhatsapp-icon {position:fixed;box-shadow:2px 2px 4px rgba(0,150,137,0.1);bottom:10px;right:10px;cursor:pointer;background-color:#009688;border-radius:100%;width:50px;height:50px;display: flex;justify-content: center;align-items: center;z-index:999;}
                #smartwhatsapp .smartwhatsapp-icon:hover {opacity:.8}
                #smartwhatsapp .smartwhatsapp-icon svg{fill:#fff;width:30px;height:30px;}
                #smartwhatsapp .smartwhatsapp-dialog{background-color:#fff;position: fixed;border-radius:6px;box-shadow:1px 1px 3px 2px rgba(66, 66, 66, 0.1);padding:25px;bottom: 45px;right: 45px;visibility: hidden;opacity:0;transform:translateX(100%);max-width:280px;}
                #smartwhatsapp .smartwhatsapp-dialog p{color:#828282;margin-top:0;line-height: 22px; color: #009688;}
                #smartwhatsapp .smartwhatsapp-dialog label{display: block; margin-bottom: 15px; font-size: 12px; font-weight: 600; color: #868686;}
                #smartwhatsapp .smartwhatsapp-dialog label input{display: block;padding: 9px; border-radius: 6px; border: 1px solid #eee; margin-top: 4px;width:100%;}
                #smartwhatsapp .smartwhatsapp-dialog input[type="submit"]{background-color:#009688;border:0;color:#fff;padding: 9px; border-radius: 6px;cursor:pointer;margin-left: auto;display: table;}
                #smartwhatsapp .smartwhatsapp-dialog input[type="submit"]:hover{opacity:.8}
                #smartwhatsapp .smartwhatsapp-close{color:#fff;font-size:28px;}
                #smartwhatsapp.smartwhatsapp-open-dialog .smartwhatsapp-close{display: block;    padding-top: 3px;}
                #smartwhatsapp.smartwhatsapp-open-dialog svg{display: none;}
                #smartwhatsapp:not(.smartwhatsapp-open-dialog) .smartwhatsapp-close{display: none;}
                #smartwhatsapp:not(.smartwhatsapp-open-dialog) svg{display: block;}
                #smartwhatsapp.smartwhatsapp-open-dialog .smartwhatsapp-dialog{display:block;visibility: visible;opacity:1;transform:translateX(0);}
                #smartwhatsapp:not(.smartwhatsapp-open-dialog) .smartwhatsapp-icon {animation: buttonAlert 4s infinite;}
                #smartwhatsapp.smartwhatsapp-open-dialog .smartwhatsapp-dialog input[type="submit"] {animation: buttonAlert 4s infinite;}
                #smartwhatsapp ul{list-style:none;padding-left:0;display: table;}
                #smartwhatsapp ul li{position:relative;display:inline-block}
                #smartwhatsapp ul li label{margin:auto 5px 5px auto!important;text-transform:inherit!important}
                #smartwhatsapp ul li span{display:block;cursor:pointer;background: rgba(0,0,0,.03); padding: 11px; border-radius: 6px;transition:.2s;font-weight: 300;}
                #smartwhatsapp ul li span:hover{box-shadow: 0px 0px 0px 1px rgb(0, 150, 136); background-color: #e0f7f5; color: #009688;}
                #smartwhatsapp ul li input{display:none!important}
                #smartwhatsapp ul li input:checked + span{background: rgb(0, 150, 136);color:#fff}
                @keyframes buttonAlert { 0% { box-shadow: 0px 0px 0px 0px rgba(0, 150, 136, 0.4); } 40% { box-shadow: 0px 0px 0px 15px rgba(0, 150, 136, 0); } 100% { box-shadow: 0px 0px 0px 15px rgba(0, 150, 136, 0); } }
            </style>`);
     
        };     
    }( jQuery ));

});