<?php
/**
 * Theme setup functions and definitions
 *
 * @package RedPanda
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'redpanda_setup' ) ) :
	function redpanda_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'redpanda' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'redpanda', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 420, 420, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'header-primary' => __( 'Header Primary', 'redpanda' ),
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 72,
				'width'       => 216,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'redpanda_setup' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'redpanda_scripts' ) ) :
	function redpanda_scripts() {
		wp_enqueue_style(
			'redpanda-style',
			get_stylesheet_uri(),
			array(),
			WP_DEBUG ? time() : wp_get_theme()->get( 'Version' )
		);

		wp_enqueue_style(
			'redpanda-fonts-style',
			'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700,700i|Roboto+Mono:400,400i,700,700i|Roboto:400,400i,700,700i&display=swap',
			array( 'redpanda-style' ),
			null
		);

		wp_enqueue_script(
			'redpanda-script',
			get_theme_file_uri( '/script.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'redpanda_scripts' );

/**
 * Register sidebars.
 */
if ( ! function_exists( 'redpanda_sidebars' ) ) :
	function redpanda_sidebars() {
		for ( $i = 1; $i <= 4; $i++ ) {
			register_sidebar(
				array(
					'id'            => 'footer-' . $i,
					/* translators: %s: Footer column number */
					'name'          => sprintf( esc_html__( 'Footer %s', 'redpanda' ), $i ),
					'before_widget' => '<section id="%1$s" class="widget %2$s" aria-labelledby="widget-title">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 id="widget-title" class="widget-title"><span class="widget-title-text">',
					'after_title'   => '</span></h3>',
				)
			);
		}
	}
endif;
add_action( 'widgets_init', 'redpanda_sidebars' );

/**
 * Adter theme activation.
 */
if ( ! function_exists( 'redpanda_after_switch_theme' ) ) :
	function redpanda_after_switch_theme() {

		// HOMEPAGE SETUP
		// Set the title, template, etc
		$new_page_title    = __( 'Home', 'redpanda' );             // Page's title
		$new_page_content  = '';                                   // Content goes here
		$new_page_template = 'page-home.php';                      // The template to use for the page
		$page_check        = get_page_by_title( $new_page_title ); // Check if the page already exists

		// Create a homepage, if it doesn't already exist.
		if ( ! isset( $page_check->ID ) ) {

			$new_page = array(
				'post_type'    => 'page',
				'post_title'   => $new_page_title,
				'post_content' => $new_page_content,
				'post_status'  => 'publish',
				'post_author'  => get_current_user_id(),
				'post_name'    => 'home',
			);

			$new_page_id = wp_insert_post( $new_page );

			if ( ! empty( $new_page_template ) ) {
				update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
			}

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $new_page_id );
		}

		// MENU SETUP
		// Create a primary nav menu, if it doesn't already exist.
		if ( ! wp_get_nav_menu_object( 'Red Panda Menu' ) ) {

			$menu_id = wp_create_nav_menu( 'Red Panda Menu' );

			if ( ! is_wp_error( $menu_id ) ) {

				// Set up default BuddyPress links and add them to the menu.
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'   => __( 'Motorcycle Tours' ),
						'menu-item-classes' => 'motorcycle-tours',
						'menu-item-url'     => '#motorcycle-tours',
						'menu-item-status'  => 'publish',
					)
				);
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'   => __( 'Contact Us' ),
						'menu-item-classes' => 'contact-us',
						'menu-item-url'     => '#contact-us',
						'menu-item-status'  => 'publish',
					)
				);
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'   => __( 'About Us' ),
						'menu-item-classes' => 'about-us',
						'menu-item-url'     => '#about-us',
						'menu-item-status'  => 'publish',
					)
				);
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'   => __( 'Rentals' ),
						'menu-item-classes' => 'rentals',
						'menu-item-url'     => '#rentals',
						'menu-item-status'  => 'publish',
					)
				);
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'   => __( 'Reviews' ),
						'menu-item-classes' => 'reviews',
						'menu-item-url'     => '#reviews',
						'menu-item-status'  => 'publish',
					)
				);
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'   => __( 'Others' ),
						'menu-item-classes' => 'others',
						'menu-item-url'     => '#others',
						'menu-item-status'  => 'publish',
					)
				);

				// Grab the theme locations and assign our newly-created menu to the BuddyPress menu location.
				// if ( ! has_nav_menu( 'header-primary' ) ) {
					$locations                   = get_theme_mod( 'nav_menu_locations' );
					$locations['header-primary'] = $menu_id;
					set_theme_mod( 'nav_menu_locations', $locations );
				// }
			}
		}

		// WIDGETS SETUP
		// We don't want to undo user changes, so we look for changes first.
		if ( ! is_active_sidebar( 'footer-1' ) ) {
			$data = array (
				'content' => '<h3 class="info-boxes__box-heading">Why Ride With Red Panda Adventure?</h3>',
			);
			insert_widget_in_sidebar( 'custom_html', $data, 'footer-1' );
		}
		if ( ! is_active_sidebar( 'footer-2' ) ) {
			$data = array (
				'content' => '<h3 class="info-boxes__box-heading">HAPPY RIDERS <img class="info-boxes__box-heading-img" src="' . esc_url( get_template_directory_uri() ) . '/assets/img/icon-10.png" alt="Thumbs up icon"></h3><p class="info-boxes__box-text">Read What Our Clients Have To Say About Us</p>',
			);
			insert_widget_in_sidebar( 'custom_html', $data, 'footer-2' );
		}
		if ( ! is_active_sidebar( 'footer-3' ) ) {
			$data = array (
				'content' => '<h3 class="info-boxes__box-heading">RUN BY RIDERS <img class="info-boxes__box-heading-img" src="' . esc_url( get_template_directory_uri() ) . '/assets/img/icon-11.png" alt="Badge icon"></h3><p class="info-boxes__box-text">The Founders Are A Bunch Of Riders. We Understand You.</p>',
			);
			insert_widget_in_sidebar( 'custom_html', $data, 'footer-3' );
		}
		if ( ! is_active_sidebar( 'footer-4' ) ) {
			$data = array (
				'content' => '<h3 class="info-boxes__box-heading">SECURE PAYMENT <img class="info-boxes__box-heading-img" src="' . esc_url( get_template_directory_uri() ) . '/assets/img/icon-12.png" alt="Lock icon"></h3><p class="info-boxes__box-text">We Offer You A Choice Of Online Booking & Payment For Easy Transactions.</p>',
			);
			insert_widget_in_sidebar( 'custom_html', $data, 'footer-4' );
		}

	}
endif;
add_action( 'after_switch_theme', 'redpanda_after_switch_theme' );

/**
 * Add conditional CSS clasess to body tag.
 */
function redpanda_body_classes( $classes ) {
	if ( WP_DEBUG ) {
		$classes[] = 'development';
	}
	return $classes;
}
add_filter( 'body_class','redpanda_body_classes' );

/**
 * Filter the excerpt length to 30 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function redpanda_excerpt_length( $length ) {
	return get_theme_mod( 'post_excerpt_length', 20 );
}
add_filter( 'excerpt_length', 'redpanda_excerpt_length' );

/**
 * Replaces the excerpt "Read More" text by a link.
 *
 * @param string $more Link to single post/page.
 * @return string Custom excerpt read more link.
 */
function redpanda_more_link( $more ) {
	return '&nbsp;&hellip;';
}
add_filter( 'excerpt_more', 'redpanda_more_link' );
add_filter( 'the_content_more_link', 'redpanda_more_link' );
