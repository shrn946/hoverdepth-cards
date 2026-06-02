<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Depth_Parallax_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'depth_parallax_widget';
	}

	public function get_title() {
		return esc_html__( 'HoverDepth Parallax Cards', 'depth' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_style_depends() {
		return [ 'depth-reset-2', 'depth-style' ];
	}

	public function get_script_depends() {
		return [ 'depth-script' ];
	}

	protected function register_controls() {
		$default_bg_url = plugin_dir_url( __FILE__ ) . 'images/bg1.png';
		$default_fg_url = plugin_dir_url( __FILE__ ) . 'images/image7.png';

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'depth' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cards',
			[
				'label'       => esc_html__( 'Cards', 'depth' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => [
					[
						'name'  => 'card_item_content_heading',
						'label' => esc_html__( 'Content', 'depth' ),
						'type'  => \Elementor\Controls_Manager::HEADING,
					],
					[
						'name'        => 'card_title',
						'label'       => esc_html__( 'Card Title', 'depth' ),
						'type'        => \Elementor\Controls_Manager::TEXT,
						'default'     => esc_html__( 'Card Title', 'depth' ),
						'label_block' => true,
					],
					[
						'name'        => 'card_description',
						'label'       => esc_html__( 'Short Description', 'depth' ),
						'type'        => \Elementor\Controls_Manager::TEXTAREA,
						'default'     => '',
						'placeholder' => esc_html__( 'Optional short description', 'depth' ),
						'rows'        => 3,
					],
					[
						'name'    => 'card_image',
						'label'   => esc_html__( 'Card Foreground Image', 'depth' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => $default_fg_url,
						],
					],
					[
						'name'      => 'card_item_position_heading',
						'label'     => esc_html__( 'Foreground Image Position', 'depth' ),
						'type'      => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					],
					[
						'name'      => 'card_image_x',
						'label'     => esc_html__( 'Foreground Horizontal Position', 'depth' ),
						'type'      => \Elementor\Controls_Manager::SLIDER,
						'default'   => [
							'unit' => '%',
							'size' => 50,
						],
						'size_units' => [ '%' ],
						'range'     => [
							'%' => [ 'min' => 0, 'max' => 100 ],
						],
					],
					[
						'name'      => 'card_image_y',
						'label'     => esc_html__( 'Foreground Vertical Position', 'depth' ),
						'type'      => \Elementor\Controls_Manager::SLIDER,
						'default'   => [
							'unit' => '%',
							'size' => 50,
						],
						'size_units' => [ '%' ],
						'range'     => [
							'%' => [ 'min' => 0, 'max' => 100 ],
						],
					],
					[
						'name'    => 'card_bg_image',
						'label'   => esc_html__( 'Card Background Image', 'depth' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => $default_bg_url,
						],
					],
					[
						'name'        => 'card_link',
						'label'       => esc_html__( 'Card Link', 'depth' ),
						'type'        => \Elementor\Controls_Manager::URL,
						'placeholder' => 'https://',
						'label_block' => true,
					],
				],
				'default'     => [
					[
						'card_title'    => 'Card One',
						'card_image'    => [ 'url' => $default_fg_url ],
						'card_image_x'  => [ 'unit' => '%', 'size' => 56 ],
						'card_image_y'  => [ 'unit' => '%', 'size' => 54 ],
						'card_bg_image' => [ 'url' => $default_bg_url ],
					],
					[
						'card_title'    => 'Card Two',
						'card_image'    => [ 'url' => $default_fg_url ],
						'card_image_x'  => [ 'unit' => '%', 'size' => 50 ],
						'card_image_y'  => [ 'unit' => '%', 'size' => 58 ],
						'card_bg_image' => [ 'url' => $default_bg_url ],
					],
					[
						'card_title'    => 'Card Three',
						'card_image'    => [ 'url' => $default_fg_url ],
						'card_image_x'  => [ 'unit' => '%', 'size' => 48 ],
						'card_image_y'  => [ 'unit' => '%', 'size' => 52 ],
						'card_bg_image' => [ 'url' => $default_bg_url ],
					],
				],
				'title_field' => '{{{ card_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_outer',
			[
				'label' => esc_html__( 'Outer', 'depth' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'outer_width',
			[
				'label'      => esc_html__( 'Outer Width', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 1400,
				],
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [ 'min' => 280, 'max' => 1400 ],
					'%'  => [ 'min' => 20, 'max' => 100 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .cards' => 'width: {{SIZE}}{{UNIT}}; min-width: 0;',
				],
			]
		);

		$this->add_responsive_control(
			'outer_spacing_top',
			[
				'label'      => esc_html__( 'Spacing Top', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 50,
				],
				'size_units' => [ 'px', '%', 'vh' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 400 ],
					'%'  => [ 'min' => 0, 'max' => 50 ],
					'vh' => [ 'min' => 0, 'max' => 50 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .cards' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'outer_spacing_bottom',
			[
				'label'      => esc_html__( 'Spacing Bottom', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 50,
				],
				'size_units' => [ 'px', '%', 'vh' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 400 ],
					'%'  => [ 'min' => 0, 'max' => 50 ],
					'vh' => [ 'min' => 0, 'max' => 50 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .cards' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_cards',
			[
				'label' => esc_html__( 'Cards', 'depth' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'cards_layout_heading',
			[
				'label' => esc_html__( 'Layout', 'depth' ),
				'type'  => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'cards_per_row',
			[
				'label'     => esc_html__( 'Cards Per Row', 'depth' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => '3',
				'options'   => [
					'1' => esc_html__( '1', 'depth' ),
					'2' => esc_html__( '2', 'depth' ),
					'3' => esc_html__( '3', 'depth' ),
					'4' => esc_html__( '4', 'depth' ),
					'5' => esc_html__( '5', 'depth' ),
					'6' => esc_html__( '6', 'depth' ),
				],
				'selectors' => [
					'{{WRAPPER}} .cards' => 'grid-template-columns: repeat({{VALUE}}, minmax(0, 1fr));',
				],
			]
		);

		$this->add_responsive_control(
			'outer_padding_top',
			[
				'label'      => esc_html__( 'Cards Padding Top', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 20,
				],
				'size_units' => [ 'px', '%', 'vh' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 300 ],
					'%'  => [ 'min' => 0, 'max' => 30 ],
					'vh' => [ 'min' => 0, 'max' => 30 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .cards' => 'padding-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'outer_padding_bottom',
			[
				'label'      => esc_html__( 'Cards Padding Bottom', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 20,
				],
				'size_units' => [ 'px', '%', 'vh' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 300 ],
					'%'  => [ 'min' => 0, 'max' => 30 ],
					'vh' => [ 'min' => 0, 'max' => 30 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .cards' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'outer_padding_left',
			[
				'label'      => esc_html__( 'Cards Padding Left', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 20,
				],
				'size_units' => [ 'px', '%', 'vw' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 300 ],
					'%'  => [ 'min' => 0, 'max' => 30 ],
					'vw' => [ 'min' => 0, 'max' => 30 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .cards' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'outer_padding_right',
			[
				'label'      => esc_html__( 'Cards Padding Right', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 20,
				],
				'size_units' => [ 'px', '%', 'vw' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 300 ],
					'%'  => [ 'min' => 0, 'max' => 30 ],
					'vw' => [ 'min' => 0, 'max' => 30 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .cards' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'card_box_heading',
			[
				'label'     => esc_html__( 'Card Box', 'depth' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'card_width',
			[
				'label'      => esc_html__( 'Card Width', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 260,
				],
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [ 'min' => 120, 'max' => 360 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .cards' => '--depth-card-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_height',
			[
				'label'      => esc_html__( 'Card Height', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 350,
				],
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [ 'min' => 160, 'max' => 500 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .card' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'card_shadow',
				'selector' => '{{WRAPPER}} .card',
			]
		);

		$this->add_control(
			'card_content_heading',
			[
				'label'     => esc_html__( 'Content Box', 'depth' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'card_content_align',
			[
				'label'     => esc_html__( 'Content Alignment', 'depth' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'depth' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'depth' ),
						'icon'  => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'depth' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .card__text' => 'align-items: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_content_padding_top',
			[
				'label'      => esc_html__( 'Card Padding Top', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 14,
				],
				'size_units' => [ 'px', '%', 'vh' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 120 ],
					'%'  => [ 'min' => 0, 'max' => 30 ],
					'vh' => [ 'min' => 0, 'max' => 30 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .card__text' => 'padding-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_content_padding_bottom',
			[
				'label'      => esc_html__( 'Card Padding Bottom', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 14,
				],
				'size_units' => [ 'px', '%', 'vh' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 120 ],
					'%'  => [ 'min' => 0, 'max' => 30 ],
					'vh' => [ 'min' => 0, 'max' => 30 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .card__text' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'card_title_heading',
			[
				'label'     => esc_html__( 'Title Style', 'depth' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'card_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'depth' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .card__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'card_title_typography',
				'selector' => '{{WRAPPER}} .card__title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'card_title_text_shadow',
				'selector' => '{{WRAPPER}} .card__title',
			]
		);

		$this->add_responsive_control(
			'card_title_spacing',
			[
				'label'      => esc_html__( 'Title Bottom Spacing', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 3,
				],
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 40 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .card__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'card_description_heading',
			[
				'label'     => esc_html__( 'Description Style', 'depth' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'card_description_color',
			[
				'label'     => esc_html__( 'Description Color', 'depth' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .card__description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'card_description_typography',
				'selector' => '{{WRAPPER}} .card__description',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'card_description_text_shadow',
				'selector' => '{{WRAPPER}} .card__description',
			]
		);

		$this->add_responsive_control(
			'card_description_align',
			[
				'label'     => esc_html__( 'Description Text Align', 'depth' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left' => [
						'title' => esc_html__( 'Left', 'depth' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'depth' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'depth' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .card__description' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_description_spacing',
			[
				'label'      => esc_html__( 'Description Bottom Spacing', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 0,
				],
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [ 'min' => 0, 'max' => 40 ],
				],
				'selectors'  => [
					'{{WRAPPER}} .card__description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_effects',
			[
				'label' => esc_html__( 'Card Effects', 'depth' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'enable_effect',
			[
				'label'        => esc_html__( 'Enable Mouse Effect', 'depth' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'depth' ),
				'label_off'    => esc_html__( 'No', 'depth' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'effect_range',
			[
				'label'     => esc_html__( 'Tilt Range', 'depth' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'default'   => 40,
				'min'       => 0,
				'max'       => 120,
				'step'      => 1,
				'condition' => [
					'enable_effect' => 'yes',
				],
			]
		);

		$this->add_control(
			'image_shift',
			[
				'label'     => esc_html__( 'Image Shift Multiplier', 'depth' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'default'   => 1,
				'min'       => 0,
				'max'       => 3,
				'step'      => 0.1,
				'condition' => [
					'enable_effect' => 'yes',
				],
			]
		);

		$this->add_control(
			'bg_shift',
			[
				'label'     => esc_html__( 'Background Shift Multiplier', 'depth' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'default'   => 0.45,
				'min'       => 0,
				'max'       => 2,
				'step'      => 0.05,
				'condition' => [
					'enable_effect' => 'yes',
				],
			]
		);

		$this->add_control(
			'gradient_heading',
			[
				'label'     => esc_html__( 'Background Gradient Overlay', 'depth' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'gradient_enable',
			[
				'label'        => esc_html__( 'Enable Gradient Overlay', 'depth' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'depth' ),
				'label_off'    => esc_html__( 'No', 'depth' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'gradient_exclude_first',
			[
				'label'        => esc_html__( 'Hide on First Card', 'depth' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'depth' ),
				'label_off'    => esc_html__( 'No', 'depth' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'gradient_color_start',
			[
				'label'     => esc_html__( 'Gradient Start', 'depth' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#2D1E57',
				'condition' => [
					'gradient_enable' => 'yes',
				],
			]
		);

		$this->add_control(
			'gradient_color_end',
			[
				'label'     => esc_html__( 'Gradient End', 'depth' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#FF4D79',
				'condition' => [
					'gradient_enable' => 'yes',
				],
			]
		);

		$this->add_control(
			'gradient_angle',
			[
				'label'      => esc_html__( 'Gradient Angle', 'depth' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default'    => [
					'unit' => 'deg',
					'size' => 145,
				],
				'range'      => [
					'deg' => [ 'min' => 0, 'max' => 360 ],
				],
				'condition'  => [
					'gradient_enable' => 'yes',
				],
			]
		);

		$this->add_control(
			'gradient_opacity',
			[
				'label'     => esc_html__( 'Gradient Opacity', 'depth' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'default'   => [
					'unit' => 'px',
					'size' => 65,
				],
				'range'     => [
					'px' => [ 'min' => 0, 'max' => 100 ],
				],
				'condition' => [
					'gradient_enable' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$range       = isset( $settings['effect_range'] ) ? (float) $settings['effect_range'] : 40;
		$image_shift = isset( $settings['image_shift'] ) ? (float) $settings['image_shift'] : 1;
		$bg_shift    = isset( $settings['bg_shift'] ) ? (float) $settings['bg_shift'] : 0.45;
		$enabled     = ( isset( $settings['enable_effect'] ) && 'yes' === $settings['enable_effect'] ) ? '1' : '0';
		$gradient_on = ( isset( $settings['gradient_enable'] ) && 'yes' === $settings['gradient_enable'] ) ? '1' : '0';
		$hide_first  = ( isset( $settings['gradient_exclude_first'] ) && 'yes' === $settings['gradient_exclude_first'] ) ? '1' : '0';
		$g_start     = ! empty( $settings['gradient_color_start'] ) ? $settings['gradient_color_start'] : '#2D1E57';
		$g_end       = ! empty( $settings['gradient_color_end'] ) ? $settings['gradient_color_end'] : '#FF4D79';
		$g_angle     = isset( $settings['gradient_angle']['size'] ) ? (float) $settings['gradient_angle']['size'] : 145;
		$g_opacity   = isset( $settings['gradient_opacity']['size'] ) ? (float) $settings['gradient_opacity']['size'] / 100 : 0.65;
		?>
<div class="cards" data-effect-enabled="<?php echo esc_attr( $enabled ); ?>" data-effect-range="<?php echo esc_attr( $range ); ?>" data-image-shift="<?php echo esc_attr( $image_shift ); ?>" data-bg-shift="<?php echo esc_attr( $bg_shift ); ?>" data-gradient-enabled="<?php echo esc_attr( $gradient_on ); ?>" data-gradient-hide-first="<?php echo esc_attr( $hide_first ); ?>" style="--depth-gradient-start: <?php echo esc_attr( $g_start ); ?>; --depth-gradient-end: <?php echo esc_attr( $g_end ); ?>; --depth-gradient-angle: <?php echo esc_attr( $g_angle ); ?>deg; --depth-gradient-opacity: <?php echo esc_attr( $g_opacity ); ?>;">
  <?php if ( ! empty( $settings['cards'] ) && is_array( $settings['cards'] ) ) : ?>
    <?php foreach ( $settings['cards'] as $index => $item ) : ?>
      <?php
      $variant_map = [ 'card__one', 'card__two', 'card__three' ];
      $variant     = isset( $variant_map[ $index ] ) ? $variant_map[ $index ] : 'card__three';
      $link    = ! empty( $item['card_link']['url'] ) ? $item['card_link']['url'] : '';
      $target  = ! empty( $item['card_link']['is_external'] ) ? '_blank' : '_self';
      $rel     = ! empty( $item['card_link']['nofollow'] ) ? 'nofollow' : '';
      $bg_url  = ! empty( $item['card_bg_image']['url'] ) ? $item['card_bg_image']['url'] : '';
      $img_x   = isset( $item['card_image_x']['size'] ) ? (float) $item['card_image_x']['size'] : 50;
      $img_y   = isset( $item['card_image_y']['size'] ) ? (float) $item['card_image_y']['size'] : 50;
      $desc    = ! empty( $item['card_description'] ) ? $item['card_description'] : '';
      ?>
  <div class="card <?php echo esc_attr( $variant ); ?>"<?php echo $link ? ' data-card-link="' . esc_url( $link ) . '" data-card-target="' . esc_attr( $target ) . '" data-card-rel="' . esc_attr( $rel ) . '"' : ''; ?>>
    <div class="card__bg"<?php echo $bg_url ? ' style="background-image: url(' . esc_url( $bg_url ) . ');"' : ''; ?>></div>
    <img class="card__img" src="<?php echo esc_url( $item['card_image']['url'] ); ?>" style="--depth-img-x: <?php echo esc_attr( $img_x ); ?>%; --depth-img-y: <?php echo esc_attr( $img_y ); ?>%;" />
    <div class="card__text">
      <p class="card__title"><?php echo esc_html( $item['card_title'] ); ?></p>
      <?php if ( $desc ) : ?>
        <p class="card__description"><?php echo esc_html( $desc ); ?></p>
      <?php endif; ?>
    </div>
  </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
		<?php
	}
}
