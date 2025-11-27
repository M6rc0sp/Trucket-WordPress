<?php
/**
 * Adds a submenu page under a custom post type parent.
 */
add_action('admin_menu', 'setup_seminovos');
function setup_seminovos() {
    add_submenu_page(
        'edit.php?post_type=cpt-seminovos',
        __( 'Gerenciar Seminovos', 'mvl' ),
        __( 'Setup Seminovos', 'mvl' ),
        'manage_options',
        'setup-seminovos',
        'setup_seminovos_cb'
    );
}
 
/**
 * Display callback for the submenu page.
 */
function setup_seminovos_cb() { 

    if (!current_user_can('manage_options'))  {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    function register_option($option_name,$new_value) {
        if ( get_option( $option_name ) !== false
            && strlen(get_option( $option_name ))>1
            && strlen($new_value)>1 )
        {
            var_dump("Update!",get_option( $option_name ));
            update_option( $option_name, $new_value );
        }
        else
        {
            var_dump("Add!",get_option( $option_name ),strlen(get_option( $option_name )), strlen($new_value)>1 );
            add_option( $option_name, $new_value);
        }
    }

    $taxonomies = get_object_taxonomies( 'cpt-seminovos', 'objects' );
    ?>

    <?php if($_POST) : ?>
	    <div id="message" class="updated notice notice-success is-dismissible"><p>Configurações atualizadas. </p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dispensar este aviso.</span></button></div>
    <?php endif; ?>

    <div class="wrap">
        
        <h1><strong><?php _e( 'Gerenciar Seminovos', 'mvl' ); ?></strong></h1>
        <hr>
        <form  action="" method="post">
        <table>
            
            <tr>
                <th>Filtro</th>
                <th></th>
            </tr>

            <?php
            $input_name=array();
            $a=1;
            while ($a <= 10) : ?>
                <tr>
                    <td width="250px"><h4>Posição <?php echo $a ?></h4></td>
                    <td width="250px">
                        <div class="seminovos_filter__group seminovos_filter__group_<?php echo $a ?>">
                            <div class="form-group" style="margin-bottom:10px;">
                                <select name="seminovos_filter_<?php echo $a ?>" id="" style="width:100%;" value="<?php echo get_option('seminovos_filter_'.$a) ?>">
                                    <option value="0">Selecione</option>
                                    <option value="link" <?php echo ('link'==get_option('seminovos_filter_'.$a)) ? 'selected="selected"' :'' ;?>>+ Link</option>
                                    <?php foreach($taxonomies as $tax) : ?>
                                        <?php
                                        $input_name[$a]['filter']='seminovos_filter_'.$a;
                                        // add_option($input_name[$a]['filter'],'');
                                        // if(isset($_POST[$input_name[$a]['filter']])){ update_option($input_name[$a]['filter'],$_POST[$input_name[$a]['filter']]); }
                                        register_option($input_name[$a]['filter'],$_POST[ $input_name[$a]['filter'] ]);
                                        ?>
                                        <option value="<?php echo $tax->name; ?>" <?php echo ($tax->name==get_option($input_name[$a]['filter'])) ? 'selected="selected"' :'' ;?>><?php echo $tax->label; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group" data-show="link" style="margin-bottom:10px;display:none">
                                <label>
                                <?php
                                $input_name[$a]['link']='seminovos_filter__link_'.$a;
                                // add_option($input_name[$a]['link'],'');
                                // if(isset($_POST[$input_name[$a]['link']])){ update_option($input_name[$a]['link'],$_POST[$input_name[$a]['link']]); }
                                register_option($input_name[$a]['link'],$_POST[ $input_name[$a]['link'] ]);
                                 ?>
                                    Link<br/>
                                    <input type="text" name="seminovos_filter__link_<?php echo $a ?>" placeholder="Link" style="width:100%;" value="<?php echo get_option($input_name[$a]['link']); ?> ">
                                </label>
                            </div>
                            <div class="form-group" data-show="link" style="margin-bottom:10px;display:none">
                                <label>
                                <?php
                                $input_name[$a]['titulo']='seminovos_filter__titulo_'.$a;
                                // add_option($input_name[$a]['titulo'],'');
                                // if(isset($_POST[$input_name[$a]['titulo']])){ update_option($input_name[$a]['titulo'],$_POST[$input_name[$a]['titulo']]); }
                                register_option($input_name[$a]['titulo'],$_POST[ $input_name[$a]['titulo'] ]);
                                 ?>
                                <?php add_option('seminovos_filter__titulo_'.$a,''); ?>
                                    Título<br/>
                                    <input type="text" name="seminovos_filter__titulo_<?php echo $a ?>" placeholder="Título" style="width:100%;" value="<?php echo get_option($input_name[$a]['titulo']); ?> ">
                                </label>
                            </div>

                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            <?php
            $a++;
            endwhile; ?>

            <tr>
                <td><input type="submit" name="Submit" value="Salvar alterações" class="button button-primary" /></td>
            </tr>
        </table>
        </form>
    </div>

    

    <script>

        function reload_fields(__,val){
            if( val == 'link' ){
                __.find('[data-show="link"]').show('fast');
            } else {
                __.find('[data-show="link"]').hide('fast');
            }
            console.log(__,val);
        }
        jQuery('.seminovos_filter__group').each(function(){
            var __ = jQuery(this);
            var val = jQuery(this).find('select')[0].value;
            reload_fields(__,val);
        });

        jQuery('.seminovos_filter__group select').on('change',function(e){
            e.preventDefault();
            var __ = jQuery(this);
            var val = __[0].value;
            reload_fields(__.closest('.seminovos_filter__group'),val);
        });
    </script>
    <?php
}

