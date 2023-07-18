<?php
// $search = cleanStr(inputGet('search'));
// $sort_var = explode("__", cleanStr(inputGet('sort')));


?>

<input type="hidden" name="search" value="<?= esc($search); ?>">

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
								<a href="<?= langBaseUrl('product-search/' . $product_category->slug); ?>"><?= esc($product_category->title); ?></a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<script>
					var swiperTab = new Swiper('.cm-tab .swiper', {
						slidesPerView: 'auto',
						spaceBetween: 30,
						breakpoints: {
							992: {
								spaceBetween: 40,
							},
						},
					});
				</script>
			</div>
		</div>

		<div class="cm-products-search active">
			<div class="cm-inner">
				<form action="">
					<div class="cm-products-search-form">
						<div class="cm-products-search-list">
							<div class="cm-products-search-item">
								<div class="cm-products-search-item__title"><?= trans("category"); ?></div>
								<div class="cm-products-search-item__contents">
									<div class="cm-products-search-item__row">

										<?php foreach ($sub_categories as $item) : ?>

											<div class="cm-products-search-item__col col-4 mo-col-12">
												<a href="<?= current_url() . generateFilterUrl($queryStringArray, 'scategory', $item->id); ?>" rel="nofollow" class="form-check">
													<input class="form-check-input" type="checkbox" value="<?=$item->id?>" for="<?= $item->title ?>_<?= $item->id ?>" <?= isCustomScategoryOptionSelected($queryStringObjectArray, 'scategory', $item->id) ? 'checked' : ''; ?> />
													<label class="form-check-label"> <?= esc($item->title); ?></label>
												</a>
											</div>

										<?php endforeach; ?>

									</div>
								</div>
							</div>

							<?php
							foreach ($customFilters as $customFilter) :

								$items = $filterItems[$customFilter->id];
							?>

								<div class="cm-products-search-item">
									<div class="cm-products-search-item__title"><?=esc($customFilter->title)?></div>
									<div class="cm-products-search-item__contents">
										<div class="cm-products-search-item__row">

											<?php 
											foreach ($items as $item) : 
												if ($customFilter->id == '13' || $customFilter->id == '14') { 
													$T_check_type = "radio";
												}
												else {
													$T_check_type = "checkbox";
												}
											?>

												<div class="cm-products-search-item__col col-2 mo-col-6">
													<a href="<?= current_url() . generateFilterUrl($queryStringArray, $customFilter->product_filter_key, $item->id); ?>" rel="nofollow" class="form-check">
														<input class="form-check-input" type="<?=$T_check_type?>" value="<?=$item->id?>"  for="<?= $customFilter->title ?>_<?= $item->id ?>" <?= isCustomFieldOptionSelected($queryStringObjectArray, $customFilter->product_filter_key, $item->id) ? 'checked' : ''; ?> />
														<label class="form-check-label" id="<?= $customFilter->title ?>_<?= $item->id ?>"> <?= esc($item->title); ?> </label>
													</a>
												</div>

											<?php endforeach; ?>

										</div>
									</div>
								</div>
							
							<?php endforeach; ?>

						</div>

						<div class="pc">
							<div class="cm-products-search-table">
								<table>
									<colgroup>
										<col style="width: 180px" />
										<col style="width: 180px" />
										<col style="width: 180px" />
										<col style="width: 180px" />
										<col style="width: 180px" />
										<col style="width: 180px" />
										<col style="width: 360px" />
									</colgroup>
									<thead>
										<tr>
											<th>Size (L*W) <span>mm</span></th>
											<th>Height Max <span>mm</span></th>
											<th>Inductance <span>uH</span></th>
											<th>DCR Max <span>mΩ</span></th>
											<th>Isat Typ. <span>A</span></th>
											<th>Itemp Typ. <span>A</span></th>
											<th>Search By Part Number</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<select>
													<option value="">Size</option>
												</select>
											</td>

											<?php 
											unset($productFilters['s_lw']);
											foreach ($productFilters as $key => $productField) :

												$filter_height_from = clrNum(inputGet('height_from'));
												$filter_height_to = clrNum(inputGet('height_to'));
								
											?>


											<td>
												<input type="text" placeholder="<?= trans("from"); ?>" id="<?=$key?>__from" value="<?= inputGet("{$key}__from") ? inputGet("{$key}__from") : ''; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
												<p>~</p>
												<input type="text" placeholder="<?= trans("to"); ?>" id="<?=$key?>__to" value="<?= inputGet("{$key}__to") ? inputGet("{$key}__to") : ''; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
											</td>

											<?php endforeach; ?>

											<td>
												<input type="text" name="search" value="<?=$search?> "placeholder="Search By Part Number" />
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="mo">
							<div class="cm-products-search-table">
								<div class="cm-products-search-table__title">Size (L*W) <span>mm</span></div>
								<div class="cm-products-search-table__contents">
									<select>
										<option value="">Size</option>
									</select>
								</div>
								<div class="cm-products-search-table__title">Height Max <span>mm</span></div>
								<div class="cm-products-search-table__contents">
									<input type="text" placeholder="From" />
									<p>~</p>
									<input type="text" placeholder="To" />
								</div>
								<div class="cm-products-search-table__title">Inductance <span>uH</span></div>
								<div class="cm-products-search-table__contents">
									<input type="text" placeholder="From" />
									<p>~</p>
									<input type="text" placeholder="To" />
								</div>
								<div class="cm-products-search-table__title">DCR Max <span>mΩ</span></div>
								<div class="cm-products-search-table__contents">
									<input type="text" placeholder="From" />
									<p>~</p>
									<input type="text" placeholder="To" />
								</div>
								<div class="cm-products-search-table__title">Isat Typ. <span>A</span></div>
								<div class="cm-products-search-table__contents">
									<input type="text" placeholder="From" />
									<p>~</p>
									<input type="text" placeholder="To" />
								</div>
								<div class="cm-products-search-table__title">Itemp Typ. <span>A</span></div>
								<div class="cm-products-search-table__contents">
									<input type="text" placeholder="From" />
									<p>~</p>
									<input type="text" placeholder="To" />
								</div>
								<div class="cm-products-search-table__title">earch By Part Number</div>
								<div class="cm-products-search-table__contents">
									<input type="text" placeholder="Search By Part Number" />
								</div>
							</div>
						</div>
					</div>
					<div class="cm-products-search-button">
						<button class="cm-button cm-button--primary" id="btn_filter" data-current-url="<?= current_url(); ?>" data-query-string="<?= generateFilterUrl($queryStringArray, 'rmv_prc', ''); ?>" data-page="products-search"><span>Search</span></button>
					</div>
					<button class="cm-products-search__toggle">Close</button>
				</form>
			</div>
			<script>
				$('.cm-products-search__toggle').on('click', function () {
					if ($('.cm-products-search').hasClass('active')) {
						$(this).text('Open');
					} else {
						$(this).text('Close');
					}
					$('.cm-products-search').toggleClass('active');
					return false;
				});
			</script>
		</div>
		<div class="cm-inner">
			<div class="cm-products-table__head">
				<p>Total <strong><?=number_format($total)?></strong></p>
			</div>

			<?php 
			echo view($page['menu'] . '/_lists');
			?>

			<br />

			<nav class="cm-pagination">
				<?= view('_partials/_pagination'); ?>
			</nav>

		</div>
	</div>
</div>
