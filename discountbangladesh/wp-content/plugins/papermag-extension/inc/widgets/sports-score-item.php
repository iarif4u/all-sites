<?php

    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class papermag_sports_score extends \Elementor\Widget_Base {

        public function get_name() {
            return 'papermag_sports_score';
        }

        public function get_title() {
            return esc_html__( 'Sports Score Result', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-post-list';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'socre_opt',
                [
                    'label' => esc_html__( 'Match Result', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'logo_1',
                [
                    'label'     => __( 'Team Logo 1', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'logo_2',
                [
                    'label'     => __( 'Team Logo 2', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'scores_loop',
                [
                    'label'       => __( 'Add Slide', 'papermag-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
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
                'post_img_height',
                [
                    'label'      => esc_html__( 'Image Height', 'papermag-extension' ),
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
                        '{{WRAPPER}} .post-list-thumb-one img' => 'height: {{SIZE}}{{UNIT}}!important;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'item_bottom_space',
                [
                    'label'      => esc_html__( 'Item Bottom Space', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'default'    => [
                        'size' => '550',
                    ],
                    'range'      => [
                        'px' => [
                            'min'  => 5,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .post-list-item-one:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                    'label'     => esc_html__( 'Post Title', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'title_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .post-list-content-one h4',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'papermag-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-list-content-one h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                '_post_meta_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Meta', 'papermag-extension' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'meta_typography',
                    'label'     => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector'  => '{{WRAPPER}} .post-list-content-one .post-meta-info div',
                ]
            );
            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $scores_loop = $settings['scores_loop'];
        ?>
            <div class="pmg-sport-score-wraper owl-carousel">
                <?php foreach($scores_loop as $item):?>
                <div class="pgm-sport-score-item d-flex align-items-center justify-content-between">
                    <div class="pmg-item-logo">
                        <img src="<?php echo esc_url($item['logo_1']['url']);?>" alt="<?php echo esc_attr($item['logo_1']['alt']);?>">
                    </div>
                    <div class="pmg-item-score">
                        <span>Apr 28, 2020</span>
                        <h1>0 - 2</h1>
                    </div>
                    <div class="pmg-item-logo">
                        <img src="<?php echo esc_url($item['logo_2']['url']);?>" alt="<?php echo esc_attr($item['logo_2']['alt']);?>">
                    </div>
                </div>
                <?php endforeach;?>
            </div>
       
        <?php
        }
}
