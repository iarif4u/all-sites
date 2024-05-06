<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function papermag_post_category (){
    $terms = get_terms( array(
        'taxonomy'    => 'category',
        'hide_empty'  => true
    ) );

    $cat_list = [];
    foreach($terms as $post) {
    $cat_list[$post->slug]  = [$post->name];
    }
    return $cat_list;
}


/**
 * Display Post Author Avatars
 *
 * @return void
 */
function papermag_post_author_avatars($size) {
    echo get_avatar(get_the_author_meta('email'), $size);
}
  
add_action('genesis_entry_header', 'papermag_post_author_avatars');


/**
 * Time Ago
 *
 * @return void
 */
function papermag_ready_time_ago(){
    return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago','kit-unlimited' );
}



/**
 * Post get View Count
 */
function papermag_get_views( $id = false ) {
    if ( !$id ) {
        $id = get_the_ID();
    }

    $number = get_post_meta( $id, '_papermag_views_count', true );
    $precision = 2;
    if ( empty( $number ) ) {
        $number = 0;
    }

    if ( $number >= 1000 && $number < 1000000 ) {
        $formatted = number_format( $number / 1000, $precision ) . 'K';
    } else if ( $number >= 1000000 && $number < 1000000000 ) {
        $formatted = number_format( $number / 1000000, $precision ) . 'M';
    } else if ( $number >= 1000000000 ) {
        $formatted = number_format( $number / 1000000000, $precision ) . 'B';
    } else {
        $formatted = $number;
    }
    $formatted = str_replace( '.00', '', $formatted );

    return $formatted;
}

/**
 * Post Update View Count
 */
function papermag_update_views() {
    if ( !is_single() || !is_singular( 'post' ) ) {
        return;
    }

    $id = get_the_ID();

    $number = get_post_meta( $id, '_papermag_views_count', true );
    if ( empty( $number ) ) {
        $number = 1;
        add_post_meta( $id, '_papermag_views_count', $number );
    } else {
        $number++;
        update_post_meta( $id, '_papermag_views_count', $number );
    }
}
add_action( 'wp', 'papermag_update_views' );


/**
 * Post Social Share
 *
 * @return void
 */
function papermag_post_share() {

    $permalink = get_permalink( get_the_ID() );
    $title     = get_the_title();
?>
<div class="social-box">
    <a class="fb" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( $permalink ); ?>"><i class="fab fa-facebook-f"></i></a>

    <a class="tw" onClick="window.open('http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fab fa-twitter"></i></a>

    <a class="ln" onClick="window.open('https://www.linkedin.com/cws/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo esc_attr( $title ); ?>','Linkedin share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url( $permalink ); ?>&amp;text=<?php echo str_replace( " ", "%20", $title ); ?>"><i class="fab fa-linkedin"></i></a>

    <a class="pt" href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i class="fab fa-pinterest"></i></a>
</div>
<?php 
}
