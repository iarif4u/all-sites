<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    class pmg_cat_list extends \Elementor\Widget_Base {

        public function get_name() {
            return 'papermag-cat-list';
        }

        public function get_title() {
            return esc_html__( 'Category List', 'papermag-extension' );
        }

        public function get_icon() {
            return 'eicon-post-list';
        }

        public function get_categories() {
            return ['papermag-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'taff__cate_options',
                [
                    'label' => esc_html__( 'Category Options', 'papermag-extension' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'hideempty',
                [
                    'label'        => esc_html__( 'Hide Empty', 'papermag-extension' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default'      => 'no',
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
                'cateorder',
                [
                    'label'     => esc_html__( 'Category Order', 'papermag-extension' ),
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
                'catehow',
                [
                    'label'   => __( 'How many Category You Want to show?', 'papermag-extension' ),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'default' => 5,
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
                'btn_one_top_space',
                [
                    'label'      => esc_html__( 'Top Space', 'papermag-extension' ),
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
                        '{{WRAPPER}} .papermag-extension-post_image' => 'min-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_badding',
                [
                    'label'      => esc_html__( 'Padding', 'papermag-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .papermag-extension-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .papermag-extension-post_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'name'     => 'title_typography',
                    'label'    => esc_html__( 'Typography', 'papermag-extension' ),
                    'selector' => '{{WRAPPER}} .taffes-post-title',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'sm_list_title_typography',
                    'label'    => esc_html__( 'List Post Typography', 'papermag-extension' ),
                    'selector' => '{{WRAPPER}} .tf__theme_list__item .taffes-post-title',
                ]
            );
            $this->end_controls_section();
        }

        protected function render() {
            $settings   = $this->get_settings_for_display();
            $categorys  = "category";
            $cate_lists = get_terms( $categorys, [
                'orderby'    => 'slug',
                'number'     => $settings['catehow'],
                'order'      => $settings['cateorder'],
                'hide_empty' => 'yes' === $settings['hideempty'] ? false : true,
            ] );

        ?>
<?php if ( !empty( $cate_lists ) && !is_wp_error( $cate_lists ) ): ?>
    <div class="papermag-extension-cast-wrap">
        <ul class="papermag-extension__cat_nav">
            <?php
                foreach ( $cate_lists as $cate ):

                    if(get_term_meta($cate->term_id, 'papermag_cate_meta', true)) {
                        $cate_meta = get_term_meta($cate->term_id, 'papermag_cate_meta', true);
                    } else {
                        $cate_meta = array();
                    }
                ?>
	            <li><a style="background-image:url(<?php echo esc_url($cate_meta['cate_img_upload']['url']);?>)"  href="<?php echo esc_url( get_term_link( $cate->term_id ) ) ?>"><?php echo esc_html( $cate->name ) ?> <span class="cat-count"><?php echo esc_attr( $cate->count ) ?></span></a> </li>
	            <?php endforeach;?>
        </ul>
    </div>
    <?php endif;?>
<?php
    }
}
