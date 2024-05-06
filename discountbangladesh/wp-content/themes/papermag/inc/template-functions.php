<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package PaperMag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function papermag_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'papermag_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function papermag_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'papermag_pingback_header' );

/**
 * Category Count Markup
 */
function papermag_category_html( $links ) {
    $links = str_replace( '</a> (', '<span class="item-count">(', $links );
    $links = str_replace( ')', ')</span></a>', $links );
    return $links;
}
add_filter( 'wp_list_categories', 'papermag_category_html' );

/**
 * Archive Count Markup
 */
function papermag_archive_html($links) {
    $links = str_replace('</a>&nbsp;(', '<span class="item-count">(', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}

add_filter('get_archives_link', 'papermag_archive_html');
/**
 * papermag Post Suppurt Tag
 */

function papermag_wp_kses( $val ) {
    return wp_kses( $val, array(

        'p'      => array(
            'class' => array(),
            'style' => array(),
        ),

        'img'    => array(
            'src'   => array(),
            'alt'   => array(),
            'class' => array(),
            'style' => array(),
        ),
        'span'   => array(
            'class' => array(),
            'style' => array(),
        ),
        'small'  => array(),
        'div'    => array(
            'style' => array(),
        ),
        'strong' => array(
            'style' => array(),
        ),
        'b'      => array(
            'style' => array(),
        ),
        'br'     => array(),
        'h1'     => array(
            'style' => array(),
        ),
        'i'      => array(
            'class' => array(),
            'style' => array(),
        ),
        'ul'     => array(
            'class' => array(),
            'style' => array(),
        ),
        'ul'     => array(
            'id' => array(),
        ),
        'li'     => array(
            'class' => array(),
            'style' => array(),
        ),
        'li'     => array(
            'id' => array(),
        ),
        'h1'     => array(
            'style' => array(),
        ),
        'h2'     => array(),
        'h3'     => array(
            'style' => array(),
        ),
        'h4'     => array(
            'style' => array(),
        ),
        'h5'     => array(
            'style' => array(),
        ),
        'h6'     => array(
            'style' => array(),
        ),
        'a'      => array( 
            'href' => array(), 
            'target' => array(),
            'style' => array(),
        ),
        'iframe' => array( 'src' => array(), 'height' => array(), 'width' => array() ),

    ), '' );
}


/**
 * post Pagination
 */
function papermag_pagination() {
    global $wp_query;
    $links = paginate_links( array(
    'current'   => max( 1, get_query_var( 'paged' ) ),
    'total'     => $wp_query->max_num_pages,
    'type'      => 'list',
    'mid_size'  => 3,
    'prev_text' => '<i class="fal fa-long-arrow-left"></i>',
    'next_text' => '<i class="fal fa-long-arrow-right"></i>',
    ) );

    echo wp_kses_post( $links );
}

/**
 * papermag Single Post Nav
 */
function papermag_single_post_pagination(){ 
    $papermag_prev_post = get_previous_post();
    $papermag_next_post = get_next_post();
?>
<div class="post-next-prev">
    <div class="row">
        <?php 
             if($papermag_prev_post || $papermag_next_post):
        ?>
        <div class="col-md-6">
            <div class="nav-post-item prev-post-item d-flex align-items-center">
                <?php if(has_post_thumbnail()):?>
                <div class="post_nav_thumb">
                <a href="<?php echo esc_url(get_the_permalink($papermag_prev_post));?>">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($papermag_prev_post, 'thumbnail'));?>" alt="<?php the_title_attribute();?>">
                 </a>
                </div>
                <?php endif;?>
                <div class="post_nav_inner">
                    <a href="<?php echo esc_url(get_the_permalink($papermag_prev_post));?>"><?php esc_html_e( 'Previous', 'papermag' );?></a>
                    <h4><a href="<?php echo esc_url(get_the_permalink($papermag_prev_post));?>"><?php echo esc_html(get_the_title($papermag_prev_post));?></a></h4>
                </div>
            </div>
        </div>
        <?php endif;?>
        <?php 
            
            if($papermag_next_post):
        ?>
        <div class="col-md-6">
            <div class="nav-post-item next-post-item d-flex align-items-center text-right flex-row-reverse">
            <?php if(has_post_thumbnail()):?>
                <div class="post_nav_thumb">
                <a href="<?php echo esc_url(get_the_permalink($papermag_next_post));?>">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($papermag_next_post, 'thumbnail'));?>" alt="<?php the_title_attribute();?>">
                </a>
                </div>
                <?php endif;?>
                <div class="post_nav_inner">
                    <a href="<?php echo esc_url(get_the_permalink($papermag_next_post));?>"><?php esc_html_e( 'Next', 'papermag' ); ?> </a>
                    <h4><a href="<?php echo esc_url(get_the_permalink($papermag_next_post));?>"><?php echo esc_html(get_the_title($papermag_next_post));?></a></h4>
                </div>
                
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
<?php 
}


/**
 * Comment List Modification
 */

function papermag_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;?>

	<li     <?php comment_class('comment');?> id="comment-<?php comment_ID()?>">
        <div class="comment-body">
            <?php if ( get_avatar( $comment ) ) {?>
                <div class="author-thumb">
                    <?php echo get_avatar( $comment, 60 ); ?>
                </div>
            <?php }?>

            <div class="comment-content">
                <h4 class="name"><?php comment_author_link()?>
                <span class="comment-date"><?php echo esc_html( get_comment_date( 'j M Y' ) ); ?></span></h4>
                <?php if ( $comment->comment_approved == '0' ): ?>
                    <p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'papermag' );?></em></p>
                <?php endif;?>
                <?php comment_text();?>
                <div class="comment-footer">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );?>
                </div>
            </div>
        </div>
	</li>


<?php
}



/**
 * Comment Message Box
 */
function papermag_comment_reform( $arg ) {

	$arg['title_reply']   = esc_html__( 'Leave a comment', 'papermag' );
	$arg['comment_field'] = '<div class="row"><div class="col-md-12"><div class="input-field mb-30"><textarea id="comment" class="form_control" name="comment" cols="77" rows="3" placeholder="' . esc_html__( "Comment", "papermag" ) . '" aria-required="true"></textarea></div></div></div>';

	return $arg;

}
add_filter( 'comment_form_defaults', 'papermag_comment_reform' );

/**
 * Comment Form Field
 */

function papermag_modify_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );

	$fields['author'] = '<div class="row"><div class="col-md-6"><div class="input-field mb-30"><input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_html__( "Name", "papermag" ) . '" size="22" tabindex="1"' . ( $req ? 'aria-required="true"' : '' ) . ' class="form_control" /></div></div>';

	$fields['email'] = '<div class="col-md-6"><div class="input-field mb-30"><input type="email" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_html__( "Email", "papermag" ) . '" size="22" tabindex="2"' . ( $req ? 'aria-required="true"' : '' ) . ' class="form_control"  /></div></div>';

	$fields['url'] = '<div class="col-md-12"><div class="input-field mb-30"><input type="url" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_html__( "Website", "papermag" ) . '" size="22" tabindex="2"' . ( $req ? 'aria-required="false"' : '' ) . ' class="form_control"  /></div></div></div>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'papermag_modify_comment_form_fields' );

// comment Move Field
function papermag_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'papermag_move_comment_field_to_bottom' );

/**
 * Category Badge With Color
 *
 * @return loop
 */
function papermag_category_name(){
    $catgorys = get_the_category();
    foreach( $catgorys as $key => $category):

        $catemeta = !empty(get_term_meta( $category->term_id, '_papermag_cate-color', true )) ? get_term_meta( $category->term_id, '_papermag_cate-color', true ) : "#1f5dda"; 
        ?>
        <a class="papermag-cate-name" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        <span><?php echo esc_html($category->cat_name); ?></span> 
        </a>
    <?php endforeach;
}
