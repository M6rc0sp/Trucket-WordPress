<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-5">
                <div class="main-header-left ">
                    <a href="<?php echo home_url(); ?>">
                    <?php
                    if ( has_custom_logo() ) {
                        echo '<span class="site-brand">';
                            the_custom_logo();
                        echo '</span>';
                    } else {
                        echo '<span class="site-brand">';
                            include(get_stylesheet_directory().'/assets/img/trucket-logo.svg');
                        echo '</span>';
                    }
                    ?>

                    </a>
                    <nav class="navbar d-none d-md-inline-block">
                        <div class="">
                            <nav class="navbar">
                                <?php wp_nav_menu( array( 'theme_location' => 'principal' ) ) ?>
                            </nav>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-md-4 col-7">
                <div class="main-header-right">
                    <div class="__d-none __d-md-block d-inline-block">
                        <nav class="navbar">
                            <?php wp_nav_menu( array( 'theme_location' => 'secundario' ) ) ?>
                        </nav>
                    </div>
                    <div class="menu-toggle d-inline-block d-sm-none">
                        <i class="icon-ico-menu-right"></i>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-search">
                    <form action="<?php echo home_url() ?>/seminovos">
                        <input type="text" name="term" placeholder="Busque seminovos" value="<?php if( isset($_GET['term']) ) { echo $_GET['term']; }; ?>" >
                        <button class="form-search-submit">
                            <i class="icon-ico-search"></i>
                        </button>
                    </form>
                </div>
                <div class="form-filter">
                    <button class="form-filter-submit">
                        <i class="icon-ico-filter"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-filter-seminovos">
        <div class="container">
            <?php get_template_part('template/seminovos','filter');?>
        </div>
    </div>
</header>
