<?php

    class exodus_team extends \Elementor\Widget_Base {

        public function get_name() {
            return 'exodus-team-id';
        }

        public function get_title() {
            return esc_html__( 'Exodus Team', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-lock-user';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'team',
                [
                    'label' => esc_html__( 'Team', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'team_img',
                [
                    'label' => esc_html__( 'Team Image', 'papermag-extension' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'position', [
                    'label'       => esc_html__( 'Position', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'team_name', [
                    'label'       => esc_html__( 'Name', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'List Icon', 'papermag-extension' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            );
            $repeater->add_control(
                'icon_link', [
                    'label'       => esc_html__( 'Icon Link', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'social_icon',
                [
                    'label'       => __( 'Add Slide', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
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
            $team_img    = $settings['team_img']['url'];
            $position    = $settings['position'];
            $team_name   = $settings['team_name'];
            $social_icon   = $settings['social_icon'];

        ?>
        <div class="ex-team-box">
            <div class="ex-team-img">
                <img src="<?php echo esc_url($team_img);?>" alt=<?php echo esc_html($team_name);?>">
                <div class="social-link">
                    <?php foreach($social_icon as $icon):?>
                    <a href="<?php echo esc_url($icon['icon_link']['url']);?>"><?php \Elementor\Icons_Manager::render_icon( $icon['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="ex-team-content">
                <span><?php echo esc_html($position);?></span>
                <h3><?php echo esc_html($team_name);?></h3>
            </div>
        </div>
      <?php

              }

      }
