<?php

    class exodus_contact_info_widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus-contact-widget';
        }

        public function get_title() {
            return __( 'Exodus Contact Info Widget', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-editor-list-ul';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'section_title_section',
                [
                    'label' => __( 'Section Title', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'heading', [
                    'label'       => esc_html__( 'Widget Heading', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'List Icon', 'datanext-extension' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            );
            $repeater->add_control(
                'contact_info', [
                    'label'       => esc_html__( 'Contact Info', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'contact_infos',
                [
                    'label'       => __( 'Add Item', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ contact_info }}}',
                ]
            );
            
            
            $this->end_controls_section();

            $this->start_controls_section(
                'sectitle_style',
                [
                    'label' => esc_html__( 'Section Title Style', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_responsive_control(
                'bottom_spacing',
                [
                    'label'      => esc_html__( 'Bottom Space', 'kit-unlimited' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'sec_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .section-title h2',
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
                        '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'sub_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => '_subtitle_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .section-title span.span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'title_sub_color',
                [
                    'label'     => esc_html__( 'Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title span.span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'title_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => '_text_typography',
                    'label'          => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'       => '{{WRAPPER}} .section-title p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'title_text_color',
                [
                    'label'     => esc_html__( 'Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title p' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();
            $heading    = $settings['heading'];
            $contact_infos    = $settings['contact_infos'];

        ?>
        <div class="contact-info-item">
            <h5><?php echo esc_html($heading)?></h5>
            <?php foreach($contact_infos as $item):?>
            <div class="con-item-list">
                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <p><?php echo esc_html($item['contact_info'])?></p>
            </div>        
            <?php endforeach;?>    
        </div>
      <?php

              }

      }
