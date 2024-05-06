<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class pmg_sports_slider extends \Elementor\Widget_Base {

        public function get_name() {
            return 'pmgSports_slider';
        }

        public function get_title() {
            return esc_html__( 'Sports Slider', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-posts-carousel';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'sports_slider_opt',
                [
                    'label' => esc_html__( 'Slider Options', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'postcustomorder',
                [
                    'label'        => esc_html__( 'Custom Order', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default'      => 'no',
                ]
            );
            $this->add_control(
                'postorder',
                [
                    'label'     => esc_html__( 'Post Order', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'default'   => 'ASC',
                    'options'   => [
                        'ASC'  => esc_html__( 'Ascending', 'papermag-extension' ),
                        'DESC' => esc_html__( 'Descending', 'papermag-extension' ),
                    ],
                    'condition' => ['postcustomorder!' => 'yes'],
                ]
            );
            $this->add_control(
                'postorderby',
                [
                    'label'     => esc_html__( 'Post Order By', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'default'   => 'none',
                    'options'   => [
                        'none'          => esc_html__( 'None', 'papermag-extension' ),
                        'ID'            => esc_html__( 'ID', 'papermag-extension' ),
                        'date'          => esc_html__( 'Date', 'papermag-extension' ),
                        'title'         => esc_html__( 'Title', 'papermag-extension' ),
                        'comment_count' => esc_html__( 'Comment count', 'papermag-extension' ),
                        'rand'          => esc_html__( 'Random', 'papermag-extension' ),
                    ],
                    'condition' => ['postcustomorder' => 'yes'],
                ]
            );
            $this->add_control(
                'pst_per_page',
                [
                    'label'   => __( 'Posts Per Page', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 1,
                    'default' => 4,
                ]
            );          

            $this->add_control(
                'category',
                [
                    'label'          => esc_html__( 'Category', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'post_categories',
                [
                    'type'        => \Elementor\Controls_Manager::SELECT2,
                    'label'       => esc_html__( 'Select Categories', 'papermag-extension' ),
                    'options'     => papermag_post_category(),
                    'label_block' => true,
                    'multiple'    => true,
                    'condition'   => ['category' => 'yes'],
                ]
            );

            $this->add_control(
                'skip_post',
                [
                    'label'          => esc_html__( 'Skip Post Enable?', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'skip_post_count',
                [
                    'label'   => __( 'Skip Post Count', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'default' => 0,
                    'condition' => ['skip_post' => 'yes'],
                ]
            );
            $this->add_control(
                'title_show',
                [
                    'label'          => esc_html__( 'Title', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'title_length',
                [
                    'label'     => __( 'Title Length', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'step'      => 1,
                    'default'   => 20,
                    'condition' => ['title_show' => 'yes'],
                ]
            );
            $this->add_control(
                'comment',
                [
                    'label'          => esc_html__( 'Comment', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'post_view',
                [
                    'label'          => esc_html__( 'Post View', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );           

            $this->end_controls_section();

            $this->start_controls_section(
                'post_box_style',
                [
                    'label' => esc_html__( 'Post Box Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_responsive_control(
                'slide_height',
                [
                    'label'      => esc_html__( 'Slider Height', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 5,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .pmg-post-slider-item' => 'height: {{SIZE}}{{UNIT}}!important;',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'post_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pmg-post-slider-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'post_style',
                [
                    'label' => esc_html__( 'Post Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                '_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Title', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'title_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .pmg-post-slide-content h1',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pmg-post-slide-content h1' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_post_meta_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Meta', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'meta_typography',
                    'label'     => esc_html__( 'Meta Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .pmg-sports-top-meta div',
                ]
            );
            $this->add_control(
                '_post_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Button', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'btn_typography',
                    'label'     => esc_html__( 'Button Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} a.papermag-btn.pmg-sports-btn',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'papermag-extension' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .papermag-btn.pmg-sports-btn',
                ]
            );
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();

            $this->add_render_attribute(
                'papermag_postgridslide_options',
                [
                    'id'                   => 'papermag-post-grslide-' . $this->get_id(),
                    'data-slitems'         => $settings['slitems'],
                    'data-navs'            => $settings['navs'],
                    'data-loop'            => $settings['loop'],
                    'data-dots'            => $settings['dots'],
                    'data-center'          => $settings['center'],
                    'data-autoplay'        => $settings['autoplay'],
                    'data-slmargin'        => $settings['slmargin'],
                    'data-autoplaytimeout' => $settings['autoplaytimeout'],
                    'data-smartspeed'      => $settings['smartspeed'],
                ]
            );
        ?>
        <div class="papermag-sport-slider-wrap">
            <div class="papermag-sport-slider owl-carousel">
            <?php
            $args = array(
                    'post_type'           => 'post',
                    'posts_per_page'      => !empty( $settings['pst_per_page'] ) ? $settings['pst_per_page'] : 1,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => 1,
                    'order'               => $settings['postorder'],
                    'orderby'             => $settings['postorderby'],
                );
                if( ! empty($settings['post_categories'] ) ){
                    $args['category_name'] = implode(',', $settings['post_categories']);
                }
                if("yes" == $settings['skip_post']){
                    $args['offset'] = $settings['skip_post_count'];
                }
                $query = new WP_Query( $args );
            ?>
            <?php if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                $query->the_post();
                if(get_post_meta(get_the_ID(), 'papermag_post_format_meta', true)) {
                    $post_video_meta = get_post_meta(get_the_ID(), 'papermag_post_format_meta', true);
                } else {
                    $post_video_meta = array();
                }
                
                if( array_key_exists( 'video_link', $post_video_meta )) {
                    $video_link = $post_video_meta['video_link'];
                } else {
                    $video_link = '';
                }
                ?>
                <div class="pmg-post-slider-item d-flex align-items-center" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="pmg-post-slide-content">
                                <div class="pmg-sports-top-meta">
                                    <div class="post-cat">                               
                                        <?php papermag_category_name();?>
                                    </div>
                                    
                                    <?php if('yes' == $settings['comment']):?>
                                    <div class="post-cmt">
                                        <i class="fal fa-comments"></i> <?php echo esc_attr(get_comments_number());?>
                                    </div>                            
                                    <?php endif;?>

                                    <?php if('yes' == $settings['post_view']):?>
                                    <div class="post-view">
                                        <i class="fal fa-bolt"></i> <?php echo esc_attr(papermag_get_views());?>
                                    </div>
                                    <?php endif;?>
                                    
                                </div>
                                    <h1><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></h1>
                                    <a class="papermag-btn pmg-sports-btn" href="<?php the_permalink();?>">Read More <i class="fal fa-long-arrow-right"></i></a>
                                    <a class="popup-video sports-video" href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } wp_reset_query(); } ?>
            </div>
        </div>
                
        <?php
            }
        }
