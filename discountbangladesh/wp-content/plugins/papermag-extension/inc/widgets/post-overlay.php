<?php

    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class exodus_post_overlay extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exoduspostoverlayk';
        }

        public function get_title() {
            return esc_html__( 'Exodus Post Image Overlay', 'papermag-extension' );
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
            
            $this->end_controls_section();

            $this->start_controls_section(
                'post_box_style',
                [
                    'label' => esc_html__( 'Post Box Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_responsive_control(
                'post_img_he',
                [
                    'label'      => esc_html__( 'Height', 'kit-unlimited' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'default'    => [
                        'size' => '189',
                    ],
                    'range'      => [
                        'px' => [
                            'min'  => 5,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .post__overlay_item .post-overlay-img img' => 'min-height: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .post__overlay_item .post-overlay-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .post__overlay_item .post-overlay-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label'     => esc_html__( 'Post Category Style', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'post_cate_btm_space',
                [
                    'label'      => esc_html__( 'Category Botton Space', 'kit-unlimited' ),
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
                        '{{WRAPPER}} .post__overlay_item .post-overlay-content .post-cat' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'cate_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .post__overlay_item .papermag-cate-name span',
                ]
            );
            $this->add_control(
                'cate_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post__overlay_item .papermag-cate-name span' => 'color: {{VALUE}}',
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
                    'selector'  => '{{WRAPPER}} .post__overlay_item .post-overlay-content h4',
                ]
            );
            
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post__overlay_item .post-overlay-content h4 a' => 'color: {{VALUE}}',
                    ],
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
                    'selector'  => '{{WRAPPER}} .post__overlay_item .auth-info-date span',
                ]
            );
            $this->add_control(
                'auth_colo',
                [
                    'label'     => esc_html__( 'Authore Name Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post__overlay_item .auth-info-date span' => 'color: {{VALUE}}',
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
                    'selector'  => '{{WRAPPER}} .post__overlay_item .papermag-post-date',
                ]
            );
            $this->add_control(
                '_date_color',
                [
                    'label'     => esc_html__( 'Date Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post__overlay_item .papermag-post-date' => 'color: {{VALUE}}',
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
                <div class="post__overlay_item">
                    <div class="post-overlay-img">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>">
                    </div>
                    <div class="post-overlay-content">
                        <?php if("yes" == $settings['category']):?>
                        <div class="post-cat">                                
                            <?php papermag_category_name();?>
                        </div>
                        <?php endif;?>
                        <h4><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h4>
                        <div class="post-bottom-meta">
                        <div class="auth-avater">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>">
                                <?php if('yes' == $settings['authore_avater']):?>
                                    <?php papermag_post_author_avatars($settings['avater_size']); ?>
                                <?php else:?>
                                    <i class="fal fa-users"></i>
                                <?php endif;?>            
                                </a> 
                        </div>
                            <div class="auth-info-date">              
                                <span><?php the_author()?></span>

                                <?php if('yes' == $settings['post_date']):?>
                                <?php if('date' == $settings['date_type']):?>
                                <div class="papermag-post-date"><i data-feather="clock"></i> <?php the_time('d F Y')?></div>
                                <?php endif?>
                                <?php if('date_time' == $settings['date_type']):?>
                                <div class="papermag-metas-item papermag-post-date"><i data-feather="clock"></i> <?php echo get_the_time( 'd F y - D g:i:a' ) ?></div>
                                <?php endif?>
                                <?php if('time' == $settings['date_type']):?>
                                <div class="papermag-metas-item papermag-post-date"><i data-feather="clock"></i> <?php the_time() ?></div>
                                <?php endif?>
                                <?php if('time_ago' == $settings['date_type']):?>
                                <div class="papermag-metas-item papermag-post-date"><i data-feather="clock"></i> <?php echo papermag_ready_time_ago()?></div>
                                <?php endif?>
                            <?php endif?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } wp_reset_query(); } ?>
        <?php
            }
        }
