<?php

/**
 * PaperMag Preloader
 */

function papermag_preloader(){ 
    $preloader_enable = cs_get_option('preloader_enable');    
    $loader_speed = cs_get_option('loader_speed');    
    if(true == $preloader_enable):
    ?>
        <div class="papermag-preloader">
            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_9345yvlv.json"  background="transparent"  speed="<?php echo esc_attr($loader_speed);?>"  loop  autoplay></lottie-player>
        </div>
    <?php
    endif;
}


/**
 * papermag Header Option
 */
function papermag_header_opt(){
    
    if('header-style-one' === papermag_site_header()){
        get_template_part('template-parts/header/header-style', 'one');
    }elseif('header-style-two' === papermag_site_header()){
        get_template_part('template-parts/header/header-style', 'two');
    }elseif('header-style-three' === papermag_site_header()){
        get_template_part('template-parts/header/header-style', 'three');
    }else{
        get_template_part('template-parts/header/header-style', 'one');
    }
}

/**
 * PaperMag Searc Box
 */
function papermag_search_function(){ ?>

    <div class="papermag-search-popup">
       <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
           <div class="form-group">
               <input type="search" name="s" id="search" value="<?php the_search_query();?>" placeholder="<?php esc_html_e( 'Search Here', 'papermag' )?>" />
           </div>
       </form>
       <button class="close-search"><i class="fal fa-times"></i></button>
    </div>
    <?php 
    } 
/**
 * papermag Footer Option
 */
function papermag_footer_opt(){
    get_template_part('template-parts/footer/footer', 'one');
}


/**
 * papermag Post Loop
 */
function papermag_post_loop(){ ?>
    <?php
    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part( 'template-parts/post-formats/content', get_post_format() );

        endwhile; ?>

        <div class="papermag-post-pagination">
            <?php papermag_pagination();?>
        </div>

    <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>
    <?php
}

/**
 * Post Archive Loop
 */
function papermag_archive_loop(){ ?>
    <?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post-formats/content', get_post_format() );

			endwhile;?>

			<div class="papermag-post-pagination">
                <?php papermag_pagination();?>
            </div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
    <?php 
}

/**
 * Search Loop
 */

function papermag_serach_loop(){
    if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;?>

            <div class="papermag-post-pagination">
                <?php papermag_pagination();?>
            </div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
}

/**
 * papermag Single Post Loop
 */
function papermag_single_post_loop(){    
    $blog_nav = cs_get_option('blog_nav');
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', get_post_type() );
        if(true == $blog_nav){
            papermag_single_post_pagination();
        }
        

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
}

/**
 * papermag Page Loop
 */
function papermag_page_loop(){
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
}

/**
 * Category Loop
 */
 function papermag_category_loop(){ 
    if ( have_posts() ) :?>
        <div class="row">
            <?php /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                /*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
                get_template_part( 'template-parts/content', 'category' );

            endwhile; ?>
        </div>      

        <div class="papermag-post-pagination">
            <?php papermag_pagination();?>
        </div>

   <?php else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    
 }

 /**
  * papermag Single BreadCrumb
  */
 function papermag_breadcrumb(){ 
 ?>
 <div class="papermag-breadcrumb-area">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 col-6 col-md-6">
                 <h4><?php esc_html_e('Blog Post', 'papermag');?></h4>
             </div>
             <?php if(function_exists('bcn_display')):?>
             <div class="col-lg-6 col-6 col-md-6 text-right">
                 <?php bcn_display();?>
             </div>
             <?php endif;?>
         </div>
     </div>
 </div>   
 <?php
 }

 /**
  * papermag Page BreadCrumb
  */
 function papermag_page_breadcrumb(){ 
 ?>
 <div class="papermag-breadcrumb-area">
     <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
                 <h4><?php the_title();?></h4>
             </div>
             <?php if(function_exists('bcn_display')):?>
             <div class="col-lg-6 col-md-6 text-right">
                 <?php bcn_display();?>
             </div>
             <?php endif;?>
         </div>
     </div>
 </div>   
 <?php
 }

 /**
  * papermag Single BreadCrumb
  */
 function papermag_search_breadcrumb(){ 
 ?>
 <div class="papermag-breadcrumb-area">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                <h4 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'papermag' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h4>
             </div>
         </div>
     </div>
 </div>   
 <?php
 }

 /**
  * papermag Error Content
  */
  function papermag_error_info(){ 
    $error_code = cs_get_option('error_code');    
    $error_title = cs_get_option('error_title');    
    $error_button = cs_get_option('error_button');    
  ?>
    <div class="error-content text-center">
        <h1>
            <?php
            if($error_code){
                echo esc_attr($error_code);
            }else {
                esc_attr_e( '404', 'papermag' );
            }             
            ?>
        </h1>
        <h2>
            <?php 
                if($error_title){
                    echo esc_html($error_title);
                }else {
                    esc_html_e( 'Look’s like here is nothing', 'papermag' );
                }                
            ?>
        </h2>
        <a class="papermag-btn-color" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <i class="fal fa-long-arrow-left"></i> 
            <?php 
                if($error_button){
                    echo esc_html($error_button);
                }else {
                    esc_html_e( 'Go Back Home', 'papermag' );
                }
                
            ?>
        </a>
    </div>
    <?php 
  }