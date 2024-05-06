<?php

    class exodus_breadcrumb extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus-breadcrumb';
        }

        public function get_title() {
            return __( 'Exodus Breadcrumb', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-banner';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'breadcrumb_settings',
                [
                    'label' => __( 'Breadcrumb Options', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'page_title',
                [
                    'label'          => esc_html__( 'Page Title/Custom Title', 'papermag-extension' ),
                    'type'           => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'       => esc_html__( 'YES', 'papermag-extension' ),
                    'label_off'      => esc_html__( 'NO', 'papermag-extension' ),
                    'return_value'   => 'yes',
                    'default'        => 'yes',
                    'style_transfer' => true,
                ]
            );
            $this->add_control(
                'custom_title', [
                    'label'       => esc_html__( 'Custom Title', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'default'     => esc_html__( 'Page Custom Title', 'papermag-extension' ),
                    'condition' => ['page_title' => 'yes'],
                ]
            );

            $this->add_control(
                'br_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .papermag-breadcrumb-area h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-breadcrumb-area h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'br_navigation_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Navigation Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'navtitle_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .papermag-breadcrumb-area span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'navtitle_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-breadcrumb-area span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'br_section_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section BG Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_bg_color',
                [
                    'label'     => esc_html__( 'Breadcrumb BG Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-breadcrumb-area' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();
            $page_title    = $settings['page_title'];
            $custom_title    = $settings['custom_title'];

        ?>
        <div class="papermag-breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h4><?php if('yes' == $page_title){echo esc_html($custom_title);}else{the_title();}?></h4>
                    </div>
                    <?php if(function_exists('bcn_display')):?>
                    <div class="col-lg-6 col-md-6 text-right">
                        <?php bcn_display();?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>  
      <?php

              }

      }
