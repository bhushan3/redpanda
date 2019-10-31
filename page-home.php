<?php
/* Template Name: Homepage */

get_header();
?>
	<div id='main' class='main'>
		<div class='hero'>
			<div class='hero__featured-img' style='background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/banner.jpg);'></div>
			<div class='hero__inner content-wrapper'>
				<div class='hero__content'>
					<h2 class='hero__heading'>Where are you riding?</h2>
					<h3 class='hero__sub-heading'>Come ride with us</h3>
					<a class='hero__cta' href='#why-us'>Explore<i class='hero__cta-icon material-icons'>arrow_drop_down</i></a>
				</div>
				<ul class='hero__social'>
					<li class='hero__social-item hero__social-item--google'>
						<a class='hero__social-item-link' href='#' target='_blank'><img class='hero__social-item-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/google.png' alt='Google'></a>
					</li>
					<li class='hero__social-item hero__social-item--instagram'>
						<a class='hero__social-item-link' href='#' target='_blank'><img class='hero__social-item-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/instagram.png' alt='Instagram'></a>
					</li>
					<li class='hero__social-item hero__social-item--facebook'>
						<a class='hero__social-item-link' href='#' target='_blank'><img class='hero__social-item-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/facebook.png' alt='Facebook'></a>
					</li>
				</ul>
			</div>
		</div>
		<section id='why-us' class='section section--paper'>
			<div class='section__inner content-wrapper'>
				<div class='why-us'>
					<div class='why-us__left'>
						<div class='why-us__left-inner'>
							<h2 class='why-us__heading fancy-underline'>WHY RIDE WITH US?</h2>
							<div class='why-us__content'>
								<p>Adventures call us all, the only difference, is what we say back. Apart from providing you with a well-maintained motorcycle, Red Panda Adventures will make sure you have all the necessary contacts for a hassle-free trip. Rest assured, there won’t be any intrusions from our side. It’s your ride. It’s your adventure.</p>
							</div>
							<h6 class='why-us__action'>
								<a class='why-us__action-link' href='#'>Explored Our Ride <i class='why-us__action-link-icon material-icons'>arrow_forward</i></a>
							</h6>
						</div>
					</div>
					<div class='why-us__right'>
						<div class='why-us__right-inner'>
							<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bike-in-water.jpg' alt='Bike in water'>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class='section section--trips'>
			<div class='section__inner content-wrapper content-wrapper--full content-wrapper--no-padding'>
				<div class='trips'>
					<div class='trips__item'>
						<div class='trips__item-background-img' style='background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/trip-1.jpg);'></div>
						<div class='trips__item-inner'>
							<div class='trips__item-number'>Trip <span class='trips__item-number-current'>1</span> of 8</div>
							<h3 class='trips__item-title fancy-underline'>LAKES OF LEH LADAK</h3>
							<p class='trips__item-content'>Get ready to see sometimes emerald-green and sometimes midnight-blue pool of water as the Ladakh region is home to some very beautiful lakes- Pangong Tso, Tso Moriri and Tso Kar. Start your journey with us on Royal Enfields by riding to the highest motorable pass in the world – Khardung La, 18,380 ft. and then getting down to Nubra Valley before you head towards the lakes.</p>
							<div class='trips__item-info'>
								<div class='trips__item-days'>10 days</div>
								<div class='trips__item-duration'>June - August</div>
								<div class='trips__item-cost'>1,500</div>
								<div class='trips__item-distance'>18,380 KM</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class='section section--paper section--rent-now'>
			<div class='section__inner content-wrapper'>
				<div class='rent-now'>
					<div class='rent-now__left'>
						<div class='rent-now__left-inner'>
							<img src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bike.png' alt='Bike'>
						</div>
					</div>
					<div class='rent-now__right'>
						<div class='rent-now__right-inner'>
							<h6 class='rent-now__box-info'>Ride On Your Own terms</h6>
							<div class='rent-now__box'>
								<h2 class='rent-now__heading uppercase'>Rent now</h2>
								<p class='rent-now__price-info'>Starting INR 1,300/day*</p>
								<button class='rent-now__button button button--h3'>Book Now</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class='section section--blog-articles'>
			<div class='section__background-img' style='background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/greenmount.jpg);'></div>
			<div class='section__inner content-wrapper'>
				<div class='blog-posts'>
					<div class='blog-posts__header'>
						<h2 class='blog-posts__header-title uppercase fancy-underline'>Blog Articles</h2>
						<span class='blog-posts__header-line'></span>
						<a class='blog-posts__header-link fancy-underline' href='#'>SEE ALL</a>
					</div>
					<?php
					$last_posts = get_posts( array(
						'posts_per_page' => 3
					) );
					?>
					<?php if ( $last_posts ) : ?>
						<div class='blog-posts__list'>
							<?php foreach ( $last_posts as $post ) : ?>
								<?php setup_postdata( $post ); ?>
								<div class='blog-posts__list-item'>
									<div class='blog-posts__post'>
										<a class='blog-posts__post-thumb' href='<?php echo esc_url( get_permalink() ); ?>'>
											<?php if ( has_post_thumbnail() ) : ?>
												<img class='blog-posts__post-thumb-img' style='background-image: url(<?php echo esc_url( get_the_post_thumbnail_url() ); ?>);' src='<?php echo esc_url( get_the_post_thumbnail_url() ); ?>' alt='Post thumb'>
											<?php else : ?>
												<img class='blog-posts__post-thumb-img' style='background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post-thumb.jpg);' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post-thumb.jpg' alt='Post thumb'>
											<?php endif; ?>
										</a>
										<div class='blog-posts__post-content'>
											<h2 class='blog-posts__post-title'>
												<?php the_title( sprintf( '<a class="blog-posts__title-link" href="%s" rel="bookmark">', get_permalink() ), '</a>' ); ?>
											</h2>
											<p class='blog-posts__post-excerpt'><?php echo get_the_excerpt(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
											<div class='blog-posts__post-author'>- <?php echo get_the_author(); ?></div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php else : ?>
						<div class='blog-posts__list'>
							<div class='blog-posts__list-item'>
								<div class='blog-posts__post'>
									<div class='blog-posts__post-thumb'>
										<img class='blog-posts__post-thumb-img' style='background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post-1.jpg);' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post-1.jpg' alt='Post thumb'>
									</div>
									<div class='blog-posts__post-content'>
										<h3 class='blog-posts__post-title'>Gear Talk: Difference Between Adventure Jackets & Dirt Bike Jerseys</h3>
										<p class='blog-posts__post-excerpt'>One of the most common mistakes made by rookies is being influenced by the aesthetics of a type of gear, often overlooking its purpose and practicality.</p>
										<div class='blog-posts__post-author'>- Juzer Rangwala</div>
									</div>
								</div>
							</div>
							<div class='blog-posts__list-item'>
								<div class='blog-posts__post'>
									<div class='blog-posts__post-thumb'>
										<img class='blog-posts__post-thumb-img' style='background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post-2.jpg);' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post-2.jpg' alt='Post thumb'>
									</div>
									<div class='blog-posts__post-content'>
										<h3 class='blog-posts__post-title'>Does Redlining Damage Your Engine?</h3>
										<p class='blog-posts__post-excerpt'>If you think trading your mates’ attention for that extra minute on the redline while smoking your tires is all worth, you might want to...</p>
										<div class='blog-posts__post-author'>- Juzer Rangwala</div>
									</div>
								</div>
							</div>
							<div class='blog-posts__list-item'>
								<div class='blog-posts__post'>
									<div class='blog-posts__post-thumb'>
										<img class='blog-posts__post-thumb-img' style='background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post-3.jpg);' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/post-3.jpg' alt='Post thumb'>
									</div>
									<div class='blog-posts__post-content'>
										<h3 class='blog-posts__post-title'>Perks Of Riding In A Group</h3>
										<p class='blog-posts__post-excerpt'>All for One; One for All. Although this famous line describes the relationship between The Three Musketeers, it applies just as well to group motorcycling....</p>
										<div class='blog-posts__post-author'>- Juzer Rangwala</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<section class='section section--above-footer section--content-middle'>
			<div class='section__background-img' style='background-image: url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/beatenberg.jpg);'></div>
			<div class='section__inner content-wrapper'>
				<div class='reviews'>
					<div class='reviews__heading'>
						<img class='reviews__heading-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/google-reviews.png' alt='Google reviews logo'>
					</div>
					<div class='reviews__list'>
						<div class='reviews__list-item'>
							<div class='reviews__review'>
								<div class='reviews__review-callout'>
									<div class='reviews__review-author-name'>Karan Singh Sood</div>
									<div class='reviews__review-text'>I can only highly recommend Red Panda Adventure. They took such good care of me and my family whilst we were touring from Chandigarh to Leh.</div>
								</div>
								<div class='reviews__review-bottom'>
									<img class='reviews__review-author-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/review-author.png' alt='Review author photo'>
									<div class='reviews__review-stars'>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star_border</i>
									</div>
								</div>
							</div>
						</div>
						<div class='reviews__list-item'>
							<div class='reviews__review'>
								<div class='reviews__review-callout'>
									<div class='reviews__review-author-name'>Damian Martin</div>
									<div class='reviews__review-text'>Friendly and experienced riders. If your’re looking for a premium motorcycle tour/experience and an adventure on two-wheels — hit up Red Panda Adventures.</div>
								</div>
								<div class='reviews__review-bottom'>
									<img class='reviews__review-author-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/review-author.png' alt='Review author photo'>
									<div class='reviews__review-stars'>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star_half</i>
										<i class='reviews__review-star material-icons'>star_border</i>
									</div>
								</div>
							</div>
						</div>
						<div class='reviews__list-item'>
							<div class='reviews__review'>
								<div class='reviews__review-callout'>
									<div class='reviews__review-author-name'>Abisht Iyengar</div>
									<div class='reviews__review-text'>My trip to Enchanting Tawang was one of the most memorable trips with Red Panda. Hope to go soon with them again...</div>
								</div>
								<div class='reviews__review-bottom'>
									<img class='reviews__review-author-img' src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/review-author.png' alt='Review author photo'>
									<div class='reviews__review-stars'>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star</i>
										<i class='reviews__review-star material-icons'>star_half</i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php
get_footer();
