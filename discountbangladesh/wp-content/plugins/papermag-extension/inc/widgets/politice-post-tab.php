<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class exodus_post_politices_tab extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodusposttab_politics';
        }

        public function get_title() {
            return esc_html__( 'Politics Post Tab', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-posts-group';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'post_tab_item',
                [
                    'label' => esc_html__( 'Post Tab Item', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'active_tab',
                [
                    'label' => __( 'Active Item', 'papermag-extension' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'papermag-extension' ),
                    'label_off' => __( 'Hide', 'papermag-extension' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $repeater->add_control(
                'tab_title', [
                    'label'       => esc_html__( 'Title', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => esc_html__( 'exodus Tab Title', 'papermag-extension' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'postcustomorder',
                [
                    'label'        => esc_html__( 'Custom Order', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default'      => 'no',
                ]
            );
            $repeater->add_control(
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
            $repeater->add_control(
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
            $repeater->add_control(
                'post_categories',
                [
                    'type'        => \Elementor\Controls_Manager::SELECT2,
                    'label'       => esc_html__( 'Select Categories', 'papermag-extension' ),
                    'options'     => papermag_post_category(),
                    'label_block' => true,
                    'multiple'    => true,
                ]
            );
            $repeater->add_control(
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
            $repeater->add_control(
                'skip_post_count',
                [
                    'label'   => __( 'Skip Post Count', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'default' => 0,
                    'condition' => ['skip_post' => 'yes'],
                ]
            );
            $this->add_control(
                'exodus_tabs',
                [
                    'label'       => __( 'Add Slide', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ tab_title }}}',
                ]
            );
            

            $this->end_controls_section();
            $this->start_controls_section(
                'section_title',
                [
                    'label' => esc_html__( 'Section Heading', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'exodus_title', [
                    'label'       => esc_html__( 'Title', 'kit-unlimited' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => esc_html__( 'exodus Section Heading', 'kit-unlimited' ),
                    'label_block' => true,
                ]
            );
            $this->add_responsive_control(
                'title_bottom_space',
                [
                    'label'      => __( 'Bottom Space', 'kit-unlimited' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => -500,
                            'max' => 500,
                        ]
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .post-section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'headingtitle_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .post-section-title',
                ]
            );
            $this->add_control(
                'heading_color',
                [
                    'label'     => esc_html__( 'Color', 'kit-unlimited' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-section-title' => 'color: {{VALUE}}',
                    ],
                    'default'   => '#1c1e23',
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
                'title_length',
                [
                    'label'     => __( 'Title Length', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'step'      => 1,
                    'default'   => 20,
                ]
            );
            $this->add_control(
                'title_grid_length',
                [
                    'label'     => __( 'Grid Title Length', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'step'      => 1,
                    'default'   => 20,
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
                    'label'      => esc_html__( 'Left Image Height', 'papermag-extension' ),
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
                        '{{WRAPPER}} .papermag-post_image' => 'min-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'right_img_height',
                [
                    'label'      => esc_html__( 'Right Image Height', 'papermag-extension' ),
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
                        '{{WRAPPER}} .post-colum-item.post-colum-two .post-grid-thumb img' => 'min-height: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .post-overlay-tab-itm .papermag-post_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'post_grid_border_radious',
                [
                    'label'      => esc_html__( 'Post Grid Radius', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .post-colum-item.post-colum-two .post-grid-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label'     => esc_html__( 'Post Title', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'title_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .post-overlay-tab-itm .post-tab-info-content h3',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-overlay-tab-itm .post-tab-info-content h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_grid_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Grid Title', 'kit-unlimited' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'grid_title_typography',
                    'label'     => esc_html__( 'Grid Post Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .post-colum-two.post-tab-col .post-content-col-grid h4',
                ]
            );
            $this->add_control(
                'grid_title_color',
                [
                    'label'     => esc_html__( 'Grid Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-colum-two.post-tab-col .post-content-col-grid h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $post_count         = count($settings['exodus_tabs']);
        ?>
        <div class="papermag-post-tap-area post-politic-tab">
            <h4 class="post-section-title"><?php echo esc_html($settings['exodus_title']);?></h4>
        
        <ul class="papermag-tabs nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php $tabId = 1; foreach($settings['exodus_tabs'] as $tab_link_key=>$item): $tabId++;?>
            <li class="nav-item" role="presentation">
                <a   class="nav-link <?php if("yes" == $item['active_tab']){echo esc_attr('active');}?>" id="taffee-post-tab-<?php echo esc_attr($tabId);?>" data-toggle="pill" href="#taffee-post_content-tab-<?php echo esc_attr($tabId);?>" type="button" role="tab" aria-controls="#taffee-post_content-tab-<?php echo esc_attr($tabId);?>" aria-selected="true"><?php echo esc_html($item['tab_title']);?></a>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="tab-content" id="pills-tabContent">

        <?php $tabId = 1; foreach($settings['exodus_tabs'] as $tab_content_key=>$item): $tabId++;?>
        <div role="tabpanel" class="tab-pane fade <?php if("yes" == $item['active_tab']){echo esc_attr('show active');}?>" id="taffee-post_content-tab-<?php echo esc_attr($tabId);?>" role="tabpanel" aria-labelledby="taffee-post-tab-<?php echo esc_attr($tabId);?>">
        <?php
        $args = array(
                'post_type'           => 'post',
                'posts_per_page'      => !empty( $settings['pst_per_page'] ) ? $settings['pst_per_page'] : 1,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
                'order'               => $item['postorder'],
                'orderby'             => $item['postorderby'],
            );
            if( ! empty($item['post_categories'] ) ){
                $args['category_name'] = implode(',', $item['post_categories']);
            }
            if("yes" == $item['skip_post']){
                $args['offset'] = $item['skip_post_count'];
            }
            $query = new WP_Query( $args );
        ?>
        <div class="post-tabs-politics-item-wrapp">
            <div class="row">
                <?php
                if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();?>
                    <?php if(0 == $query->current_post):?>
                   <div class="col-lg-6">
                        <div class="post-overlay-item-tab">
                            <div class="post-overlay-tab-itm">
                                <div class="papermag-post_image"  style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>)">
                                    <a class="papermag-img-link" href="<?php the_permalink();?>"></a> 
                                </div>
                                <div class="post-tab-info-content">
                                    <?php papermag_category_name();?>
                                    <h3 class="papermag-common-hover"><a href="<?php the_permalink();?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h3>
                                    <div class="post-bottom-meta d-flex justify-content-center text-left">
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
                        </div>
                   </div> 
                   <?php else:?>
                    <?php if ( 1 ==  $query->current_post ): ?>
                   <div class="col-lg-6">
                        <div class="row">
                            <?php endif;?>
                            <div class="col-lg-6 col-md-6">
                                <div class="post-colum-item post-tab-col post-colum-two papermag-common-hover">
                                    <div class="post-item-three">
                                        <div class="post-grid-thumb">
                                            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
                                        </div>
                                        <div class="post-content-col-grid">
                                            <h4><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_grid_length'], '')?></a></h4>
                                            <div class="post-meta-info common-style-meta d-flex">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (($query->current_post + 1) == ($query->post_count)):?>
                        </div>
                   </div> 
                    <?php endif; endif;?>
                <?php } wp_reset_query(); } ?>
            </div>
        </div>
            </div>
            
        <?php endforeach;?>
        </div>
        </div>                            
       
        <?php
            }
        }
