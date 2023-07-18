<div id="cm-body" class="cm-body">

	<?= view("_partials/_breadcrumb"); ?>

	<div class="cm-news">
		<div class="cm-inner">
			<div class="cm-view">
				<div class="cm-view-head">
					<h2><?= esc($post->title); ?></h2>
					
					<div class="cm-view-head-info">
						<div class="cm-view-head-info__text">
							<p><strong><?=trans('created_at')?></strong> <?=substr($post->created_at, 0, 10)?></p>
							<p><strong><?=trans('count_of_views')?></strong> <?=number_format($post->ct_views)?></p>
						</div>
						<div class="cm-view-head-info__social">
							<?= view('_partials/_post_share'); ?>
						</div>
					</div>
				</div>
				<div class="cm-view-body">
					<div class="cm-view-body__text">

					<!-- <?php if ($post->file_image) { ?>
						<div class="" style="text-align:center; margin-bottom:20px;">
							<img src="<?= getAttachImageURL('posts', $post, 'file_image'); ?>"  />
						</div>
					<?php } ?> -->


						<?= $post->content; ?>
					</div>

					<?= view('_partials/_post_attach'); ?>

				</div>

				<div class="cm-view-foot">
					<?= view('_partials/_prev_next'); ?>
				</div>
			</div>
		</div>
	</div>
</div>