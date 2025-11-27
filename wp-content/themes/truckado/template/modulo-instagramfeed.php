<?php if( get_option('mvl_instagram') ) : $instagram = get_option('mvl_instagram');?>
    <div id="instagram-feed">
        <div class="container">
            <div class="instagram-feed-header">
                <h2><a href="//instagram.com/<?php echo $instagram ?>" target="_blank" title="Siga @<?php echo $instagram ?> no Instagram!">@<?php echo $instagram ?></a></h2>
                
            </div>
            <div id="instagram-feed-area" class="__instagram-feed-wrap">
                <?php //echo do_shortcode('[instagram-feed]'); ?>
            </div>
            <br style="clear:both;">
        </div>
    </div>
<?php endif; ?>