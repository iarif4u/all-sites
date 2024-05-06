<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class ppm_post_sports_tabs extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ppmsports_tab';
        }

        public function get_title() {
            return esc_html__( 'Post Sports Tab', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-posts-group';
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
                'post_heading',
                [
                    'label'        => esc_html__( 'Post Heading', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'post_tab_item',
                [
                    'label' => esc_html__( 'Post Tab Item', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'pst_per_page',
                [
                    'label'   => __( 'How Many Post Display?', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'min'     => 1,
                    'default' => 1,
                ]
            );
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
                'left_img_height',
                [
                    'label'      => esc_html__( 'Left Image Height', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'default'    => [
                        'size' => '410',
                    ],
                    'range'      => [
                        'px' => [
                            'min'  => 5,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .post-grid-item-two.post-grid-tb .post-grid-thumb img' => 'height: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .post-grid-item-two.post-list-two-lg .post-grid-thumb img' => 'height: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .post-tabs-item-wrapp .post-grid-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'selector'  => '{{WRAPPER}} .post-grid-item-two.post-grid-tb h3',
                ]
            );
            $this->add_control(
                'title_typography_color',
                [
                    'label'     => esc_html__( 'Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-grid-item-two.post-grid-tb h3 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'sm_list_title_typography',
                    'label'     => esc_html__( 'List Post Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .post-grid-item-two.post-list-two-lg h4',
                ]
            );
            $this->add_control(
                'sm_list_title_color',
                [
                    'label'     => esc_html__( 'Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-grid-item-two.post-list-two-lg h4 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'post_tab_style',
                [
                    'label' => esc_html__( 'Post Tab Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'tab_item_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .papermag-post-spost-tap-area ul.papermag-tabs-sports li a',
                ]
            );
            $this->add_control(
                'tab_titem_color',
                [
                    'label'     => esc_html__( 'Item Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post-spost-tap-area ul.papermag-tabs-sports li a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'tab_titem_act_color',
                [
                    'label'     => esc_html__( 'Item Active Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post-spost-tap-area ul.papermag-tabs-sports li a.active' => 'color: {{VALUE}} ',
                    ],
                ]
            );
           
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $post_count         = count($settings['exodus_tabs']);
            $post_heading = $settings['post_heading'];
        ?>
        <div class="papermag-post-spost-tap-area">
            <div class="section-heading-sports">
                <h4><?php echo esc_html($post_heading);?></h4>
            </div>
        
        <ul class="papermag-tabs-sports nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php $tabId = 1; foreach($settings['exodus_tabs'] as $tab_link_key=>$item): $tabId++;?>
            <li class="nav-item" role="presentation">
                <a   class="nav-link <?php if("yes" == $item['active_tab']){echo esc_attr('active');}?>" id="taffee-post-tab-<?php echo esc_attr($tabId);?>" data-toggle="pill" href="#taffee-post_content-tab-<?php echo esc_attr($tabId);?>" type="button" role="tab" aria-controls="#taffee-post_content-tab-<?php echo esc_attr($tabId);?>" aria-selected="true"><?php echo esc_html($item['tab_title']);?></a>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="tab-content sports-tab-content" id="pills-tabContent">

        <?php $tabId = 1; foreach($settings['exodus_tabs'] as $tab_content_key=>$item): $tabId++;?>
        <div role="tabpanel" class="tab-pane fade <?php if("yes" == $item['active_tab']){echo esc_attr('show active');}?>" id="taffee-post_content-tab-<?php echo esc_attr($tabId);?>" role="tabpanel" aria-labelledby="taffee-post-tab-<?php echo esc_attr($tabId);?>">
        <?php
        $args = array(
                'post_type'           => 'post',
                'posts_per_page'      => !empty( $item['pst_per_page'] ) ? $item['pst_per_page'] : 1,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
                'order'               => $settings['postorder'],
                'orderby'             => $settings['postorderby'],
            );
            if( ! empty($item['post_categories'] ) ){
                $args['category_name'] = implode(',', $item['post_categories']);
            }
            if("yes" == $item['skip_post']){
                $args['offset'] = $item['skip_post_count'];
            }
            $query = new WP_Query( $args );
        ?>
        <div class="post-tabs-item-wrapp">
            <div class="row">
                <?php
                if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();?>
                    <?php if(0 == $query->current_post):?>
                   <div class="col-lg-6">
                   <div class="post-item-sport-tb papermag-common-hover">
                        <?php if(has_post_thumbnail()):?>
                        <div class="post-grid-thumb">
                            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
                        </div>
                        <?php endif;?>
                        <div class="post-grid-content">
                            <div class="post-meta-info d-flex align-items-center">
                                <div class="post-cat">                                
                                    <?php papermag_category_name();?>
                                </div>
                                <img src="" alt="">
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
                            <h3 class="hover-title"><a href="<?php the_permalink()?>"><?php the_title();?></a></h3>
                                <div class="auth-info-date">          

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
                        </div>
                    </div> 
                   </div> 
                   <?php else:?>
                    <?php if ( 1 ==  $query->current_post ): ?>
                   <div class="col-lg-6">
                        <?php endif;?>
                            <div class="post-grid-item-sports d-flex">
                            <?php if(has_post_thumbnail()):?>
                            <div class="post-grid-thumb">
                                <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
                            </div>
                            <?php endif;?>
                            <div class="post-grid-sports-content">
                                <h4 class="hover-title"><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h4>
                                <span><i class="fal fa-calendar-alt"></i> <?php the_time('d F Y')?></span>
                            </div>
                        </div> 
                        <?php if (($query->current_post + 1) == ($query->post_count)):?>
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
