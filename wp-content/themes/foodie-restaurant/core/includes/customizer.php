<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'foodie_restaurant_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'foodie-restaurant' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'foodie-restaurant' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'foodie-restaurant' ),
			'off' => esc_html__( 'Disable', 'foodie-restaurant' ),
		],
		'partial_refresh'    => [
		'foodie_restaurant_display_header_title' => [
			'selector'        => '.logo a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'foodie-restaurant' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'foodie-restaurant' ),
			'off' => esc_html__( 'Disable', 'foodie-restaurant' ),
		],
		'partial_refresh'    => [
		'foodie_restaurant_display_header_text' => [
			'selector'        => '.logo-content span',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	//FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'foodie_restaurant_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'foodie-restaurant' ),
	) );

	Kirki::add_section( 'foodie_restaurant_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'foodie-restaurant' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_all_headings_typography',
		'section'     => 'foodie_restaurant_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'foodie_restaurant_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'foodie-restaurant' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'foodie-restaurant' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).',  'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_body_content_typography',
		'section'     => 'foodie_restaurant_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'foodie_restaurant_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'foodie-restaurant' ),
		'description' => esc_attr__( 'Select the typography options for your body.',  'foodie-restaurant' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).',  'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );


	// PANEL

	Kirki::add_panel( 'foodie_restaurant_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'foodie-restaurant' ),
	) );

	// Additional Settings

	Kirki::add_section( 'foodie_restaurant_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'foodie-restaurant' ),
	    'description'    => esc_html__( 'Scroll To Top', 'foodie-restaurant' ),
	    'panel'          => 'foodie_restaurant_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'foodie_restaurant_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_additional_settings',
		'default'     => '1',
		'priority'    => 10,
		'partial_refresh'    => [
		'foodie_restaurant_scroll_enable_setting' => [
			'selector'        => '.scroll-up a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'foodie_restaurant_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'foodie-restaurant' ),
			'Center' => esc_html__( 'Center', 'foodie-restaurant' ),
			'Right'  => esc_html__( 'Right', 'foodie-restaurant' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'foodie_restaurant_scroll_top_icon',
		'label'    => esc_html__( 'Select Appropriate Scroll Top Icon', 'foodie-restaurant' ),
		'section'  => 'foodie_restaurant_additional_settings',
		'default'  => 'dashicons dashicons-arrow-up-alt',
		'priority' => 10,
	] );


	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_foodie_restaurant',
		'label'       => esc_html__( 'Menus Text Transform', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'foodie-restaurant' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'foodie-restaurant' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'foodie-restaurant' ),

		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_menu_zoom',
		'label'       => esc_html__( 'Menu Transition', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_additional_settings',
		'default' => 'None',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'None' => __('None','foodie-restaurant'),
            'Zoominn' => __('Zoom Inn','foodie-restaurant'),
            
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'foodie_restaurant_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'foodie_restaurant_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','foodie-restaurant'),
            'Right Sidebar' => __('Right Sidebar','foodie-restaurant'),
            'One Column' => __('One Column','foodie-restaurant')
		],
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'foodie_restaurant_woocommerce_settings', array(
			'title'          => esc_html__( 'Woocommerce Settings', 'foodie-restaurant' ),
			'description'    => esc_html__( 'Shop Page', 'foodie-restaurant' ),
			'panel'          => 'foodie_restaurant_panel_id',
			'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'foodie_restaurant_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'foodie_restaurant_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'foodie_restaurant_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
	[
		'settings' => 'foodie_restaurant_per_columns',
		'label'    => esc_html__( 'Product Per Row', 'foodie-restaurant' ),
		'section'  => 'foodie_restaurant_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'foodie_restaurant_product_per_page',
		'label'    => esc_html__( 'Product Per Page', 'foodie-restaurant' ),
		'section'  => 'foodie_restaurant_woocommerce_settings',
		'default'  => 9,
		'choices'  => [
			'min'  => 1,
			'max'  => 15,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number_per_row',
		'label'    => esc_html__( 'Related Product Per Column', 'foodie-restaurant' ),
		'section'  => 'foodie_restaurant_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number',
		'label'    => esc_html__( 'Related Product Per Page', 'foodie-restaurant' ),
		'section'  => 'foodie_restaurant_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','foodie-restaurant'),
            'Right Sidebar' => __('Right Sidebar','foodie-restaurant')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','foodie-restaurant'),
            'Right Sidebar' => __('Right Sidebar','foodie-restaurant')
		],
	] );

	new \Kirki\Field\Radio_Buttonset( [
		'settings'    => 'foodie_restaurant_woocommerce_pagination_position',
		'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_woocommerce_settings',
		'default'     => 'Center',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'foodie-restaurant' ),
			'Center' => esc_html__( 'Center', 'foodie-restaurant' ),
			'Right'  => esc_html__( 'Right', 'foodie-restaurant' ),
		],
	]
	);
}

	// POST SECTION

	Kirki::add_section( 'foodie_restaurant_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'foodie-restaurant' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'foodie-restaurant' ),
	    'panel'          => 'foodie_restaurant_panel_id',
	    'priority'       => 160,
	) );

	new \Kirki\Field\Sortable(
	[
		'settings' => 'foodie_restaurant_archive_element_sortable',
		'label'    => __( 'Archive Post Page element Reordering', 'foodie-restaurant' ),
		'section'  => 'foodie_restaurant_section_post',
		'default'  => [ 'option1', 'option2', 'option3' ],
		'choices'  => [
			'option1' => esc_html__( 'Post Meta', 'foodie-restaurant' ),
			'option2' => esc_html__( 'Post Title', 'foodie-restaurant' ),
			'option3' => esc_html__( 'Post Content', 'foodie-restaurant' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'foodie_restaurant_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'foodie_restaurant_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','foodie-restaurant'),
            'Right Sidebar' => __('Right Sidebar','foodie-restaurant')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','foodie-restaurant'),
            'Right Sidebar' => __('Right Sidebar','foodie-restaurant')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','foodie-restaurant'),
            'Right Sidebar' => __('Right Sidebar','foodie-restaurant')
		],
	] );

	Kirki::add_field( 'foodie_restaurant_config', [
		'type'        => 'select',
		'settings'    => 'foodie_restaurant_post_column_count',
		'label'       => esc_html__( 'Grid Column for Archive Page', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_section_post',
		'default'    => '2',
		'choices' => [
				'1' => __( '1 Column', 'foodie-restaurant' ),
				'2' => __( '2 Column', 'foodie-restaurant' ),
				'3' => __( '3 Column', 'foodie-restaurant' ),
				'4' => __( '4 Column', 'foodie-restaurant' ),
			],
	] );

	// HEADER SECTION

	Kirki::add_section( 'foodie_restaurant_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'foodie-restaurant' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'foodie-restaurant' ),
	    'panel'          => 'foodie_restaurant_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_enable_button',
		'section'     => 'foodie_restaurant_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sign Up Button', 'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Text', 'foodie-restaurant' ),
		'settings' => 'foodie_restaurant_free_delivery_text',
		'section'  => 'foodie_restaurant_section_header',
		'default'  => '',
		'priority' => 10,
		'partial_refresh'    => [
		'foodie_restaurant_free_delivery_text' => [
			'selector'        => 'a.myacunt-url',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'URL', 'foodie-restaurant' ),
		'settings' => 'foodie_restaurant_free_delivery_link',
		'section'  => 'foodie_restaurant_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_enable_search',
		'section'     => 'foodie_restaurant_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_search_box_enable',
		'section'     => 'foodie_restaurant_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'foodie-restaurant' ),
			'off' => esc_html__( 'Disable', 'foodie-restaurant' ),
		],
		'partial_refresh'    => [
		'foodie_restaurant_search_box_enable' => [
			'selector'        => '.header-search',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'foodie_restaurant_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'foodie-restaurant' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'foodie-restaurant' ),
        'panel'          => 'foodie_restaurant_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_enable_heading',
		'section'     => 'foodie_restaurant_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'foodie-restaurant' ),
			'off' => esc_html__( 'Disable', 'foodie-restaurant' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'foodie-restaurant' ),
			'off' => esc_html__( 'Disable', 'foodie-restaurant' ),
		],
		'partial_refresh'    => [
		'foodie_restaurant_title_unable_disable' => [
			'selector'        => '.blog_box h3',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_button_unable_disable',
		'label'       => esc_html__( 'Slide Button Enable / Disable', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'foodie-restaurant' ),
			'off' => esc_html__( 'Disable', 'foodie-restaurant' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_slider_heading',
		'section'     => 'foodie_restaurant_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'foodie_restaurant_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => 0,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'foodie_restaurant_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'foodie-restaurant' ),
		'priority'    => 10,
		'choices'     => foodie_restaurant_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Extra Slider Heading', 'foodie-restaurant' ),
		'settings' => 'foodie_restaurant_slider_extra_heading',
		'section'  => 'foodie_restaurant_blog_slide_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_header_phone_number_heading_22',
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content Alignment', 'foodie-restaurant' ) . '</h3>',
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'foodie-restaurant' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'foodie-restaurant' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'foodie-restaurant' ),

		],
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_header_phone_number_heading',
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Phone Number', 'foodie-restaurant' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'foodie_restaurant_header_phone_number',
		'section'  => 'foodie_restaurant_blog_slide_section',
		'default'  => '',
		'sanitize_callback' => 'foodie_restaurant_sanitize_phone_number',
		'partial_refresh'    => [
		'foodie_restaurant_header_phone_number' => [
			'selector'        => '.contact-info i',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_enable_email_heading',
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Email Address', 'foodie-restaurant' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'foodie_restaurant_header_email',
		'section'  => 'foodie_restaurant_blog_slide_section',
		'default'  => '',
		'sanitize_callback' => 'sanitize_email',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_enable_location_heading',
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Location', 'foodie-restaurant' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'foodie_restaurant_header_location',
		'section'  => 'foodie_restaurant_blog_slide_section',
		'default'  => '',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_enable_socail_link',
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'foodie-restaurant' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'foodie_restaurant_blog_slide_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'foodie-restaurant' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'foodie-restaurant' ),
		'settings'     => 'foodie_restaurant_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'foodie-restaurant' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'foodie-restaurant' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'foodie-restaurant' ),
				'description' => esc_html__( 'Add the social icon url here.', 'foodie-restaurant' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_slider_opacity_color',
		'label'       => esc_html__( 'Slider Opacity Option', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '0.6',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'0' => esc_html__( '0', 'foodie-restaurant' ),
			'0.1' => esc_html__( '0.1', 'foodie-restaurant' ),
			'0.2' => esc_html__( '0.2', 'foodie-restaurant' ),
			'0.3' => esc_html__( '0.3', 'foodie-restaurant' ),
			'0.4' => esc_html__( '0.4', 'foodie-restaurant' ),
			'0.5' => esc_html__( '0.5', 'foodie-restaurant' ),
			'0.6' => esc_html__( '0.6', 'foodie-restaurant' ),
			'0.7' => esc_html__( '0.7', 'foodie-restaurant' ),
			'0.8' => esc_html__( '0.8', 'foodie-restaurant' ),
			'0.9' => esc_html__( '0.9', 'foodie-restaurant' ),
			'1.0' => esc_html__( '1.0', 'foodie-restaurant' ),
			

		],
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_overlay_option',
		'label'       => esc_html__( 'Enable / Disable Slider Overlay', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'foodie-restaurant' ),
			'off' => esc_html__( 'Disable', 'foodie-restaurant' ),
		],
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'foodie_restaurant_slider_image_overlay_color',
		'label'       => __( 'choose your Appropriate Overlay Color', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_blog_slide_section',
		'default'     => '',
	] );

	// POPULAR FOOD SECTION

	Kirki::add_section( 'foodie_restaurant_popular_food_section', array(
	    'title'          => esc_html__( 'Popular Food Settings', 'foodie-restaurant' ),
	    'panel'          => 'foodie_restaurant_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_enable_heading',
		'section'     => 'foodie_restaurant_popular_food_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Popular Food',  'foodie-restaurant' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_popular_food_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_popular_food_section',
		'default'     => false,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'foodie-restaurant' ),
			'off' => esc_html__( 'Disable',  'foodie-restaurant' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'foodie_restaurant_popular_food_heading' ,
        'label'    => esc_html__( 'Heading',  'foodie-restaurant' ),
        'section'  => 'foodie_restaurant_popular_food_section',
        'partial_refresh'    => [
		'foodie_restaurant_popular_food_heading' => [
			'selector'        => '#popular-food h2',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
    ] );

    kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'foodie_restaurant_popular_food_tab_number',
		'label'       => esc_html__( 'Number of post to show ',  'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_popular_food_section',
		'default'     => 4,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	// FOOTER SECTION

	Kirki::add_section( 'foodie_restaurant_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'foodie-restaurant' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'foodie-restaurant' ),
        'panel'          => 'foodie_restaurant_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_footer_enable_heading',
		'section'     => 'foodie_restaurant_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'foodie_restaurant_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'foodie-restaurant' ),
			'off' => esc_html__( 'Disable', 'foodie-restaurant' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'foodie_restaurant_footer_text_heading',
		'section'     => 'foodie_restaurant_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'foodie-restaurant' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'foodie_restaurant_footer_text',
		'section'  => 'foodie_restaurant_footer_section',
		'default'  => '',
		'priority' => 10,
		'partial_refresh'    => [
		'foodie_restaurant_footer_text' => [
			'selector'        => '.copy-text p',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );


	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'foodie_restaurant_footer_text_heading_2',
	'section'     => 'foodie_restaurant_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'foodie-restaurant' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'foodie_restaurant_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'foodie-restaurant' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'foodie-restaurant' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'foodie-restaurant' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'foodie-restaurant' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'foodie_restaurant_footer_text_heading_1',
	'section'     => 'foodie_restaurant_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'foodie-restaurant' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'foodie_restaurant_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'foodie-restaurant' ),
		'section'     => 'foodie_restaurant_footer_section',
		'default'     => '',
	] );
}

add_action( 'customize_register', 'foodie_restaurant_customizer_settings' );
function foodie_restaurant_customizer_settings( $wp_customize ) {
	$wp_customize->add_setting('foodie_restaurant_popular_food_tab_number',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('foodie_restaurant_popular_food_tab_number',array(
		'type' => 'number',
		'label' => __('Show number of product tab','foodie-restaurant'),
		'section' => 'foodie_restaurant_popular_food_section',
	));

	$foodie_restaurant_meal_post = get_theme_mod('foodie_restaurant_popular_food_tab_number','');
    for ( $foodie_restaurant_j = 1; $foodie_restaurant_j <= $foodie_restaurant_meal_post; $foodie_restaurant_j++ ) {

		$wp_customize->add_setting('foodie_restaurant_popular_food_tabs_text'.$foodie_restaurant_j,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control('foodie_restaurant_popular_food_tabs_text'.$foodie_restaurant_j,array(
			'type' => 'text',
			'label' => __('Tab Text ','foodie-restaurant').$foodie_restaurant_j,
			'section' => 'foodie_restaurant_popular_food_section',
		));

		$foodie_restaurant_args = array(
	       'type'                     => 'product',
	        'child_of'                 => 0,
	        'parent'                   => '',
	        'orderby'                  => 'term_group',
	        'order'                    => 'ASC',
	        'hide_empty'               => false,
	        'hierarchical'             => 1,
	        'number'                   => '',
	        'taxonomy'                 => 'product_cat',
	        'pad_counts'               => false
	    );
		$categories = get_categories($foodie_restaurant_args);
		$foodie_restaurant_cat_posts = array();
		$foodie_restaurant_m = 0;
		$foodie_restaurant_cat_posts[]='Select';
		foreach($categories as $category){
			if($foodie_restaurant_m==0){
				$default = $category->slug;
				$foodie_restaurant_m++;
			}
			$foodie_restaurant_cat_posts[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('foodie_restaurant_popular_food_category'.$foodie_restaurant_j,array(
			'default'	=> 'select',
			'sanitize_callback' => 'foodie_restaurant_sanitize_select',
		));

		$wp_customize->add_control('foodie_restaurant_popular_food_category'.$foodie_restaurant_j,array(
			'type'    => 'select',
			'choices' => $foodie_restaurant_cat_posts,
			'label' => __('Select category to display products ','foodie-restaurant').$foodie_restaurant_j,
			'section' => 'foodie_restaurant_popular_food_section',
		));
	}
}
