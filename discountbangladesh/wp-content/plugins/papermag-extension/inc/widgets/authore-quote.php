<?php

    class exodus_auth_info extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus_authore_img';
        }

        public function get_title() {
            return __( 'Authore Quote', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-call-to-action';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'cta_content',
                [
                    'label' => __( 'CTA Content', 'papermag-extension' ),
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
            $this->add_control(
                'quote_title', [
                    'label'       => esc_html__( 'Quates', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'authore_name', [
                    'label'       => esc_html__( 'Authore Name', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
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
    
            $this->end_controls_section();
            $this->start_controls_section(
                'authore_info_style',
                [
                    'label' => esc_html__( 'Authore Info Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'authore_quote',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Quote Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'quote_color',
                [
                    'label'     => esc_html__( 'Quote Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .papermag-authore-quote .quote-info h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'quote_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .papermag-authore-quote .quote-info h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_authore_name_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Authore Name Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'authore_nm_color',
                [
                    'label'     => esc_html__( 'Authore Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}}  .papermag-authore-quote .quote-info span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'authore_nm_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .papermag-authore-quote .quote-info span',
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
            $quote_title    = $settings['quote_title'];
            $authore_name   = $settings['authore_name'];

        ?>
            <div class="papermag-authore-quote">
                <div class="quote-info">
                    <h4><?php echo esc_html($quote_title);?></h4>
                    <span><?php echo esc_html($authore_name);?></span>
                </div>
                <div class="quote-auth-img">
                    <img src="<?php echo esc_url($authore_img);?>" alt="<?php echo esc_attr($authore_name);?>">
                </div>
            </div>
      <?php

              }

      }