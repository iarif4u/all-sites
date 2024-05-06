<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class exodus_post_video extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exoduspostvideo';
        }

        public function get_title() {
            return esc_html__( 'Post Video', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-video-playlist';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            
            $this->start_controls_section(
                'post_heading_control',
                [
                    'label' => esc_html__( 'Post Heading', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'post_sub_heading',
                [
                    'label'        => esc_html__( 'Post Sub Heading', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'post_heading',
                [
                    'label'        => esc_html__( 'Post Heading', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'post_options',
                [
                    'label' => esc_html__( 'Post Options', 'papermag-extension' ),
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
                        'name'          => esc_html__( 'Name', 'papermag-extension' ),
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
                    'default' => 1,
                ]
            );

            $this->add_control(
                'authore',
                [
                    'label'          => esc_html__( 'Author', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'authore_avater',
                [
                    'label'          => esc_html__( 'Author Avater', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                    'condition'      => ['authore' => 'yes'],
                ]
            );
            $this->add_control(
                'avater_size',
                [
                    'label'   => __( 'Authore Avater Size', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 20,
                    'default' => 30,
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
                'post_date',
                [
                    'label'          => esc_html__( 'Date', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_responsive_control(
                'date_type',
                [
                    'label'     => esc_html__( 'Date Type', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'default'   => 'date',
                    'options'   => [
                        'date'      => esc_html__( 'Date', 'papermag-extension' ),
                        'date_time' => esc_html__( 'Date & Time', 'papermag-extension' ),
                        'time'      => esc_html__( 'Time', 'papermag-extension' ),
                        'time_ago'  => esc_html__( 'Time Ago', 'papermag-extension' ),
                    ],
                    'condition' => ['post_date' => 'yes'],
                ]
            );
            $this->add_control(
                'title',
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
                    'condition' => ['title' => 'yes'],
                ]
            );
            $this->add_control(
                'excerpt',
                [
                    'label'          => esc_html__( 'Excerpt', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'excerpt_length',
                [
                    'label'     => __( 'Excerpt Length', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'step'      => 1,
                    'default'   => 22,
                    'condition' => ['excerpt' => 'yes'],
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
                'video_lg_height',
                [
                    'label'      => esc_html__( 'Height', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'default'    => [
                        'size' => '550',
                    ],
                    'range'      => [
                        'px' => [
                            'min'  => 5,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .papermag-post_image' => 'min-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_badding',
                [
                    'label'      => esc_html__( 'Padding', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .papermag-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .papermag-post_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'title_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .papermag-post__item h3.papermag-post-title',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post__item h3.papermag-post-title a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_post_sm_video_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Small Video', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'sm_list_title_typography',
                    'label'     => esc_html__( 'List Post Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .post-list-item-one h4',
                ]
            );
            
            $this->add_control(
                'post_smtitle_color',
                [
                    'label'     => esc_html__( 'Small Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-list-item-one h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();
        }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $post_sub_heading = $settings['post_sub_heading'];
        $post_heading = $settings['post_heading'];
    ?>
    <div class="papermag-post-video-area">
        <div class="section-heading white-title">
            <span><?php echo esc_html($post_sub_heading);?></span>
            <h4><?php echo esc_html($post_heading);?></h4>
            <i class="fal fa-video"></i>
        </div>
        <div class="row">
        <?php
                $args = array(
                    'post_type'           => 'post',
                    'posts_per_page'      => !empty( $settings['pst_per_page'] ) ? $settings['pst_per_page'] : 1,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => 1,
                    'order'               => $settings['postorder'],
                    'orderby'             => $settings['postorderby'],
                    'tax_query' => [
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => array('post-format-video'),
                        'operator' => 'IN'
                    ]
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
                $query->the_post();
                $idd  = get_the_ID();
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
                <?php if(0 == $query->current_post):?>
                <div class="col-lg-6">                
                    <div class="papermag-post__item papermag-common-hover">
                        <div class="papermag-post_image"  style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>)">
                            <a class="papermag-img-link" href="<?php the_permalink();?>"></a> 
                        </div>
                        <div class="video-popup">
                            <a class="papermag-popup-video" href="<?php echo esc_url($video_link);?>"><i class="fad fa-play"></i></a>
                        </div>
                        <div class="papermag-post-content">
                            <?php if("yes" == $settings['category']):?>
                            <div class="top-meta">
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
                            <?php endif;?>
                            <?php if("yes" == $settings['title']):?>
                            <h3 class="papermag-post-title hover-title">
                                <a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a>
                            </h3>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php else:?>
                <?php if ( 1 ==  $query->current_post ): ?>
                <div class="col-lg-6">
                    <?php endif;?>
                    <div class="post-list-item-one post__list_video d-flex papermag-common-hover">
                        <div class="post-list-thumb-one">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>">
                            <a class="papermag-popup-video" href="<?php echo esc_url($video_link);?>"><i class="fad fa-play"></i></a>
                        </div>
                        <div class="post-list-content-one">
                            <div class="post-meta-info d-flex">
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
                            <h4 class="hover-title"><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h4>
                        </div>
                    </div>
                    <?php if (($query->current_post + 1) == ($query->post_count)):?>
                </div>
                <?php endif; endif;?>
            <?php    
                }
            }
            ?>
        </div>
    </div>                            
    
    <?php
        }
    }
