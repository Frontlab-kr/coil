<div id="cm-body" class="cm-body">

	<?= view("_partials/_breadcrumb"); ?>

	<div class="cm-faq">
		<div class="cm-inner">
			<div class="cm-tab">
				<div class="swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide <?= !($page['slug']) ? 'active' : '';?>">
							<a href="<?=langBaseUrl('faq')?>"><?=trans('all')?></a>
						</div>

						<?php if (!empty($faqCategories)) :
							foreach ($faqCategories as $item) : 

								$T_class = $item->slug == $page['slug'] ? 'active' : '';
						?>

						<div class="swiper-slide <?=$T_class?>">
							<a href="<?= langBaseUrl('faq/' . esc($item->slug)) ?>"><?=esc($item->title)?></a>
						</div>

						<?php 
							endforeach; 
						endif; 
						?>
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
				}, 100);
				</script>
			</div>
			<div class="cm-accordion">

				<?php 

				$i = $total;
				if (!empty($faqArticles)) :
					foreach ($faqArticles as $item) :
				?>

				<div class="cm-accordion-item">
					<div class="cm-accordion-item__title">
						<a href="javascript:void(0)">
							<strong><?=$i?></strong>
							<p>
								<?= esc($item->title); ?>
							</p>
						</a>
					</div>
					<div class="cm-accordion-item__contents">
						<?= nl2br($item->content); ?>
					</div>
				</div>

				<?php 
						$i--;
					endforeach;
				endif; 
				?>

				<script>
					$('.cm-accordion-item__title a').on('click', function () {
						if ($(this).parents('.cm-accordion-item').hasClass('active')) {
							$('.cm-accordion-item').removeClass('active');
						} else {
							$('.cm-accordion-item').removeClass('active');
							$(this).parents('.cm-accordion-item').addClass('active');
						}
					});
				</script>
			</div>
		</div>
	</div>
</div>		