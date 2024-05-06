<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class recent_add_post_carousel extends \Elementor\Widget_Base {

        public function get_name() {
            return 'recent_add_post_carousel';
        }

        public function get_title() {
            return esc_html__( 'Recent Add Post', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-posts-carousel';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'post_options',
                [
                    'label' => esc_html__( 'Recent Add Post Options', 'papermag-extension' ),
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
                'slider_setings',
                [
                    'label' => esc_html__( 'Slider Settings', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                '_slide_control_set',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Slider Control Settings', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'slitems',
                [
                    'label'   => __( 'Slider Grid Item', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 1,
                    'max'     => 6,
                    'step'    => 1,
                    'default' => 5,
                ]
            );
            $this->add_control(
                'navs',
                [
                    'label'        => esc_html__( 'Nav', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'    => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value' => true,
                    'default'      => true,
                ]
            );
            $this->add_control(
                'loop',
                [
                    'label'        => esc_html__( 'Loop', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'    => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value' => true,
                    'default'      => true,
                ]
            );
            $this->add_control(
                'dots',
                [
                    'label'        => esc_html__( 'Dots', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'    => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value' => true,
                    'default'      => false,
                ]
            );
            $this->add_control(
                'center',
                [
                    'label'        => esc_html__( 'Center', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'    => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value' => true,
                    'default'      => false,
                ]
            );
            $this->add_control(
                'autoplay',
                [
                    'label'        => esc_html__( 'Autoplay', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'    => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value' => true,
                    'default'      => true,
                ]
            );

            $this->add_control(
                'slmargin',
                [
                    'label'   => __( 'Margin', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 0,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 10,
                ]
            );
            $this->add_control(
                'autoplaytimeout',
                [
                    'label'   => __( 'Autoplay Timeout', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 100,
                    'max'     => 1000000,
                    'step'    => 100,
                    'default' => 5000,
                ]
            );
            $this->add_control(
                'smartspeed',
                [
                    'label'   => __( 'Smart Speed', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 100,
                    'max'     => 10000,
                    'step'    => 100,
                    'default' => 700,
                ]
            );
            $this->add_control(
                'autoplayHoverPause',
                [
                    'label'        => esc_html__( 'autoplayHoverPause', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'    => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value' => true,
                    'default'      => false,
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
                'post_img_height',
                [
                    'label'      => esc_html__( 'Image Height', 'papermag-extension' ),
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
                        '{{WRAPPER}} .post-grid-item-two .post-grid-thumb img' => 'height: {{SIZE}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'post_img_width',
                [
                    'label'      => esc_html__( 'Image Width', 'papermag-extension' ),
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
                        '{{WRAPPER}} .post-grid-item-two .post-grid-thumb img' => 'width: {{SIZE}}{{UNIT}}!important;',
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
                        '{{WRAPPER}} .post-grid-item-two .post-grid-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'selector'  => '{{WRAPPER}} .post-grid-item-two .post-grid-content h4',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-grid-item-two .post-grid-content h4 a' => 'color: {{VALUE}}',
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
                    'selector'  => '{{WRAPPER}} .common-style-meta div',
                ]
            );
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();

        ?>
        <div class="papermag-post-carousel-recent-add">
            
            <div class="papermag-post-recent-add owl-carousel">
            
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

            <?php
                if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();?>
                    
                    <div class="post_recent_ad_item">
                        <?php if(has_post_thumbnail()):?>
                        <div class="post-recent-add-thumb">
                            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
                        </div>
                        <?php endif;?>
                        <div class="post_recet_add_content">
                            <div class="post-meta-info common-style-meta d-flex">
                                <?php if("yes" == $settings['category']):?>
                                <div class="post-cat">                                
                                    <?php papermag_category_name();?>
                                </div>
                                <?php endif;?>

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
                            <?php if('yes' == $settings['title_show']):?>
                            <h4 class="hover-title"><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h4>
                            <?php endif;?>
                        </div>
                    </div>  

                <?php } wp_reset_query(); } ?>
                </div>
            </div>
        <?php
            }
        }
