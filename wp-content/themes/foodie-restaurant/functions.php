<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function foodie_restaurant_enqueue_google_fonts() {
	wp_enqueue_style( 'google-fonts-lexend', 'https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'foodie_restaurant_enqueue_google_fonts' );

if (!function_exists('foodie_restaurant_enqueue_scripts')) {

	function foodie_restaurant_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('foodie-restaurant-style', get_stylesheet_uri(), array() );

		wp_style_add_data('foodie-restaurant-style', 'rtl', 'replace');

		wp_enqueue_style(
			'foodie-restaurant-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'foodie-restaurant-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'foodie-restaurant-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'foodie-restaurant-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$css = '';

		if ( get_header_image() ) :

			$css .=  '
				#site-navigation,.page-template-frontpage #site-navigation{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'foodie-restaurant-style', $css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'foodie-restaurant-style',$foodie_restaurant_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'foodie_restaurant_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('foodie_restaurant_after_setup_theme')) {

	function foodie_restaurant_after_setup_theme() {

		if ( ! isset( $content_width ) ) $content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'foodie-restaurant' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
			'flex-width' => true,
			'flex-height' => true,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100,
			'flex-width' => true,
			'flex-height' => true,
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'foodie_restaurant_after_setup_theme', 999 );

}

require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function foodie_restaurant_logo_resizer() {

    $foodie_restaurant_theme_logo_size_css = '';
    $foodie_restaurant_logo_resizer = get_theme_mod('foodie_restaurant_logo_resizer');

	$foodie_restaurant_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($foodie_restaurant_logo_resizer).'px !important;
			width: '.esc_attr($foodie_restaurant_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'foodie-restaurant-style',$foodie_restaurant_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'foodie_restaurant_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function foodie_restaurant_global_color() {

    $foodie_restaurant_theme_color_css = '';
    $foodie_restaurant_copyright_bg = get_theme_mod('foodie_restaurant_copyright_bg');

	$foodie_restaurant_theme_color_css = '
    .copyright {
			background: '.esc_attr($foodie_restaurant_copyright_bg).';
		}
	';
    wp_add_inline_style( 'foodie-restaurant-style',$foodie_restaurant_theme_color_css );
    wp_add_inline_style( 'foodie-restaurant-woocommerce-css',$foodie_restaurant_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'foodie_restaurant_global_color' );


/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('foodie_restaurant_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function foodie_restaurant_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'foodie-restaurant');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'foodie-restaurant'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_html__('%1$s at %2$s', 'foodie-restaurant'), esc_html( get_comment_date() ), esc_html( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'foodie-restaurant' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'foodie-restaurant'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for foodie_restaurant_comment()

if (!function_exists('foodie_restaurant_widgets_init')) {

	function foodie_restaurant_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','foodie-restaurant'),
			'id'   => 'foodie-restaurant-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'foodie-restaurant'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','foodie-restaurant'),
			'id'   => 'foodie-restaurant-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'foodie-restaurant'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'foodie_restaurant_widgets_init' );

}

function foodie_restaurant_get_categories_select() {
	$teh_cats = get_categories();
	$results = array();
	$count = count($teh_cats);
	for ($i=0; $i < $count; $i++) {
	if (isset($teh_cats[$i]))
  		$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	else
  		$count++;
	}
	return $results;
}

function foodie_restaurant_sanitize_select( $input, $setting ) {
	// Ensure input is a slug
	$input = sanitize_key( $input );

	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function foodie_restaurant_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}


// Change number or products per row to 3
add_filter('loop_shop_columns', 'foodie_restaurant_loop_columns');
if (!function_exists('foodie_restaurant_loop_columns')) {
	function foodie_restaurant_loop_columns() {
		$foodie_restaurant_columns = get_theme_mod( 'foodie_restaurant_per_columns', 3 );
		return $foodie_restaurant_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'foodie_restaurant_per_page', 20 );
function foodie_restaurant_per_page( $foodie_restaurant_cols ) {
  	$foodie_restaurant_cols = get_theme_mod( 'foodie_restaurant_product_per_page', 9 );
	return $foodie_restaurant_cols;
}

// Add filter to modify the number of related products
add_filter( 'woocommerce_output_related_products_args', 'foodie_restaurant_products_args' );
function foodie_restaurant_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

add_action('after_switch_theme', 'foodie_restaurant_setup_options');
function foodie_restaurant_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

?>
