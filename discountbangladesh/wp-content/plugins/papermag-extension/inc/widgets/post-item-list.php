<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class exodus__item_post_tab extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus_item_posttab';
        }

        public function get_title() {
            return esc_html__( 'Post Item List', 'datanext-extension' );
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
                    'default' => 1,
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
            $this->end_controls_section();

            $this->start_controls_section(
                'post_box_style',
                [
                    'label' => esc_html__( 'Post Box Style', 'datanext-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
            $this->add_responsive_control(
                'top_post_img_height',
                [
                    'label'      => esc_html__( 'Post Top Image Height', 'datanext-extension' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'max'  => 1000,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .post-colum-item.post-item-lst.post-colum-two .post-grid-thumb img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'post_btm_thumb_img',
                [
                    'label'      => esc_html__( 'Bottom Image Height', 'datanext-extension' ),
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
                        '{{WRAPPER}} .post-list-slm .post-list-img.post-common-img-style img' => 'height: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .post-colum-item.post-item-lst.post-colum-two .post-grid-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'post_sm_border_radious',
                [
                    'label'      => esc_html__( 'Thumb Border Radius', 'datanext-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .post-list-slm .post-list-img.post-common-img-style img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '_post_top_grid_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Top Grid Style', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'title_typography',
                    'label'     => esc_html__( 'Typography', 'datanext-extension' ),
                    'selector'  => '{{WRAPPER}} .post-colum-item.post-item-lst.post-colum-two h4',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-colum-item.post-item-lst.post-colum-two h4 a' => 'color: {{VALUE}}',
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
                    'name'      => 'exc_typography',
                    'label'     => esc_html__( 'Typography', 'datanext-extension' ),
                    'selector'  => '{{WRAPPER}} .post-colum-item.post-item-lst.post-colum-two',
                ]
            );
            $this->add_control(
                'exc_color',
                [
                    'label'     => esc_html__( 'Excerpt Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-colum-item.post-item-lst.post-colum-two' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_post_autho_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Authore Style', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'auth_typography',
                    'label'     => esc_html__( 'Typography', 'datanext-extension' ),
                    'selector'  => '{{WRAPPER}} .post-colum-two .post-content-col-grid .post__auth',
                ]
            );
            $this->add_control(
                'auth_color',
                [
                    'label'     => esc_html__( 'Authore Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-colum-two .post-content-col-grid .post__auth' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_post_thumb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post List Style', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'sm_list_title_typography',
                    'label'     => esc_html__( 'List Post Typography', 'datanext-extension' ),
                    'selector'  => '{{WRAPPER}} .post-list-slm .post-list-item h5',
                ]
            );
            $this->add_control(
                'list_title_color',
                [
                    'label'     => esc_html__( 'Small Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-list-slm .post-list-item h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $post_count         = count($settings['exodus_tabs']);
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
                    <?php if(0 == $query->current_post):?>
                   <div class="post-colum-item post-item-lst post-colum-two papermag-common-hover">
                        <div class="post-grid-thumb">
                            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
                        </div>
                        <div class="post-content-col-grid">
                            <a class="post__auth" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>">
                                <i class="fal fa-user"></i>   
                                <?php the_author()?>        
                            </a> 
                            <h4 class="hover-title"><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h4>
                            <?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], '')  ;?>
                        </div> 
                    </div>
                   <?php else:?>
                    <?php if ( 1 ==  $query->current_post ): ?>
                   		<div class="post-list-slm">
                        <?php endif;?>
                            <div class="post-list-item">
			                    <div class="post-list-top d-flex">
			                        <div class="post-list-info"> 
			                            <h5 class="hover-title"><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h5>
			                        </div>
			                        <div class="post-list-img post-common-img-style">
			                            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
			                        </div>
			                    </div>
			                    </div>
                        <?php if (($query->current_post + 1) == ($query->post_count)):?>
			             </div>
                    <?php endif; endif;?>
                <?php } wp_reset_query(); } ?>                          
       
        <?php
            }
        }
