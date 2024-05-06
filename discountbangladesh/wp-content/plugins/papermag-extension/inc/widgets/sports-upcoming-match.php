<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class exodus_match_tab extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus_match_tab';
        }

        public function get_title() {
            return esc_html__( 'Match Date Tab', 'datanext-extension' );
        }

        public function get_icon() {
            return 'eicon-posts-group';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'post_date_tab_item',
                [
                    'label' => esc_html__( 'Match Date Tab', 'datanext-extension' ),
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
                'tab_title',
                [
                    'label'        => esc_html__( 'Post Sub Heading', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'logo1',
                [
                    'label'        => esc_html__( 'Logo 1', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'logo2',
                [
                    'label'        => esc_html__( 'Logo 2', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'vs_text',
                [
                    'label'        => esc_html__( 'Vs Text', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'content_title',
                [
                    'label'        => esc_html__( 'Content Title', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'content_text',
                [
                    'label'        => esc_html__( 'Content Text', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'matchtabs',
                [
                    'label'       => __( 'Add Slide', 'datanext-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ tab_title }}}',
                ]
            );
            $this->end_controls_section();
            
            $this->start_controls_section(
                'match_date_style',
                [
                    'label' => esc_html__( 'Tab Style', 'datanext-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                '_tab_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Tab Heading Title', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'tab_headfing_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .papermag-post-match .nav-pills .nav-link',
                ]
            );
            $this->add_control(
                'tab_item_color',
                [
                    'label'     => esc_html__( 'Tab Item Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post-match .nav-pills .nav-link' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_item_bg_color',
                [
                    'label'     => esc_html__( 'Tab Item BG Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post-match .nav-pills .nav-link' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_item_active_color',
                [
                    'label'     => esc_html__( 'Tab Item Active Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post-match .nav-pills .nav-link.active' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_item_bg_active_color',
                [
                    'label'     => esc_html__( 'Tab Item BG Active Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-post-match .nav-pills .nav-link.active' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'papermag-extension' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .papermag-post-match .nav-pills .nav-link.active',
                ]
            );
           
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
        ?>
        <div class="papermag-post-match">        
            <ul class="papermag-tabs-match nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php $tabId = 1; foreach($settings['matchtabs'] as $tab_link_key=>$item): $tabId++;?>
                <li class="nav-item" role="presentation">
                    <a   class="nav-link <?php if("yes" == $item['active_tab']){echo esc_attr('active');}?>" id="pmg-post-tab-<?php echo esc_attr($tabId);?>" data-toggle="pill" href="#pmg-post_content-tab-<?php echo esc_attr($tabId);?>" type="button" role="tab" aria-controls="#pmg-post_content-tab-<?php echo esc_attr($tabId);?>" aria-selected="true"><?php echo esc_html($item['tab_title']);?></a>
                </li>
                <?php endforeach;?>
            </ul>
            <div class="tab-content" id="pills-tabContent">

            <?php $tabId = 1; foreach($settings['matchtabs'] as $tab_content_key=>$item): $tabId++;?>
            <div role="tabpanel" class="tab-pane fade <?php if("yes" == $item['active_tab']){echo esc_attr('show active');}?>" id="pmg-post_content-tab-<?php echo esc_attr($tabId);?>" role="tabpanel" aria-labelledby="pmg-post-tab-<?php echo esc_attr($tabId);?>">
                <div class="pmg-match-logo-wrap d-flex justify-content-between align-items-center">
                    <div class="logo-item">
                        <img src="<?php echo esc_url($item['logo1']['url']);?>" alt="">
                    </div>
                    <div class="logo-item">
                        <span><?php echo esc_html($item['vs_text']);?></span>
                    </div>
                    <div class="logo-item">
                        <img src="<?php echo esc_url($item['logo2']['url']);?>" alt="">
                    </div>
                </div> 
                <div class="match-date-info text-center">
                    <h4><?php echo esc_html($item['content_title']);?></h4>
                    <p><?php echo __($item['content_text']);?></p>
                </div>       
            </div>                
            <?php endforeach;?>
            </div>
        </div>                            
       
        <?php
            }
        }
