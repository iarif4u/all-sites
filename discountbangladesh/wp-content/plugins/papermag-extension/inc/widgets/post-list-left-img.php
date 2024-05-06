<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class exodus_post_list_left_img extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exoduspostlist-left';
        }

        public function get_title() {
            return esc_html__( 'Post List Two', 'datanext-extension' );
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
                    'label' => esc_html__( 'Post Options', 'datanext-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'postcustomorder',
                [
                    'label'        => esc_html__( 'Custom Order', 'datanext-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default'      => 'no',
                ]
            );
            $this->add_control(
                'postorder',
                [
                    'label'     => esc_html__( 'Post Order', 'datanext-extension' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'default'   => 'ASC',
                    'options'   => [
                        'ASC'  => esc_html__( 'Ascending', 'datanext-extension' ),
                        'DESC' => esc_html__( 'Descending', 'datanext-extension' ),
                    ],
                    'condition' => ['postcustomorder!' => 'yes'],
                ]
            );
            $this->add_control(
                'postorderby',
                [
                    'label'     => esc_html__( 'Post Order By', 'datanext-extension' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'default'   => 'none',
                    'options'   => [
                        'none'          => esc_html__( 'None', 'datanext-extension' ),
                        'ID'            => esc_html__( 'ID', 'datanext-extension' ),
                        'date'          => esc_html__( 'Date', 'datanext-extension' ),
                        'name'          => esc_html__( 'Name', 'datanext-extension' ),
                        'title'         => esc_html__( 'Title', 'datanext-extension' ),
                        'comment_count' => esc_html__( 'Comment count', 'datanext-extension' ),
                        'rand'          => esc_html__( 'Random', 'datanext-extension' ),
                    ],
                    'condition' => ['postcustomorder' => 'yes'],
                ]
            );
            $this->add_control(
                'pst_per_page',
                [
                    'label'   => __( 'Posts Per Page', 'datanext-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 1,
                    'max'     => 5,
                    'default' => 5,
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
                    'label'       => esc_html__( 'Select Categories', 'datanext-extension' ),
                    'options'     => papermag_post_category(),
                    'label_block' => true,
                    'multiple'    => true,
                ]
            );
                     

            $this->add_control(
                'skip_post',
                [
                    'label'          => esc_html__( 'Skip Post Enable?', 'datanext-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'datanext-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'datanext-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'skip_post_count',
                [
                    'label'   => __( 'Skip Post Count', 'datanext-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'default' => 0,
                    'condition' => ['skip_post' => 'yes'],
                ]
            );
            $this->add_control(
                'authore',
                [
                    'label'          => esc_html__( 'Author', 'datanext-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'datanext-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'datanext-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'authore_avater',
                [
                    'label'          => esc_html__( 'Author Avater', 'datanext-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'datanext-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'datanext-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                    'condition'      => ['authore' => 'yes'],
                ]
            );
            $this->add_control(
                'avater_size',
                [
                    'label'   => __( 'Authore Avater Size', 'datanext-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 20,
                    'default' => 30,
                ]
            );   

            $this->add_control(
                'post_date',
                [
                    'label'          => esc_html__( 'Date', 'datanext-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'datanext-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'datanext-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_responsive_control(
                'date_type',
                [
                    'label'     => esc_html__( 'Date Type', 'datanext-extension' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'default'   => 'date',
                    'options'   => [
                        'date'      => esc_html__( 'Date', 'datanext-extension' ),
                        'date_time' => esc_html__( 'Date & Time', 'datanext-extension' ),
                        'time'      => esc_html__( 'Time', 'datanext-extension' ),
                        'time_ago'  => esc_html__( 'Time Ago', 'datanext-extension' ),
                    ],
                    'condition' => ['post_date' => 'yes'],
                ]
            );
            $this->add_control(
                'title',
                [
                    'label'          => esc_html__( 'Title', 'datanext-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'datanext-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'datanext-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'title_length',
                [
                    'label'     => __( 'Title Length', 'datanext-extension' ),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'step'      => 1,
                    'default'   => 20,
                    'condition' => ['title' => 'yes'],
                ]
            );
            $this->add_control(
                'excerpt',
                [
                    'label'          => esc_html__( 'Excerpt', 'datanext-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'datanext-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'datanext-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'excerpt_length',
                [
                    'label'     => __( 'Excerpt Length', 'datanext-extension' ),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'step'      => 1,
                    'default'   => 22,
                    'condition' => ['excerpt' => 'yes'],
                ]
            );
            $this->add_control(
                'comment',
                [
                    'label'          => esc_html__( 'Comment', 'datanext-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'datanext-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'datanext-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'post_view',
                [
                    'label'          => esc_html__( 'Post View', 'datanext-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'Show', 'datanext-extension' ),
                    'label_off'      => esc_html__( 'Hide', 'datanext-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'post_box_style',
                [
                    'label' => esc_html__( 'Post Box Style', 'datanext-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_responsive_control(
                'left_img_height',
                [
                    'label'      => esc_html__( 'Left Image Height', 'datanext-extension' ),
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
                        '{{WRAPPER}} .post-list-wrap .post-list-top .post-list-img img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'post_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'datanext-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .post-list-wrap .post-list-top .post-list-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'post_style',
                [
                    'label' => esc_html__( 'Post Style', 'datanext-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                '_post_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Title', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );  
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'post_list_title_typography',
                    'label'     => esc_html__( 'Post Typography', 'datanext-extension' ),
                    'selector'  => '{{WRAPPER}} .post-list-wrap .post-list-top .post-list-info h4',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-list-wrap .post-list-top .post-list-info h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_post_excerpt_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Excerpt Style', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );  
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'post_excerpt_typography',
                    'label'     => esc_html__( 'Post Excerpt Typography', 'datanext-extension' ),
                    'selector'  => '{{WRAPPER}} .post-list-wrap .post-list-item .post-list-bottom',
                ]
            );
            $this->add_control(
                'post_excerpt_color',
                [
                    'label'     => esc_html__( 'Excerpt Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-list-wrap .post-list-item .post-list-bottom' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_post_authore_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Authore Style', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );  
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'post_authore_typography',
                    'label'     => esc_html__( 'Post Authore Typography', 'datanext-extension' ),
                    'selector'  => '{{WRAPPER}} .post-list-bottom .post-auth',
                ]
            );
            $this->add_control(
                'post_autohre_color',
                [
                    'label'     => esc_html__( 'Authore Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-list-bottom .post-auth' => 'color: {{VALUE}}',
                    ],
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
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'post_cate_typography',
                    'label'     => esc_html__( 'Post Authore Typography', 'datanext-extension' ),
                    'selector'  => '{{WRAPPER}} .post-list-info .post-cat a',
                ]
            );
            $this->add_control(
                'post_cate_color',
                [
                    'label'     => esc_html__( 'Post Category Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-list-info .post-cat a' => 'color: {{VALUE}}',
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
            if( ! empty($item['post_categories'] ) ){
                $args['category_name'] = implode(',', $item['post_categories']);
            }
            // if("yes" == $item['skip_post']){
            //     $args['offset'] = $item['skip_post_count'];
            // }
            $query = new WP_Query( $args );
        ?>
        <div class="post-list-wrap">
            <?php
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();?>  
                <div class="post-list-item">
                    <div class="post-list-top d-flex">
                        <div class="post-list-info">                                
                            <div class="post-cat">                                
                                <?php papermag_category_name();?>
                            </div>
                            <h4 class="hover-title"><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h4>
                        </div>
                        <div class="post-list-img post-common-img-style">
                            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
                        </div>
                    </div>
                    <div class="post-list-bottom">
                        <?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?>
                        <div class="post-meta-info common-style-meta d-flex">

                        <div class="post-auth">
                        <i class="fal fa-user"></i> <?php the_author()?>
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
                    </div>
                </div>
            <?php } wp_reset_query(); } ?>
        </div>
        <?php
            }
        }
