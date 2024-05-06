<?php
$enable_top_bar   = cs_get_option('enable_top_bar');
$theme_light_logo   = cs_get_option('theme_light_logo');
$papermag_social_opt   = cs_get_option('papermag_social_opt');
$enable_social_profile   = cs_get_option('enable_social_profile');
$enable_header_search   = cs_get_option('enable_header_search');
$enable_darkmode   = cs_get_option('enable_darkmode');
$choose_date_style   = cs_get_option('choose_date_style');
$head_top_mail   = cs_get_option('head_top_mail');
$mailText   = cs_get_option('mailText');
$search_text   = cs_get_option('search_text');
$potcast_text   = cs_get_option('potcast_text');
$potcast_url   = cs_get_option('potcast_url');
$video_text   = cs_get_option('video_text');
$video_url   = cs_get_option('video_url');
?>

<header class="header-area papermag-header-2">
    <div class="papermag-head-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4">
                    <div class="header-two-top-left">

                        <?php if('date' == $choose_date_style):?>
                        <span class="date"><?php echo date(get_option('date_format')); ?></span>

                        <?php elseif('date_time' == $choose_date_style):?>
                        <span class="date"><?php echo get_the_time( 'd M y - D g:i:a' ) ?></span>

                        <?php else:?>
                            <span class="date"><?php the_time() ?></span>
                        <?php endif;?>

                        <span class="location">New York</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 text-center">
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
                <div class="col-lg-3 col-md-4 text-right d-flex align-items-center justify-content-end">
                    <div class="mailus">
                        <a href="mailto:<?php echo esc_attr($head_top_mail)?>">
                            <i class="fal fa-envelope"></i> 
                            <span><?php echo esc_html($mailText);?></span>
                        </a>
                    </div>
                    <?php if(true == $enable_darkmode):?>
                        <div class="papermag-darkmode dark-button">
                            <span class="dark-mode"><?php esc_html_e( 'Dark', 'papermag' );?></span>
                            <span class="light-mode"><?php esc_html_e( 'Light', 'papermag' );?></span>
                        </div>   
                     <?php endif;?>
                </div>
            </div>
        </div>
    </div>    
    <div class="header-main-two">
        <div class="container">
            <div class="row align-items-center justify-content-between">            
                <div class="col-lg-8">
                    <div class="primary-menu">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                            ) );
                        ?>
                    </div>
                    <div id="papermag_mobile_menu"></div>
                </div>
                <div class="col-lg-4">
                    <div class="header-right header-right d-flex justify-content-end">
                        
                        <?php if(true == $enable_header_search):?>
                        <div class="papermag-search-two">
                            <i class="fal fa-search"></i>
                            <?php if($search_text):?>
                            <span><?php echo esc_html($search_text);?></span>
                            <?php endif;?>
                        </div>  
                        <?php endif;?> 
                        <div class="papermag-brodacust-item">

                            <?php if($potcast_text):?>
                            <a href="<?php echo esc_url($potcast_url);?>">
                                <i class="fal fa-radio"></i>
                                <span><?php echo esc_html($potcast_text);?></span>
                            </a>
                            <?php endif;?>

                            <?php if($video_text):?>
                            <a href="<?php echo esc_url($video_url);?>">
                                <i class="fal fa-video"></i>
                                <span><?php echo esc_html($video_text);?></span>
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php papermag_search_function();?>
</header>