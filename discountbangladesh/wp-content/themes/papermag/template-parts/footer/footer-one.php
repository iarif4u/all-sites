<?php
$papermag_copywrite_text   = cs_get_option('papermag_copywrite_text');
$papermag_footer_logo_text   = cs_get_option('papermag_footer_logo_text');
$papermag_footer_logo_tag   = cs_get_option('papermag_footer_logo_tag');
$footer_link   = cs_get_option('footer_link');
$elm_footer_widget   = cs_get_option('elm_footer_widget');
?>
<footer class="papermag-footer footer-1">
    <?php if($elm_footer_widget):?>
    <div class="footer-top">
        <?php 
            echo do_shortcode( $elm_footer_widget );
        ?>
    </div>
    <?php endif;?>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="footer-btm-left">
                        <h1><?php echo esc_html($papermag_footer_logo_text);?></h1>
                        <p><?php echo esc_html($papermag_footer_logo_tag);?></p>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <?php if(!empty($footer_link)):?>
                    <div class="footer-nav">
                        <ul>
                            <?php foreach($footer_link as $item):?>
                            <li><a href="<?php echo esc_url($item['footer_link']['url']);?>"><?php echo esc_html($item['footer_link_text']);?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php endif;?>
                    <div class="copyright">
                    <?php if($papermag_copywrite_text):
                               echo papermag_wp_kses(wpautop($papermag_copywrite_text));    
                            else: 
                            ?>
                            <p><?php esc_html_e('&copy;2022, papermag - Modern Magazine WordPress Theme.', 'papermag');?></p>
                            <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>