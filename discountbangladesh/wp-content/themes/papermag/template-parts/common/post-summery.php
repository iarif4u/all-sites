<?php 
$blog_btn_text = cs_get_option('blog_btn_text');
$blog_it_cate = cs_get_option('blog_it_cate');
$blog_cmt = cs_get_option('blog_cmt');
$blog_post_view = cs_get_option('blog_post_view');
?>
<div class="papermag-blog-content">
    <div class="post-meta-info d-flex">
        <div class="post-cat">
            <?php papermag_category_name();?>
        </div>
        <div class="post-cmt">
            <i class="fal fa-comments"></i> <?php echo esc_attr(get_comments_number());?>
        </div>         
        <?php if(true == $blog_post_view):
            if(function_exists('papermag_get_views')):
        ?>
        <div class="post-view">
            <i class="fal fa-bolt"></i> <?php echo esc_attr(papermag_get_views());?>
        </div>
        <?php endif; endif;?>
    </div>
    <h1 class="hover-title exo-main-post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
    <div class="blog-excerpt">
        <?php the_excerpt();?>
    </div>	
    <a class="papermag-btn" href="<?php the_permalink();?>"><?php if(isset($blog_btn_text) && !empty($blog_btn_text)){echo esc_html($blog_btn_text);}else{esc_html_e( 'Read More', 'papermag' );}?></a>
</div>