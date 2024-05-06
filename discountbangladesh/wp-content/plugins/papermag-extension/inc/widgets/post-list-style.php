<?php

    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class papermag_post_list_syl extends \Elementor\Widget_Base {

        public function get_name() {
            return 'papermagpostgrid';
        }

        public function get_title() {
            return esc_html__( 'Post List Style', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-posts-group';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

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
                    'default' => 40,
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
                'btn_one_top_space',
                [
                    'label'      => esc_html__( 'Top Space', 'kit-unlimited' ),
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
                        '{{WRAPPER}} .papermag-post__item .papermag-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .papermag-post__item .papermag-post_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '_post_cate_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post category Bottom Space', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'post_cate_btm_space',
                [
                    'label'      => esc_html__( 'Top Space', 'kit-unlimited' ),
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
                        '{{WRAPPER}} .papermag-post-content .top-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                '_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Title', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'title_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .papermag-post-content .papermag-post-title',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post-content .papermag-post-title a' => 'color: {{VALUE}}',
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
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .papermag-post-content .top-meta div',
                ]
            );
            $this->add_control(
                '_post_authore_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Authore Meta', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'auth_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .auth-info-date span',
                ]
            );
            $this->add_control(
                'auth_color_color',
                [
                    'label'     => esc_html__( 'Authore Name Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .auth-info-date span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_post_date_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Date Meta', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'date_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .papermag-post__item .papermag-post-date',
                ]
            );
            $this->add_control(
                '_date_color',
                [
                    'label'     => esc_html__( 'Date Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post__item .papermag-post-date' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
        ?>
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
                
            <div class="papermag-post_list_item d-flex align-items-center papermag-common-hover">
                <div class="post-lst-style-thumb">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="">
                </div>
                <div class="papermag__list__post-content">
                    <?php if("yes" == $settings['category']):?>
                    <div class="top-meta d-flex align-items-center">
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
                    <h2 class="papermag__list__post-title hover-title">
                        <a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a>
                    </h2>
                    <?php endif;?>
                    <?php if('yes' == $settings['excerpt']):?>
                    <div class="post__list-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?>
                    </div>
                    <?php endif;?>
                    
                    <div class="post__list_footer d-flex justify-content-between align-items-center">
                        <div class="post__list_date">
                            <?php if('yes' == $settings['post_date']):?>
                            <?php if('date' == $settings['date_type']):?>
                            <div class="papermag-post-date"><i class="fal fa-calendar-alt"></i> <?php the_time('d F Y')?></div>
                            <?php endif?>
                            <?php if('date_time' == $settings['date_type']):?>
                            <div class="papermag-metas-item papermag-post-date"><i class="fal fa-calendar-alt"></i> <?php echo get_the_time( 'd F y - D g:i:a' ) ?></div>
                            <?php endif?>
                            <?php if('time' == $settings['date_type']):?>
                            <div class="papermag-metas-item papermag-post-date"><i class="fal fa-calendar-alt"></i> <?php the_time() ?></div>
                            <?php endif?>
                            <?php if('time_ago' == $settings['date_type']):?>
                            <div class="papermag-metas-item papermag-post-date"><i class="fal fa-calendar-alt"></i> <?php echo papermag_ready_time_ago()?></div>
                            <?php endif?>
                            <?php endif?>
                        </div>
                        <div class="post__list_btn">
                            <a href="<?php the_permalink();?>"><?php esc_html_e( 'Read More', 'papermag-extension' );?></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php } wp_reset_query(); } ?>
        <?php
            }
        }
