<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset='<?php bloginfo( 'charset' ); ?>' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div class='overlay'></div>
		<div class='page-wrapper'>
			<header class='header'>
				<div class='header__inner content-wrapper'>
					<?php if ( has_custom_logo() ) : ?>
						<div class='header__logo'>
							<?php $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' ); ?>
							<a class='header__logo-link' href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><img class='header__logo-img' src='<?php echo esc_url( $logo[0] ); ?>' alt='<?php echo esc_attr( 'name' ); ?>'></a>
						</div>
					<?php else : ?>
						<a class='header__logo-link' href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><img class='header__logo-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.png' alt='<?php echo esc_attr( 'name' ); ?>'></a>
					<?php endif; ?>
					<nav class='header__primary-menu'>
						<button class='header__menu-toggle' aria-expanded='false'><i class='material-icons'>&#xE5D2;</i></button>
						<?php
						wp_nav_menu( array(
							'container'      => 'ul',
							'depth'          => 1,
							'menu_class'     => 'header__menu header__menu--primary',
							'theme_location' => 'header-primary',
							'walker'         => new BEM_Walker_Nav_Menu(),
						) );
						?>
					</nav>
				</div>
			</header>
