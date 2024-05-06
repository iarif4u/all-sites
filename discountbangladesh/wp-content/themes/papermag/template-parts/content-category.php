<?php 
$blog_cate = cs_get_option('blog_cate');
$cate_view = cs_get_option('cate_view');
$cate_cmt = cs_get_option('cate_cmt');
$title_length = cs_get_option('title_length');
$excerpt_length = cs_get_option('excerpt_length');
$cate_item = cs_get_option('choose-colm');
if('1' == $cate_item){
    $item_column = 'col-md-6';
}elseif('2' == $cate_item){
    $item_column = 'col-lg-4 col-md-6';
}else{
    $item_column = 'col-lg-3 col-md-6';
}
?>
<div class="<?php echo esc_attr($item_column);?>">
    <div class="post-colum-item papermag-common-hover">
        <div class="post-grid-thumb">
            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
        </div>
        <div class="post-content-col-grid">
            <div class="post-meta-info common-style-meta d-flex">
                <?php if(true == $blog_cate):?>
                <div class="post-cat">                                
                    <?php papermag_category_name();?>
                </div>
                <?php endif;?>

                <?php if(true == $cate_cmt):?>
                <div class="post-cmt">
                    <i class="fal fa-comments"></i> <?php echo esc_attr(get_comments_number());?>
                </div>           
                <?php endif;?>

                <?php if(true == $cate_view):
                    if(function_exists('papermag_get_views')):
                ?>
                <div class="post-view">
                    <i class="fal fa-bolt"></i> <?php echo esc_attr(papermag_get_views());?>
                </div>
                <?php endif; endif;?>
            </div>
            
            <h4 class="hover-title"><a href="<?php the_permalink()?>"><?php echo esc_html( wp_trim_words(get_the_title(), $title_length, '') );?></a></a></h4>
            <?php echo esc_html( wp_trim_words(get_the_excerpt(), $excerpt_length, '') );?>
        </div> 
    </div>                            
</div>