<div id="cm-body" class="cm-body">

	<?= view("_partials/_breadcrumb"); ?>

	<div class="cm-products">
		<div class="cm-inner">
			<div class="cm-tab">
				<div class="swiper">
					<div class="swiper-wrapper">

					<?php 
					foreach ($productCategories as $product_category): 
						$T_class = $product_category->id == $category->id ? 'active' : '';
					?>
						<div class="swiper-slide <?=$T_class?>">
							<a href="<?= langBaseUrl('products/' . $product_category->slug); ?>"><?= esc($product_category->title); ?></a>
						</div>
					<?php endforeach; ?>

					</div>
				</div>
				
				<script>
					setTimeout(() => {
						var swiperTab = new Swiper('.cm-tab .swiper', {
							slidesPerView: 'auto',
							spaceBetween: 30,
							breakpoints: {
								992: {
									spaceBetween: 40,
								},
							},
						});
						swiperTab.slideTo(3);
					}, 100);
				</script>
			</div>

			<div class="cm-products__text">
				<?=$category->{'description_'.selectedLangId()} ?>
			</div>
		</div>
		<div class="cm-products-lineup">
			<div class="cm-inner">
				<h3 class="cm-products-lineup__title">Product Lineup</h3>
				<div class="cm-products-lineup__list">
					<?php
					$i = 0;
					foreach ($sub_categories as $key => $category) :
						$T_class = $i ==0 ? 'active' : '';
						echo '<a href="#'.$category->slug.'" class="'.$T_class.'">'.$category->title.'</a>';
						$i++;
					endforeach;
					?>
				</div>
			</div>
			<script>
				$('.cm-products-lineup__list a ').on('click', function () {
					var target = $(this).attr('href');
					var offset = $(target).offset();
					var tabHeight = $('.cm-products-lineup').outerHeight();
					var margin = 40;
					$('html, body').animate({ scrollTop: offset.top - tabHeight - margin }, 400);
					return false;
				});
			</script>
		</div>
		<div class="cm-products-lineup__select">
			<div class="mo">
				<div class="cm-inner">
					<h3 class="cm-products-lineup__title">Product Lineup</h3>
					<select name="" id="">
						<?php
						$i = 0;
						foreach ($sub_categories as $key => $category) :
							$T_class = $i ==0 ? 'selected' : '';
							echo '<option value"'.$category->slug.'">'.$category->title.'</option>';
							$i++;
						endforeach;
						?>
					</select>
				</div>
			</div>
		</div>
		<script>
			// 스크롤 이벤트를 감지하는 함수
			function handleScroll() {
				var targetElement;
				var windowWidth = window.innerWidth;
				var headerHeight = $('.cm-header').outerHeight();

				if (windowWidth > 992) {
					targetElement = document.querySelector('.cm-products-lineup');
				}
				if (windowWidth < 992) {
					targetElement = document.querySelector('.cm-products-lineup__select');
				}
				var targetOffset = targetElement.getBoundingClientRect().top - headerHeight + window.pageYOffset;
				var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

				if (scrollPosition >= targetOffset) {
					$('html').addClass('mode-sticky');
				} else if (scrollPosition <= targetOffset) {
					$('html').removeClass('mode-sticky');
				}
			}

			// 스크롤 이벤트 리스너를 등록합니다
			window.addEventListener('scroll', handleScroll);

			$(document).ready(function () {
				var stickyHeight = $('.cm-products-lineup').outerHeight();
				$('.cm-products-lineup ~ .cm-inner .cm-products-table table thead th').css('top', stickyHeight + 'rem');
			});
		</script>
		
		<div class="cm-inner">
			<div class="cm-products-spotlights">
				<h3 class="cm-products-spotlights__title">Product Spotlights</h3>
				<div class="cm-products-spotlights__list">
					<div class="swiper">
						<div class="swiper-wrapper">

							<!-- LOOP -->
							<?php foreach ($productSpotlight as $item): ?>

								<div class="swiper-slide">
									<a href="<?= generateUrl('e-service/'.$item->categories_slug.'/' . $item->id) ?>" class="cm-main-service-item">
										<div class="cm-main-service-item__thumb">
											<img src="<?= getAttachImageURL('posts', $item, 'file_image'); ?>" alt="" />
										</div>
										<div class="cm-main-service-item__text"><?= esc(characterLimiter($item->title, 56, '...')); ?></div>
									</a>
								</div>

							<?php endforeach; ?>	

						</div>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-pagination"></div>
				</div>
				<script>
					var swiperSpotlights = new Swiper('.cm-products-spotlights .swiper', {
						loop: true,
						slidesPerView: 'auto',
						spaceBetween: 20,
						//freeMode: true,
						centeredSlides: true,
						breakpoints: {
							992: {
								slidesPerView: 4,
								spaceBetween: 24,
								centeredSlides: false,
							},
						},
						navigation: {
							nextEl: '.cm-products-spotlights .swiper-button-next',
							prevEl: '.cm-products-spotlights .swiper-button-prev',
						},
						pagination: {
							el: '.cm-products-spotlights .swiper-pagination',
						},
					});
				</script>
			</div>

			<form action="">
				<div class="cm-products-search-form">
					<!-- SERACH -->
					<?= view($page['menu'] . '/_search_flags'); ?>
				</div>
			</form>

			<!-- LIST LOOP -->
			<?php
			reset($sub_categories);

			foreach ($sub_categories as $key => $sub_category) :
				echo view($page['menu'] . '/_lists', ['sub_category' => $sub_category]);
			endforeach;
			?>

		</div>
	</div>
	<script>
		$(document).ready(function () {
			$('.open-inquiry').on('click', function () {
				$('.cm-inquiry').addClass('active');
			});
			$('.cm-inquiry__close,.cm-inquiry__bg').on('click', function () {
				$('.cm-inquiry').removeClass('active');
			});
			$(document).keyup(function (e) {
				if (e.key === 'Escape') {
					$('.cm-inquiry').removeClass('active');
				}
			});
		});
	</script>

</div>

<div class="cm-inquiry">
	<?= view('_partials/_product_inquiry'); ?>
</div>

<script>
	$(document).ready(function () {

		// Listen for change event on the checkbox
		$('input[name="automotive"]').on('change', function () {
			var isChecked = $(this).is(':checked');
			var currentUrl = window.location.href;

			// Update the URL with the query parameter
			if (isChecked) {
				window.location.href = updateQueryStringParameter(currentUrl, 'automotive', '1');
			} else {
				window.location.href = removeQueryStringParameter(currentUrl, 'automotive');
			}
		});

		// Function to update query string parameter
		function updateQueryStringParameter(url, key, value) {
			var re = new RegExp('([?&])' + key + '=.*?(&|$)', 'i');
			var separator = url.indexOf('?') !== -1 ? '&' : '?';

			if (url.match(re)) {
				return url.replace(re, '$1' + key + '=' + value + '$2');
			} else {
				return url + separator + key + '=' + value;
			}
		}

		// Function to remove query string parameter
		function removeQueryStringParameter(url, key) {
			var re = new RegExp('([?&])' + key + '=.*?(&|$)', 'i');
			var separator = url.indexOf('?') !== -1 ? '&' : '?';

			if (url.match(re)) {
				return url.replace(re, '$1').replace(/(&|\?)$/, '');
			} else {
				return url;
			}
		}
	});
</script>

