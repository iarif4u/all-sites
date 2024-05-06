<?php

    class exodus_info_box extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus-info-box';
        }

        public function get_title() {
            return esc_html__( 'Exodus Infobox', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-info-box';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'info_box',
                [
                    'label' => esc_html__( 'Info Box', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'info_icon',
                [
                    'label' => esc_html__( 'Info Image', 'papermag-extension' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'info_title', [
                    'label'       => esc_html__( 'Info Title', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'info_excerpt', [
                    'label'       => esc_html__( 'Info Excerpt', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            
            
            $this->end_controls_section();

            $this->start_controls_section(
                'info_box_style',
                [
                    'label' => esc_html__( 'Info Box Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'box_padding',
                [
                    'label' => esc_html__( 'Box Padding', 'papermag-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .ex-info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .ex-info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'box_bg',
                    'label'    => esc_html__( 'Background', 'papermag-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .ex-info-box',
                ]
            ); 
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border_box',
                    'label' => esc_html__( 'Border', 'papermag-extension' ),
                    'selector' => '{{WRAPPER}} .ex-info-box',
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'info__style',
                [
                    'label' => esc_html__( 'Info Content Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'info_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'info_title_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .ex-info-content h3',
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
                        '{{WRAPPER}} .ex-info-content h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'excerpt_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Excerpt Style', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => '_excerpt_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .ex-info-content p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'excerpt_color',
                [
                    'label'     => esc_html__( 'Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ex-info-content p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();
            $info_icon    = $settings['info_icon']['url'];
            $info_title    = $settings['info_title'];
            $info_excerpt    = $settings['info_excerpt'];

        ?>
        <div class="ex-info-box text-center">
            <div class="ex-info-icon">
                <img src="<?php echo esc_url($info_icon);?>" alt=<?php echo esc_html($info_title);?>">
            </div>
            <div class="ex-info-content">
                <h3><?php echo esc_html($info_title);?></h3>
                <p><?php echo __($info_excerpt);?></p>
            </div>
        </div>
      <?php

        }

      }
