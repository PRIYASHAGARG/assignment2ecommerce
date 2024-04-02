<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_foodie_restaurant_dismissed_notice_handler', 'foodie_restaurant_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function foodie_restaurant_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function foodie_restaurant_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

            <?php
            $current_screen = get_current_screen();
				if ($current_screen->id !== 'appearance_page_foodie-restaurant-guide-page') {
             $foodie_restaurant_comments_theme = wp_get_theme(); ?>
            <div class="foodie-restaurant-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
			<div class="foodie-restaurant-notice">
				<div class="foodie-restaurant-notice-img">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'foodie-restaurant'); ?>">
				</div>
				<div class="foodie-restaurant-notice-content">
					<div class="foodie-restaurant-notice-heading"><?php esc_html_e('Thanks for installing ','foodie-restaurant'); ?><?php echo esc_html( $foodie_restaurant_comments_theme ); ?></div>
					<p><?php printf(__('In order to fully benefit from everything our theme has to offer, please make sure you visit our <a href="%s">For Premium Options</a>.', 'foodie-restaurant'), esc_url(admin_url('themes.php?page=foodie-restaurant-guide-page'))); ?></p>
					<?php if (is_child_theme()) { ?>
						<?php $child_theme = wp_get_theme(); ?>
						<?php printf(esc_html__('You\'re using %1$s theme, It\'s a child theme of %2$s.', 'foodie-restaurant'), '<strong>' . $child_theme->Name . '</strong>', '<strong>' . esc_html__('foodie_restaurant', 'foodie-restaurant') . '</strong>'); 
						?>
						<?php
						$copy_link_args = array(
							'page' => 'foodie-restaurant',
							'action' => 'show_copy_settings',
						);
						$copy_link = add_query_arg($copy_link_args, admin_url('themes.php'));
						?>
						<?php printf('%s <a href="%s" class="go-to-setting">%s</a>', esc_html__('Now you can copy setting data from parent theme to this child theme', 'foodie-restaurant'), esc_url($copy_link), esc_html__('Copy Settings', 'foodie-restaurant')); ?>
					<?php } ?>
				</div>
			</div>
		</div>
        <?php }
	}
}

add_action( 'admin_notices', 'foodie_restaurant_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'foodie_restaurant_getting_started' );
function foodie_restaurant_getting_started() {
	add_theme_page( esc_html__('Get Started', 'foodie-restaurant'), esc_html__('Get Started', 'foodie-restaurant'), 'edit_theme_options', 'foodie-restaurant-guide-page', 'foodie_restaurant_test_guide');
	wp_enqueue_script( 'foodie-restaurant-admin-script', get_template_directory_uri() . '/js/foodie-restaurant-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'foodie-restaurant-admin-script', 'foodie_restaurant_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}

function foodie_restaurant_admin_enqueue_scripts() {
	wp_enqueue_style( 'foodie-restaurant-admin-style',get_template_directory_uri().'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'foodie_restaurant_admin_enqueue_scripts' );

if ( ! defined( 'FOODIE_RESTAURANT_DOCS_FREE' ) ) {
define('FOODIE_RESTAURANT_DOCS_FREE',__('https://www.misbahwp.com/docs/foodie-restaurant-free-docs/','foodie-restaurant'));
}
if ( ! defined( 'FOODIE_RESTAURANT_DOCS_PRO' ) ) {
define('FOODIE_RESTAURANT_DOCS_PRO',__('https://www.misbahwp.com/docs/foodie-restaurant-pro-docs','foodie-restaurant'));
}
if ( ! defined( 'FOODIE_RESTAURANT_BUY_NOW' ) ) {
define('FOODIE_RESTAURANT_BUY_NOW',__('https://www.misbahwp.com/themes/fast-food-wordpress-theme/','foodie-restaurant'));
}
if ( ! defined( 'FOODIE_RESTAURANT_SUPPORT_FREE' ) ) {
define('FOODIE_RESTAURANT_SUPPORT_FREE',__('https://wordpress.org/support/theme/foodie-restaurant','foodie-restaurant'));
}
if ( ! defined( 'FOODIE_RESTAURANT_REVIEW_FREE' ) ) {
define('FOODIE_RESTAURANT_REVIEW_FREE',__('https://wordpress.org/support/theme/foodie-restaurant/reviews/#new-post','foodie-restaurant'));
}
if ( ! defined( 'FOODIE_RESTAURANT_DEMO_PRO' ) ) {
define('FOODIE_RESTAURANT_DEMO_PRO',__('https://www.misbahwp.com/demo/foodie-restaurant/','foodie-restaurant'));
}
if( ! defined( 'FOODIE_RESTAURANT_THEME_BUNDLE' ) ) {
define('FOODIE_RESTAURANT_THEME_BUNDLE',__('https://www.misbahwp.com/themes/wordpress-bundle/','foodie-restaurant'));
}

function foodie_restaurant_test_guide() { ?>
	<?php $foodie_restaurant_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( FOODIE_RESTAURANT_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'foodie-restaurant' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'foodie-restaurant' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( FOODIE_RESTAURANT_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'foodie-restaurant' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( FOODIE_RESTAURANT_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'foodie-restaurant' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','foodie-restaurant'); ?><?php echo esc_html( $foodie_restaurant_theme ); ?>  <span><?php esc_html_e('Version: ', 'foodie-restaurant'); ?><?php echo esc_html($foodie_restaurant_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-inside">
					<?php
						$foodie_restaurant_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $foodie_restaurant_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'foodie-restaurant' ); ?></h3>
				<div class="insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','foodie-restaurant'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( FOODIE_RESTAURANT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'foodie-restaurant' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( FOODIE_RESTAURANT_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'foodie-restaurant' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( FOODIE_RESTAURANT_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'foodie-restaurant' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'foodie-restaurant' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 80+ Perfect WordPress Theme In A Single Package at just $79."','foodie-restaurant'); ?></p>
					<p class="coupon"><?php esc_html_e('Exclusive Offer !! Get Our Theme Pack of 60+ WordPress Themes At 10% Off','foodie-restaurant'); ?><span class="coupon-code"><?php esc_html_e('"Themespack10"','foodie-restaurant'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( FOODIE_RESTAURANT_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'foodie-restaurant' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','foodie-restaurant'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','foodie-restaurant'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','foodie-restaurant'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','foodie-restaurant'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>

<?php } ?>
