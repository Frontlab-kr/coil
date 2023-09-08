<!DOCTYPE html>
<html lang="<?= $activeLang->code; ?>">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?= esc($baseSettings->site_title); ?> - <?= esc($page['title']); ?></title>

	<meta name="author" content="<?= esc($baseSettings->site_author); ?>" />
	<meta name="description" content="<?= esc($page['description']); ?>" />
	<meta name="keywords" content="<?= esc($page['keywords']); ?>" />
	<link rel="shortcut icon" href="/assets/images/favicon.ico"/>
	<link rel="icon" href="/assets/images/favicon.ico"/>

	<?php if (isset($page['showOgTags'])) : ?>
	<meta property="og:type" content="<?= !empty($page['ogType']) ? $page['ogType'] : 'website'; ?>" />
	<meta property="og:title" content="<?= !empty($page['ogTitle']) ? $page['ogTitle'] : 'index'; ?>" />
	<meta property="og:description" content="<?= $page['ogDescription']; ?>" />
	<meta property="og:url" content="<?= $page['ogUrl']; ?>" />
	<meta property="og:image" content="<?= $page['ogImage']; ?>" />
	<?php else : ?>
	<meta property="og:title" content="<?= esc($baseSettings->site_title); ?> - <?= esc($page['title']); ?>" />
	<meta property="og:description" content="<?= esc($page['description']); ?>" />
	<meta property="og:url" content="<?= base_url(); ?>" />
	<meta property="og:image" content="<?=base_url()?>/assets/images/logo.png" />
	<?php endif; ?>

	<link rel="canonical" href="<?= getCurrentUrl(); ?>" />
	<?= csrf_meta(); ?>

	<?php foreach ($activeLanguages as $language) : ?>
	<link rel="alternate" href="<?= convertUrlByLanguage($language); ?>" hreflang="<?= esc($language->code); ?>" />
	<?php endforeach; ?>


	<!-- default -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
		integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="<?= base_url('assets/css/common.css') ?>?v=5" />
	<link rel="stylesheet" href="<?= base_url('assets/css/plugins.css'); ?>?v=5" />
	<link rel="stylesheet" href="<?= base_url('assets/css/lab.css') ?>?v=5" />
	<script>var MdsConfig = {baseURL: '<?= base_url(); ?>', langBaseURL: "<?= langBaseUrl(); ?>", sysLangId: "<?= $activeLang->id; ?>", csrfTokenName: '<?= csrf_token() ?>', csrfCookieName: '<?= config('App')->CSRFCookieName; ?>', d: "<?= clrQuotes(trans("no_results_found")); ?>", textOk: "<?= clrQuotes(trans("ok")); ?>", textCancel: "<?= clrQuotes(trans("cancel")); ?>"};</script>


	<!-- SmoothScroll -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"
		integrity="sha512-HaoDYc3PGduguBWOSToNc0AWGHBi2Y432Ssp3wNIdlOzrunCtB2qq6FrhtPbo+PlbvRbyi86dr5VQx61eg/daQ=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>

	<!-- skrollr -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"
		integrity="sha512-A2+khatRDWHUE2VUtN4xUTkr1nc4YfDBw9Sg3ea6x0aRPfpcYieDZji4D2edDHy/yF5NsYzP7kL8sSM8s5EqCw=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>


	<!-- swiper -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.min.js"
		integrity="sha512-3Ei7OPFo83kw3cPbDLeLhn/YF8tZB7Vs8sfli0B/KEekureL5eosDeshYFICCvt4K8i0yUil/lK3cSiic2Wjkg=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.4.1/swiper-bundle.css"
		integrity="sha512-Aeqz1zfbRIQHDPsvEobXzaeXDyh8CUqRdvy6QBCQEbxIc/vazrTdpjEufMbxSW61+7a5vIDDuGh8z5IekVG0YA=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer" />

	<!-- gsap -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"
		integrity="sha512-GQ5/eIhs41UXpG6fGo4xQBpwSEj9RrBvMuKyE2h/2vw3a9x85T1Bt0JglOUVJJLeyIUl/S/kCdDXlE/n7zCjIg=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"
		integrity="sha512-6BvDODEWgjWWyBrg6YFio6xmzgKWpf54tDlnCtG05m++/jgh/7jQcx6jUJrq44lB84cf68FzYiT0LipabA5g8g=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>

	<!-- aos -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
		integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"></script>
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
		integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer" />


	<script>
		function setZoomLevel() {
			var windowWidth = window.innerWidth;
			var minSize = 993;
			var maxSize = 1480;
			var minFontSize = 66;
			var maxFontSize = 100;

			if (windowWidth >= minSize && windowWidth <= maxSize) {
				var percentage = (windowWidth - minSize) / (maxSize - minSize);
				var fontSize = minFontSize + (maxFontSize - minFontSize) * percentage;
				var result = (fontSize / 100) * 6.25;
				document.documentElement.style.setProperty('--font-size', result + '%');
				console.log(result);
			}
			if (windowWidth <= minSize) {
				document.documentElement.style.setProperty('--font-size', '6.25%');
			}
		}

		$(window).on('resize', function () {
			setZoomLevel();
		});
		$(document).ready(function () {
			AOS.init();
			setZoomLevel();
		});
	</script>

</head>

<body>
	<div class="cm">
		<div class="cm-skip">
			<a href="">본문영역 바로가기</a>
		</div>
		<header id="cm-header" class="cm-header">
			<div class="cm-inner">
				<div class="cm-header__logo"><a href="<?= langBaseUrl(); ?>">CoilMaster</a></div>
				<nav class="cm-header-gnb">
					<a href="javascript:void(0)" class="cm-header-gnb__open">메뉴 열기</a>
					<a href="javascript:void(0)" class="cm-header-gnb__close">메뉴 닫기</a>
					<div class="cm-header-gnb__layer">
						<div class="cm-header-gnb__layer-logo"><a href="<?= langBaseUrl(); ?>">CoilMaster</a></div>
						<ul>

							<?php
							foreach ($allMenus as $menus => $menu) :
								$T_class = $menu['slug'] == $page['menu'] ? 'active' : '';
								if ($menu['is_gnb']) {
									?>

									<li class="<?= $T_class ?>">
										<a href="<?= langBaseUrl($menu['slug']) ?>"><?= $menu['title'] ?></a>
										<ul>

											<?php
											foreach ($menu['section'] as $sections => $section) :

												if ($section['is_gnb']) {

													$T_class = $sections == $page['section'] ? 'active' : '';
													$T_link  = $menu['slug'] == 'products' || $menu['slug'] == 'applications' ? "{$menu['slug']}/$sections" : $sections;
													?>

													<li class="<?= $T_class ?>"><a
															href="<?= langBaseUrl($T_link) ?>"><?= $section['title'] ?></a></li>

												<?php
												}
											endforeach;
											?>

										</ul>

									<?php
								}
							endforeach;
							?>

						</ul>
						<div class="cm-header-lang">
							<div class="cm-header-lang__select">
								<strong><a href="javascript:void(0)">
										<?= esc($activeLang->description); ?>
									</a></strong>
								<ul>
									<?php foreach ($activeLanguages as $language) : ?>
										<li class="<?= $language->id == $activeLang->id ? 'active' : ''; ?>"><a
												href="<?= convertUrlByLanguage($language); ?>"><?= esc($language->description); ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
							<address>Copylight © 2023 Coilmaster. All Rights Reserved.</address>
							<script>
								$('.cm-header-lang__select').on('click', function () {
									$('.cm-header-lang__select').toggleClass('active');
								});
								$(document).on('click', function (e) {
									var target = $(e.target);
									if (target.is('.cm-header-lang__select strong a')) {
										return;
									}
									$('.cm-header-lang__select').removeClass('active');
								});
								$(document).keyup(function (e) {
									if (e.key === 'Escape') {
										$('.cm-header-lang__select').removeClass('active');
									}
								});
							</script>
						</div>
					</div>
					<script>
						$('.cm-header-gnb__open').on('click', function () {
							$('html').addClass('mode-gnb');
						});
						$('.cm-header-gnb__close').on('click', function () {
							$('html').removeClass('mode-gnb');
						});
						$('.cm-header-gnb__layer > ul > li > a').on('click', function () {
							var windowWidth = $(window).width();
							if (windowWidth >= 992) {
							} else {
								$('.cm-header-gnb__layer > ul > li').removeClass('active');
								$(this).parents('li').addClass('active');
								return false;
							}
						});
						$(document).keyup(function (e) {
							if (e.key === 'Escape') {
								$('html').removeClass('mode-gnb');
							}
						});
					</script>
				</nav>
				<div class="cm-header-search">
					<a href="javascript:void(0)" class="cm-header-search__open">검색 열기</a>
					<div class="cm-header-search__layer">
						<div class="cm-inner">
							<a href="javascript:void(0)" class="cm-header-search__close">검색 닫기</a>
							<div class="cm-header-search__form">
								<form action="<?= langBaseUrl('search'); ?>" method="get" id="theSearchForm">
									<?= csrf_field(); ?>
									<input type="text" id="input_search_mobile" name="q" maxlength="50"
										placeholder="<?= trans("search_placeholder"); ?>" />
									<button type="submit" class="btn-search">검색</button>
								</form>
							</div>
						</div>
					</div>

					<script>
						// $(document).ready(function () {
						// 	$('#theSearchForm, #theSearchFormInline').submit(function (event) {
						// 		var inputValue =  $('input[name="q"]').val();

						// 		if (inputValue.length < 2) {
						// 			event.preventDefault(); // Prevent form submission
						// 			alert('Please enter at least 2 characters.');
						// 		}
						// 	});
						// });
					</script>

					<script>
						$('.cm-header-search__open,.cm-header-search__close').on('click', function () {
							$('html').toggleClass('mode-search');
						});
						$(document).keyup(function (e) {
							if (e.key === 'Escape') {
								$('html').removeClass('mode-search');
							}
						});
					</script>
				</div>
			</div>
			<script>
				$(window).on('resize', function () {
					var windowWidth = $(window).width();
					if (windowWidth >= 992) {
						$('html').removeClass('mode-gnb');
						$('html').removeClass('mode-search');
					} else {
					}
				});
			</script>
		</header>
