			<footer class='footer'>
				<div class='footer__top'>
					<div class='footer__top-inner content-wrapper'>
						<div class='info-boxes'>
							<div class='info-boxes__box'>
								<div class='info-boxes__box-content'>
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div>
							</div>
							<div class='info-boxes__box'>
								<div class='info-boxes__box-content'>
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div>
							</div>
							<div class='info-boxes__box'>
								<div class='info-boxes__box-content'>
									<?php dynamic_sidebar( 'footer-3' ); ?>
								</div>
							</div>
							<div class='info-boxes__box'>
								<div class='info-boxes__box-content'>
									<?php dynamic_sidebar( 'footer-4' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='footer__bottom'>
					<div class='footer__bottom-inner content-wrapper'>
						<div class='footer__logo'>
							<img class='footer__logo-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.png' alt='Red Panda Adventures Logo'>
						</div>
						<div class='footer__copyright'>
							<p class='footer__copyright-text'>Copyright 2017 Motorcycle Life LLP, Red Panda Adventures is a registered trademark of Motorcycle Life LLP, India. All Rights Reserved. Company Name: MOTORCYCLE LIFE LLP; LLPIN: AAK-1140; PAN: ABGFM2575D; TAN: SHLM04100F; Registered Trade Mark: RED PANDA ADVENTURES</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
