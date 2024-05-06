<?php

    class exodus_section_heading extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus-heading';
        }

        public function get_title() {
            return __( 'Papermag Section Title', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-heading';
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
                'style',
                [
                    'label' => esc_html__( 'Style', 'papermag-extension' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'  => esc_html__( 'One', 'papermag-extension' ),
                        '2' => esc_html__( 'Two', 'papermag-extension' ),
                    ],
                ]
            );
            $this->add_control(
                'icon',
                [
                    'label'   => __( 'Type Icon Name Font Awesome 5 Pro', 'text-domain' ),
                    'type'    => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => esc_html__( 'fal fa-galaxy', 'papermag-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'post_sub_heading', [
                    'label'       => esc_html__( 'Sub Heading', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'post_heading', [
                    'label'       => esc_html__( 'Heading', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
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
                    'selector'       => '{{WRAPPER}} .section-heading h4',
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
                        '{{WRAPPER}} .section-heading h4' => 'color: {{VALUE}} ',
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
                    'selector'       => '{{WRAPPER}} .section-heading span',
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
                        '{{WRAPPER}} .section-heading span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            

            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();
            $post_sub_heading    = $settings['post_sub_heading'];
            $post_heading  = $settings['post_heading'];
            $style  = $settings['style'];

        ?>
        <?php if("1" == $style):?>
        <div class="section-heading">
            <span><?php echo esc_html($post_sub_heading);?></span>
            <h4><?php echo esc_html($post_heading);?></h4>
            <i class="<?php echo esc_attr($settings['icon']);?>"></i>
        </div>
        <?php else:?>
            <div class="section-heading style-two">
                <h4><?php echo esc_html($post_heading);?></h4>
            </div>
        <?php endif;?>
      <?php

              }

      }
