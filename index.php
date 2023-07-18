<?php 
$ct_of_banner = count($bannerSliderItems);
?>

<div id="cm-body" class="cm-body">
	<div class="cm-main">
		<div class="cm-main-keyvisual">
			<div class="swiper">
				<div class="swiper-wrapper">

					<?php 
					$i=1;
					foreach ($bannerSliderItems as $item): 
					?>
						<div class="swiper-slide">
							<a href="<?=$item->link?>" class="cm-main-keyvisual__img"><img src="<?= getAttachImageURL('sliders', $item, 'file_image'); ?>" alt="" /></a>
							<div class="cm-inner">
								<div class="cm-main-keyvisual__inner">
									<a href="<?=$item->link?>" class="cm-main-keyvisual__title">
										<p><span class="animate">
											<?= nl2br($item->description); ?>
										</span></p>

										<!-- <p><span class="animate">We will lead our company</span></p>
										<p><span class="animate">to become The best magnetic</span></p>
										<p><span class="animate"> in the world</span></p> -->
									</a>
									<div class="cm-main-keyvisual__info" data-aos="fade-up" data-aos-delay="600">
										<div class="cm-main-keyvisual__info-bar"></div>
										<div class="cm-main-keyvisual__info-pagination"><strong><?=sprintf('%02d', $i)?></strong><span>/</span><?=sprintf('%02d', $ct_of_banner)?></div>
										<button>stop</button>
									</div>
								</div>
							</div>
						</div>
					<?php 
						$i++;
					endforeach; 
					?>
					<!-- <div class="swiper-slide">
						<a href="" class="cm-main-keyvisual__img"><img src="https://picsum.photos/1000/1002" alt="" /></a>
						<div class="cm-inner">
							<div class="cm-main-keyvisual__inner">
								<a href="" class="cm-main-keyvisual__title">
									<p><span>We will lead our company</span></p>
									<p><span>to become The best magnetic</span></p>
									<p><span>product supplier in the world</span></p>
								</a>
								<div class="cm-main-keyvisual__info">
									<div class="cm-main-keyvisual__info-bar"></div>
									<div class="cm-main-keyvisual__info-pagination"><strong>02</strong><span>/</span>04</div>
									<button>stop</button>
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<a href="" class="cm-main-keyvisual__img"><img src="https://picsum.photos/1000/1003" alt="" /></a>
						<div class="cm-inner">
							<div class="cm-main-keyvisual__inner">
								<a href="" class="cm-main-keyvisual__title">
									<p><span>We will lead our company</span></p>
									<p><span>to become The best magnetic</span></p>
									<p><span>product supplier in the world</span></p>
								</a>
								<div class="cm-main-keyvisual__info">
									<div class="cm-main-keyvisual__info-bar"></div>
									<div class="cm-main-keyvisual__info-pagination"><strong>03</strong><span>/</span>04</div>
									<button>stop</button>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			<script>
				var swiperKeyvisual = new Swiper('.cm-main-keyvisual .swiper', {
					effect: 'fade',
					autoplay: {
						delay: 4000,
						disableOnInteraction: false,
					},
					loop: true,
					on: {
						init: function () {
							$('.cm-main-keyvisual__info-bar').removeClass('animate');
							$('.swiper-slide-active .cm-main-keyvisual__info-bar').addClass('animate');
						},
						slideChangeTransitionStart: function (i) {
							$('.cm-main-keyvisual__info-bar').removeClass('animate');
							$('.swiper-slide-active .cm-main-keyvisual__info-bar').addClass('animate');

							$('.cm-main-keyvisual__title p span').removeClass('animate');
							$('.swiper-slide-active .cm-main-keyvisual__title p span').addClass('animate');
						},
					},
				});
				$('.cm-main-keyvisual__info button').on('click', function () {
					$(this).toggleClass('stop');
					if ($(this).hasClass('stop')) {
						swiperKeyvisual.autoplay.stop();
						$('.cm-main-keyvisual__info-bar').removeClass('animate');
					} else {
						swiperKeyvisual.autoplay.start();
						$('.swiper-slide-active .cm-main-keyvisual__info-bar').addClass('animate');
					}
				});
			</script>
		</div>

		<div class="cm-main-products">
			<div class="cm-inner">
				<h2 class="cm-main-products__title" data-aos="fade-up">Products</h2>
				<div class="cm-main-products__list" data-aos="fade-up">
					<div class="swiper">
						<div class="swiper-wrapper">

							<?php foreach ($productCategories as $product_category): ?>

								<div class="swiper-slide">
									<a href="<?= langBaseUrl('products/' . $product_category->slug); ?>" class="cm-main-products-item">
										<div class="cm-main-products-item__thumb">
											<img src="../assets/images/main/product-<?=$product_category->slug?>.png" alt="" />
										</div>
										<h3 class="cm-main-products-item__title"><?= esc($product_category->title); ?></h3>
										<div class="cm-main-products-item__text">
											<?= esc($product_category->{'description_'.selectedLangId()}); ?>
										</div>
										<div class="cm-main-products-item__link"><span><?=trans('see_details')?></span></div>
									</a>
								</div>

							<?php endforeach; ?>

						</div>
					</div>
				</div>
				<script>
					var swiperProducts = new Swiper('.cm-main-products .swiper', {
						slidesPerView: 'auto',
						spaceBetween: 20,
						//freeMode: true,
					});
				</script>
			</div>
		</div>
		<div class="cm-main-service">
			<div class="cm-inner">
				<div class="cm-main-service__head">
					<h2 class="cm-main-service__title" data-aos="fade-up">E-Service</h2>
					<div class="cm-main-service__text" data-aos="fade-up"><?=trans('intro_eservice_title')?></div>
					<div class="cm-main-service__more" data-aos="fade-up">
						<a href="/e-service" class="cm-button"><span><?=trans('read_more')?></span></a>
					</div>
				</div>
				<div class="cm-main-service__list">
					<div class="swiper">
						<div class="swiper-wrapper">

							<?php foreach ($newsSliderPosts as $item): ?>

								<div class="swiper-slide">
									<a href="<?= generateUrl('e-service/all/' . $item->id) ?>" class="cm-main-service-item zcm-main-service-item--play" data-aos="fade-up" data-aos-delay="100">
										<div class="cm-main-service-item__thumb">
											<img src="<?= getAttachImageURL('posts', $item, 'file_image'); ?>" alt="" />
										</div>
										<div class="cm-main-service-item__text"><?= esc(characterLimiter($item->title, 56, '...')); ?></div>
									</a>
								</div>

							<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>
			<script>
				var swiperService = new Swiper('.cm-main-service .swiper', {
					loop: true,
					slidesPerView: 'auto',
					spaceBetween: 20,
					//freeMode: true,
					centeredSlides: true,
					breakpoints: {
						992: {
							loop: false,
							spaceBetween: 24,
						},
					},
				});
			</script>
		</div>
		<div class="cm-main-applications">
			<div class="cm-inner">
				<div class="swiper">
					<div class="swiper-wrapper">

						<!--
						<?php 
						foreach ($applicationCategories AS $item) : 
						?>

						<div class="swiper-slide">
							<div class="cm-main-applications__info">
								<h2 class="cm-main-applications__title">Applications</h2>
								<div class="cm-main-applications__text">
									<strong> <?=$item->title?> </strong>
									<p>
										<?=$item->description_1?>
									</p>
								</div>
								<div class="cm-main-applications__chip">
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Tuner</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">USB, HDMI</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">LAN</a><br />
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">SMPS</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Sound</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">T-Con</a><br />
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">DC-DC Converter</a>
								</div>
							</div>
							<div class="cm-main-applications__thumb">
								<img src="../assets/images/main/applications01.jpg" alt="" />
							</div>
						</div>

						
						<?php 
						endforeach; 
						?>
						-->

						<div class="swiper-slide">
							<div class="cm-main-applications__info">
								<h2 class="cm-main-applications__title">Applications</h2>
								<div class="cm-main-applications__text">
									<strong> TV </strong>
									<p>
										Search CoilMaster products for<br />
										TV application.
									</p>
								</div>
								<div class="cm-main-applications__chip">
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Tuner</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">USB, HDMI</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">LAN</a><br />
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">SMPS</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Sound</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">T-Con</a><br />
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">DC-DC Converter</a>
								</div>
							</div>
							<div class="cm-main-applications__thumb">
								<img src="../assets/images/main/applications01.jpg" alt="" />
							</div>
						</div>
						<div class="swiper-slide">
							<div class="cm-main-applications__info">
								<h2 class="cm-main-applications__title" data-aos="fade-up">Applications</h2>
								<div class="cm-main-applications__text" data-aos="fade-up">
									<strong>
										Smart phone<br />
										& Tablet
									</strong>
									<p>
										Search CoilMaster products for<br />
										Smart phone & Tablet PC application.
									</p>
								</div>
								<div class="cm-main-applications__chip" data-aos="fade-up">
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">RF Circuit</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Display</a><br />
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Camera Module</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Power Management</a>
								</div>
							</div>
							<div class="cm-main-applications__thumb" data-aos="fade-up">
								<img src="../assets/images/main/applications02.jpg" alt="" />
							</div>
						</div>
						<div class="swiper-slide">
							<div class="cm-main-applications__info">
								<h2 class="cm-main-applications__title">Applications</h2>
								<div class="cm-main-applications__text">
									<strong> Automotive </strong>
									<p>
										Search CoilMaster products for<br />
										Automotive application.
									</p>
								</div>
								<div class="cm-main-applications__chip">
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">ANV</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Ethernet, CAN-BUS and Flex-Ray</a><br />
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">LED Head lamp</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Sound</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">BMS</a><br />
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Ultrasonic Distance measuring</a><br />
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">RKE, PKE, TPMS</a>
									<a href="<?= langBaseUrl('applications'); ?>" class="cm-chip">Engine ECU, Motor</a>
								</div>
							</div>
							<div class="cm-main-applications__thumb">
								<img src="../assets/images/main/applications03.jpg" alt="" />
							</div>
						</div>
					</div>
					<div class="swiper-button-next" data-aos="fade-up"></div>
					<div class="swiper-button-prev" data-aos="fade-up"></div>
				</div>
				<div class="cm-main-applications__nav">
					<p data-aos="fade-left">

						<!-- 
						<?php 
							$i = 0;

							foreach ($applicationCategories AS $item) : 

								$T_class = $i == 1 ? 'zactive' : '';
						?>
						
							<a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(<?=$i?>)" class="<?=$T_class?>"><?=$item->title?></a>

						<?php 
							$i++;
						endforeach; 
						?>	 
						-->

						<a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(0)">TV</a>
						<a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(1)" class="active">Smartphone & Tablet</a>
						<a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(2)">Automotive</a>
					</p>
				</div>
			</div>
			<script>
				var swiperApplications = new Swiper('.cm-main-applications .swiper', {
					effect: 'fade',
					// autoplay: {
					// 	delay: 4000,
					// 	disableOnInteraction: false,
					// },
					autoHeight: true,
					initialSlide: 1,
					loop: true,
					navigation: {
						nextEl: '.cm-main-applications .swiper-button-next',
						prevEl: '.cm-main-applications .swiper-button-prev',
					},
					on: {
						init: function () {},
						slideChangeTransitionStart: function (i) {
							$('.cm-main-applications__nav p a').removeClass('active');
							$('.cm-main-applications__nav p a:eq(' + i.realIndex + ')').addClass('active');

							if (i.realIndex === 0) {
								$('.cm-main-applications__nav p').html(
									'<a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(2)">Automotive</a><a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(0)" class="active">TV</a><a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(1)">Smartphone & Tablet</a>'
								);
							}
							if (i.realIndex === 1) {
								$('.cm-main-applications__nav p').html(
									'<a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(0)">TV</a><a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(1)" class="active">Smartphone & Tablet</a><a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(2)">Automotive</a>'
								);
							}
							if (i.realIndex === 2) {
								$('.cm-main-applications__nav p').html(
									'<a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(1)">Smartphone & Tablet</a><a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(2)"  class="active">Automotive</a><a href="javascript:void(0)" onclick="swiperApplications.slideToLoop(0)">TV</a>'
								);
							}
						},
					},
				});
			</script>
		</div>
		<div class="cm-main-globalnetwork">
			<div class="cm-inner">
				<h2 class="cm-main-globalnetwork__title" data-aos="fade-up">Global Network</h2>
				<div class="cm-main-globalnetwork__text" data-aos="fade-up">
					<?=trans('global_network')?>
				</div>
				<div class="cm-main-globalnetwork-map" data-aos="fade-up">
					<a href="/location" class="cm-main-globalnetwork-map__item europe" data-aos="fade-left">
						<div class="line"><span></span></div>
						<strong>EUROPE</strong>
						<p>Hungary Sales Office</p>
					</a>
					<a href="/location" class="cm-main-globalnetwork-map__item china" data-aos="fade-left">
						<div class="line"><span></span></div>
						<strong>CHINA</strong>
						<p>
							Wendeng China Factory<br />
							China Sales Office<br />
							Zhaoqing China Factory
						</p>
					</a>
					<a href="/location" class="cm-main-globalnetwork-map__item thailand" data-aos="fade-left">
						<div class="line"><span></span></div>
						<strong>THAILAND</strong>
						<p>Thailand Factory</p>
					</a>
					<a href="/location" class="cm-main-globalnetwork-map__item korea" data-aos="fade-left">
						<div class="line"><span></span></div>
						<strong>KOREA</strong>
						<p>
							Iksan Head Office<br />
							Ilsan Sales Office<br />
							Suwon Sales Office
						</p>
					</a>
					<a href="/location" class="cm-main-globalnetwork-map__item hongkong" data-aos="fade-left">
						<div class="line"><span></span></div>
						<strong>HONGKONG</strong>
						<p>H.K Sales Office</p>
					</a>
					<a href="/location" class="cm-main-globalnetwork-map__item usa" data-aos="fade-left">
						<div class="line"><span></span></div>
						<strong>USA</strong>
						<p>Los Angeles Sales Office</p>
					</a>
				</div>
				<a href="/location" class="cm-main-globalnetwork__info" data-aos="fade-up">
					<dl>
						<dt>KOREA</dt>
						<dd>
							Iksan Head Office<br />
							Ilsan Sales Office<br />
							Suwon Sales Office
						</dd>
					</dl>
					<dl>
						<dt>CHINA</dt>
						<dd>
							Wendeng China Factory<br />
							China Sales Office<br />
							Zhaoqing China Factory
						</dd>
					</dl>
					<dl>
						<dt>USA</dt>
						<dd>Los Angeles Sales Office</dd>
					</dl>
					<dl>
						<dt>EUROPE</dt>
						<dd>Hungary Sales Office</dd>
					</dl>
					<dl>
						<dt>THAILAND</dt>
						<dd>Thailand Factory</dd>
					</dl>
					<dl>
						<dt>HONGKONG</dt>
						<dd>H.K Sales Office</dd>
					</dl>
				</a>
			</div>
			<script>
				$('.cm-main-globalnetwork-map__item').hover(
					function () {
						// over
						$('.cm-main-globalnetwork-map__item').removeClass('none');
						$('.cm-main-globalnetwork-map__item').removeClass('active');
						$('.cm-main-globalnetwork-map__item').addClass('none');
						$(this).addClass('active');
					},
					function () {
						// out
						$('.cm-main-globalnetwork-map__item').removeClass('none');
						$('.cm-main-globalnetwork-map__item').removeClass('active');
					}
				);
			</script>
		</div>
		<div class="cm-main-history">
			<h2 class="cm-main-history__title" data-aos="fade-up">
				<div class="cm-inner">
					<?=trans('intro_history_title')?>
				</div>
			</h2>
			<div class="cm-main-history__text">
				<div class="cm-inner">
					<div class="cm-main-history-item item01 active">
						<div class="cm-inner">
							<div class="cm-main-history-item__year" data-aos="fade-up">1996</div>
							<div class="cm-main-history-item__title" data-aos="fade-up">Established</div>
							<div class="cm-main-history-item__text" data-aos="fade-up">
								<?=trans('intro_history_text_1')?>
							</div>
							<a href="<?= langBaseUrl('news'); ?>" class="cm-main-history-item__more" data-aos="fade-up"> <span>See Details</span> </a>
						</div>
					</div>
					<div class="cm-main-history-item item02">
						<div class="cm-inner">
							<div class="cm-main-history-item__year" data-aos="fade-up">11</div>
							<div class="cm-main-history-item__title" data-aos="fade-up">Global Office</div>
							<div class="cm-main-history-item__text" data-aos="fade-up">
								<?=trans('intro_history_text_2')?>
							</div>
							<a href="<?= langBaseUrl('news'); ?>" class="cm-main-history-item__more" data-aos="fade-up"> <span>See Details</span> </a>
						</div>
					</div>
					<div class="cm-main-history-item item03">
						<div class="cm-inner">
							<div class="cm-main-history-item__year" data-aos="fade-up">500</div>
							<div class="cm-main-history-item__title" data-aos="fade-up">Technology Fast</div>
							<div class="cm-main-history-item__text" data-aos="fade-up">
								<?=trans('intro_history_text_3')?>
							</div>
							<a href="<?= langBaseUrl('news'); ?>" class="cm-main-history-item__more" data-aos="fade-up"> <span>See Details</span> </a>
						</div>
					</div>
					<div class="cm-main-history-item__bar" data-aos="fade-up">
						<em>1</em>
						<p><span></span></p>
						3
					</div>
				</div>
			</div>

			<div class="cm-main-history__cover"></div>
			<script>
				gsap.to($('.cm-main-history__cover'), {
					scrollTrigger: {
						trigger: $('.cm-main-history'),
						start: '0',
						end: '+=2000',
						//markers: true,
						toggleActions: 'play pause reverse pause',
						scrub: 3,
						pin: true,
						invalidateOnRefresh: true,
						pinSpacing: true,
						anticipatePin: 1,
						///onEnter: randomToFixed(),
						onUpdate: function (self) {
							var progress = self.progress;
							var rangeStart = 1;
							var rangeEnd = 100;
							var value = rangeStart + (rangeEnd - rangeStart) * progress;

							if (value < 30) {
								$('.cm-main-history-item__bar em').text('1');
								$('.cm-main-history-item').removeClass('active');
								$('.cm-main-history-item.item01').addClass('active');
							}
							if (value > 30) {
								$('.cm-main-history-item__bar em').text('2');
								$('.cm-main-history-item').removeClass('active');
								$('.cm-main-history-item.item02').addClass('active');
							}
							if (value > 50) {
								$('.cm-main-history-item__bar em').text('3');
								$('.cm-main-history-item').removeClass('active');
								$('.cm-main-history-item.item03').addClass('active');
							}
							$('.cm-main-history-item__bar span').css('width', value + '%');
						},
					},
					xPercent: +0,
					x: () => innerWidth,
					ease: 'none',
				});
			</script>
		</div>
	</div>
</div>

<style>
	.cm-footer {
		margin: 0;
	}
</style>
