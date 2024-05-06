<?php
$enable_top_bar   = cs_get_option('enable_top_bar');
$theme_light_logo   = cs_get_option('theme_light_logo');
$papermag_social_opt   = cs_get_option('papermag_social_opt');
$enable_social_profile   = cs_get_option('enable_social_profile');
$enable_header_search   = cs_get_option('enable_header_search');
$enable_darkmode   = cs_get_option('enable_darkmode');
$ticket_link   = cs_get_option('ticket_link');
$network_link   = cs_get_option('network_link');
?>

<header class="header-area papermag-header-3">
    <?php if(true == $enable_top_bar):?>
    <div class="papermag-top-ba-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <ul class="ticket-box">
                        <?php if(isset($ticket_link)):?>
                        <li><a href="<?php echo esc_url($ticket_link['url']);?>"><i class="fal fa-ticket"></i> <?php echo esc_html($ticket_link['text']);?></a></li>
                        <?php endif;?>
                        <?php if(isset($ticket_link)):?>
                        <li><a href="<?php echo esc_url($network_link['url']);?>"><?php echo esc_html($network_link['text']);?></a></li>
                        <?php endif;?>
                    </ul>
                </div>
                <div class="col-lg-6 d-flex justify-content-end col-md-6 text-right">
                    <?php if(true == $enable_darkmode):?>
                    <div class="papermag-darkmode dark-button">
                        <span class="dark-mode"><?php esc_html_e( 'Dark', 'papermag' );?></span>
                        <span class="light-mode"><?php esc_html_e( 'Light', 'papermag' );?></span>
                    </div>  
                    <?php endif;?>
                    <?php if(true == $enable_social_profile):?>
                    <div class="header-social">
                        <?php foreach((array) $papermag_social_opt as $item):
                            if ( isset( $item['icon'] ) )
                                $icon = $item['icon'] ;
        
                            if ( isset( $item['link'] ) )
                                $link = $item['link'] ;    
                        ?>
                        <a href="<?php echo esc_url($link)?>"><i class="<?php echo esc_attr($icon);?>"></i></a>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>    
    <?php endif;?>
    <div class="header-main">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                    <div class="site-logo">
                        <?php papermag_logo()?>
                    </div>
                    <div class="papermag-dark-mode-logo">
                        <?php if(has_custom_logo() || !empty($theme_light_logo)){ ?>
                        
                        <?php if(!empty($theme_light_logo)):?>
                        <a class="papermag-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url($theme_light_logo['url']);?>" alt="<?php esc_attr_e( 'Main Logo', 'papermag' )?>"> 
                        </a>
                        <?php else:?>
                            <?php the_custom_logo();?>
                        <?php endif;?>
                        <?php }else{
                            printf('<h1 class="papermag-text-logo"><a href="%1$s">%2$s</a></h1>',esc_url(site_url('/')),esc_html(get_bloginfo('name')));
                        }?>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12">
                    <div class="primary-menu">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        ) );
                    ?>
                    </div>
                    <div id="papermag_mobile_menu"></div>
                </div>
                <div class="col-lg-3">
                    <div class="header-right header-right d-flex justify-content-end">
                        
                        <?php if(true == $enable_header_search):?>
                        <div class="papermag-search">
                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <button type="submit"><i class="fal fa-search"></i></button>
                            <input type="search" name="s" id="search" value="<?php the_search_query();?>" placeholder="<?php esc_html_e( 'Search keyword......', 'papermag' )?>" />
                        </form>
                        </div>  
                        <?php endif;?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>