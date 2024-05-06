<?php

    class exodus_auth_post_video extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus_authore_post_video';
        }

        public function get_title() {
            return __( 'Authore Quote Video Popup', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-user-circle-o';
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
            $this->end_controls_section();

            $this->start_controls_section(
                'authore_content',
                [
                    'label' => __( 'Authore Content', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'authore_img', [
                    'label'       => esc_html__( 'Authore Image', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'authore_box',
                [
                    'label' => esc_html__( 'Authore Box Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Box Padding', 'papermag-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .papermag-authore-quote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'authore_bg',
                    'label'    => __( 'Background', 'papermag-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .papermag-authore-quote',
                ]
            ); 
            $this->add_control(
                'box_round',
                [
                    'label' => __( 'Box Round', 'papermag-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .papermag-authore-quote.with-popup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
    
            $this->end_controls_section();
            $this->start_controls_section(
                'authore_info_style',
                [
                    'label' => esc_html__( 'Authore Info Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'authore_name',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Authore Namme Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'quote_color',
                [
                    'label'     => esc_html__( 'Quote Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-authore-quote .auth-info-date span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'quote_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .papermag-authore-quote .auth-info-date span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'authore_date',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Authore Date Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'date_color',
                [
                    'label'     => esc_html__( 'Date Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-authore-quote .auth-info-date .papermag-post-date' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'date_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .papermag-authore-quote .auth-info-date .papermag-post-date',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_post_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Title Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .papermag-authore-quote.with-popup .quote-info h3 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'authore_nm_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .papermag-authore-quote.with-popup .quote-info h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );            
            $this->add_control(
                '_post_excerpt_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Excerpt Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'excerpt_color',
                [
                    'label'     => esc_html__( 'Excerpt Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-authore-quote p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'post_exc_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .papermag-authore-quote p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );            

            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $authore_img    = $settings['authore_img']['url'];

        ?>
        <div class="papermag-authore-quote with-popup">
            
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
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();?>
            <div class="quote-info">
                <a class="popup-video" href="#"><i class="fas fa-play"></i></a>
                <h3 class="hover-title"><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h3>
                <?php the_excerpt();?>
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
            <?php } wp_reset_query(); } ?>
            <div class="quote-auth-img">
                <img src="<?php echo esc_url($authore_img);?>" alt="<?php echo esc_attr('Authorer');?>">
            </div>
        </div>
      <?php

              }

      }