<div id="cm-body" class="cm-body">

	<?= view("_partials/_breadcrumb"); ?>

	<div class="cm-inner">
		<div class="cm-applications-tab">
			<div class="pc">

				<?php 
				$index = 1;

				foreach ($applicationCategories as $applicaiton_category): 

					if ($index == 1 || $index == 5) { 
						echo '<div class="cm-applications-tab__col">';
					}

					$T_class = $applicaiton_category->id == $category->id ? 'active' : '';
					// if ($applicaiton_category->id == $category->id) { $active_index = $index; }
				?>
					<a class="<?=$T_class?>" href="<?= langBaseUrl('applications/' . $applicaiton_category->slug); ?>">
						<?= html_entity_decode($applicaiton_category->title_with_tag) ?>
					</a>
				<?php 
				$index++; 

				if ($index == 5 || $index == 10) { 
					echo '</div>';
				}
				

				endforeach; 
				?>

			</div>

			<div class="mo">
				<div class="cm-applications-tab__select">
					<select name="" id="cm-applications-tab__select">
						<option value="/applications/smartphone-tablet-pc" selected>Smartphone &amp; Tablet PC</option>
						<option value="/applications/tv">TV</option>
						<option value="/applications/ddr5">DDR5</option>
						<option value="/applications/voltage-regulator-module">VRM (Voltage Regulator Module)</option>
						<option value="/applications/automotive-infotainment">Automotive Infotainment</option>
						<option value="/applications/automotive-lighting">Automotive Lighting</option>
						<option value="/applications/automotive-driving">Automotive Driving</option>
						<option value="/applications/automotive-xev">Automotive xEv</option>
						<option value="/applications/automotive-network">Automotive Network</option>
					</select>
				</div>
				<div class="cm-applications-tab__zoom">
					<a href="javascript:void(0)">Zoom In</a>
				</div>
				<script>
					$('#cm-applications-tab__select').on('change', function () {
						var selectedValue = $(this).val();

						if (selectedValue !== '') {
							window.location.href = selectedValue;
						}
					});
					$('.cm-applications-tab__zoom a').on('click', function () {
						$('.cm-applications-viewer').toggleClass('active');
						$('.cm-applications-tab__zoom').toggleClass('active');
					});
					$(document).ready(function () {
						function adjustScale() {
							var windowWidth = $(window).width();
							if (windowWidth < 992) {
								var scaleValue = (windowWidth * 0.7) / 1000;
								var heightValue = windowWidth * 0.45;

								$('.cm-applications-viewer__inner').css('transform', 'scale(' + scaleValue + ')');
								$('.cm-applications-viewer').css('height', heightValue + 'px');
							}
							if (windowWidth > 992) {
								$('.cm-applications-viewer').css('height', heightValue + 'px');
							}
						}

						adjustScale();
						$(window).resize(adjustScale);
					});
				</script>
			</div>
		</div>
	</div>


	
	<div class="cm-applications-viewer">
		<div class="cm-inner">
			<div class="cm-applications-viewer__img <?=$category->slug?>">
				<div class="cm-applications-viewer__inner">
					<img src="/assets/images/applications/<?=$category->slug?>.jpg" alt="" />

					<?php
					$i = 0;
					$k = 1;
					foreach ($applicationSubCategories as $key => $application_sub_category) :
						$T_class = isset($sub_category) && @$application_sub_category->is_active ? '' : 'disabled';
						$T_class_name = $application_sub_category->class_name ? $application_sub_category->class_name : '';

						if ( $application_sub_category->is_group) {
							echo '<a href="" class="link-group link-group0'.$k.'">';
							echo $application_sub_category->link_group;

							$k++;
						}
						else {
							echo '<a href="'. langBaseUrl('applications/' . $category->slug . '/' . $application_sub_category->slug) .'#a_p_l" class="'.$application_sub_category->slug.' '.$T_class.' '.$T_class_name.'"><span>'.$application_sub_category->title_with_tag.'</span></a>';
						}
						$i++;
					endforeach;

					?>

					<?php 
					if ($category->slug == 'smartphone-tablet-pc') { 
						echo '
							<a href="" class="link02 disabled"><span>Base Band</span></a>
							<a href="" class="link09 disabled"><span>Audio</span></a>
						';
					}
					else if ($category->slug == 'ddr5') { 
						echo '
							<a href="" class="link01 disabled"><span>VIN</span></a>
							<a href="" class="link02 disabled"><span>SCL</span></a>
							<a href="" class="link03 disabled"><span>SDA</span></a>
							<a href="" class="link04 disabled"><span>I2C/I3C</span></a>
							<a href="" class="link05 disabled"><span>SPD</span></a>
							<a href="" class="link06 disabled"><span>PMIC</span></a>
							<a href="" class="link10 disabled"><span>DRAM-1</span></a>
							<a href="" class="link11 disabled"><span>DRAM-N</span></a>
						';
					}
					else if ($category->slug == 'voltage-regulator-module') { 
						echo '
							<a href="" class="link01 disabled"><span>PSU</span></a>
							<a href="" class="link05 disabled"><span>VRM</span></a>
							<a href="" class="link06 disabled"><span>CPU</span></a>
							<a href="" class="link07 disabled"><span>GPU</span></a>
							<a href="" class="link08 disabled"><span>VRAM</span></a>
							<a href="" class="link09 disabled"><span>Display</span></a>
							<a href="" class="link10 disabled"><span>HDMI</span></a>
							<a href="" class="link11 disabled"><span>DVI</span></a>						
						';
					}
					else if ($category->slug == 'automotive-infotainment') { 
						echo '
							<a href="" class="link01 disabled"><span>Connectivity</span></a>
							<a href="" class="link02 disabled"><span>View Camera ECU</span></a>
							<a href="" class="link03 disabled"><span>ADAS ECU</span></a>
							<a href="" class="link11 disabled"><span>Memory</span></a>
							<a href="" class="link12 disabled"><span>Audio</span></a>
							<a href="" class="link13 disabled"><span>Display</span></a>
						';
					}
					else if ($category->slug == 'automotive-lighting') { 
						echo '
							<a href="" class="link01 disabled"><span>VBat</span></a>
							<a href="" class="link12 disabled"><span>DRL</span></a>
							<a href="" class="link13 disabled"><span>Headlight<br />Matrix</span></a>
						';
					}
					else if ($category->slug == 'automotive-driving') { 
						echo '
						<a href="" class="link01 disabled"><span>VBat</span></a>
						<a href="" class="link03 disabled"><span>Memory</span></a>
						';
					}
					else if ($category->slug == 'automotive-xev') { 
						echo '

						<a href="" class="link01 disabled"><span>AC Charger</span></a>
						<a href="" class="link03 disabled"><span style="font-weight: 500">Inverter Module<br />DC/AC</span></a>
						<a href="" class="link04 disabled"><span style="font-weight: 500">Motor</span></a>
						<a href="" class="link06 disabled"><span style="font-weight: 500">High Voltage<br />Battery</span></a>
						<a href="" class="link09 disabled"><span style="font-weight: 500">Low Voltage<br />Battery 12V</span></a>

						<!--
						<a href="" class="link02"><span>On Board Charger</span></a>
						<a href="" class="link05"><span>DC Charger<br /><span style="font-weight: 400">Off Board Charger</span></span></a>
						<a href="" class="link07"><span>Battery<br />Management<br />System</span></a>
						<a href="" class="link08"><span>High to Low<br />DC/DC<br />Converter</span></a>
						-->
						';
					}
					else if ($category->slug == 'automotive-network') { 
						echo '
							<a href="" class="link01 disabled"><span>System Basis Chip</span></a>
							<a href="" class="link04 disabled"><span>LIN Interface</span></a>
							<a href="" class="link07 disabled"><span>MOST MLB<br />Transceiver</span></a>
						';
					}
					?>
						
				</div>
			</div>
		</div>
	</div>
	
		

	<?php if ($products) { ?>
	<div class="cm-inner" id="a_p_l">
		<?php 
			echo view($page['menu'] . '/_lists');
		?>
		<br />
	</div>
	<?php } ?>

	<script>
		$(document).ready(function () {
			$('.open-inquiry').on('click', function () {
				$('html').addClass('mode-modal');
				$('.cm-inquiry').addClass('active');

				var product_id = 0;
				var product_title = $(this).data("product_title");
				var inquiry_from = 'application';
				
				$("#product_id").val(product_id);
				$("#product_title").val(product_title);
				$("#inquiry_from").val(inquiry_from);
			});
			$('.cm-inquiry__close,.cm-inquiry__bg').on('click', function () {
				$('html').removeClass('mode-modal');
				$('.cm-inquiry').removeClass('active');
				$('.cm-inquiry-form').removeClass('complete');
			});
			$(document).keyup(function (e) {
				if (e.key === 'Escape') {
					$('html').removeClass('mode-modal');
					$('.cm-inquiry').removeClass('active');
					$('.cm-inquiry-form').removeClass('complete');
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

<script>
	// 스크롤 이벤트를 감지하는 함수
	function handleScroll() {
		var targetElement;
		var windowWidth = window.innerWidth;
		var headerHeight = $('.cm-header').outerHeight();

		if (windowWidth > 992) {
			targetElement = document.querySelector('.cm-products-table');
		}
		if (windowWidth < 992) {
			targetElement = document.querySelector('.cm-footer');
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
</script>


<script>
		function setZoomLevel() {
			var windowWidth = window.innerWidth;
			var minSize = 1480;
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

	<style>

@media screen and (max-width: 1480px) {
  .cm-body .cm-inner {
    width: 100%;
		overflow: hidden;
  }
}
	</style>