<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class exodus_post_tab extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodusposttab';
        }

        public function get_title() {
            return esc_html__( 'Post Tab', 'datanext-extension' );
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
                'post_tab_item',
                [
                    'label' => esc_html__( 'Post Tab Item', 'datanext-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'active_tab',
                [
                    'label' => __( 'Active Item', 'datanext-extension' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'datanext-extension' ),
                    'label_off' => __( 'Hide', 'datanext-extension' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $repeater->add_control(
                'tab_title', [
                    'label'       => esc_html__( 'Title', 'datanext-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => esc_html__( 'exodus Tab Title', 'datanext-extension' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'post_categories',
                [
                    'type'        => \Elementor\Controls_Manager::SELECT2,
                    'label'       => esc_html__( 'Select Categories', 'datanext-extension' ),
                    'options'     => papermag_post_category(),
                    'label_block' => true,
                    'multiple'    => true,
                ]
            );
                     

            $repeater->add_control(
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
            $repeater->add_control(
                'skip_post_count',
                [
                    'label'   => __( 'Skip Post Count', 'datanext-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'default' => 0,
                    'condition' => ['skip_post' => 'yes'],
                ]
            );
            $this->add_control(
                'exodus_tabs',
                [
                    'label'       => __( 'Add Slide', 'datanext-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ tab_title }}}',
                ]
            );
            
            $this->end_controls_section();
            

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
                    'label'      => esc_html__( 'Right Image Height', 'datanext-extension' ),
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
                    'label'      => esc_html__( 'Border Radius', 'datanext-extension' ),
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
                    'label' => esc_html__( 'Post Style', 'datanext-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'title_typography',
                    'label'     => esc_html__( 'Typography', 'datanext-extension' ),
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
                    'label'     => esc_html__( 'List Post Typography', 'datanext-extension' ),
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
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $post_count         = count($settings['exodus_tabs']);
            $post_sub_heading = $settings['post_sub_heading'];
            $post_heading = $settings['post_heading'];
        ?>
        <div class="papermag-post-tap-area">
            <div class="section-heading icon-left">
                <span><?php echo esc_html($post_sub_heading);?></span>
                <h4><?php echo esc_html($post_heading);?></h4>
                <i class="fal fa-id-card"></i>
            </div>
        
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
                   <div class="post-grid-item-two post-grid-tb papermag-common-hover">
                        <?php if(has_post_thumbnail()):?>
                        <div class="post-grid-thumb">
                            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
                        </div>
                        <?php endif;?>
                        <div class="post-grid-content">
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
                            <h3 class="hover-title"><a href="<?php the_permalink()?>"><?php the_title();?></a></h3>
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
                   </div> 
                   <?php else:?>
                    <?php if ( 1 ==  $query->current_post ): ?>
                   <div class="col-lg-6">
                        <?php endif;?>
                            <div class="post-grid-item-two post-list-two-lg papermag-common-hover">
                            <?php if(has_post_thumbnail()):?>
                            <div class="post-grid-thumb">
                                <a href="<?php the_permalink();?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute();?>"></a>
                            </div>
                            <?php endif;?>
                            <div class="post-grid-content">
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
                                <h4 class="hover-title"><a href="<?php the_permalink()?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], '')?></a></h4>
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
