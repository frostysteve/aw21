<php # /site/snippets/blocks/imageblock.php ?>


	<div class="">
			<?php

		/** @var \Kirby\Cms\Block $block */
		$alt     = $block->alt();
		$caption = $block->caption();
		$crop    = $block->crop()->isTrue();
		$link    = $block->link();
		$ratio   = $block->ratio()->or('auto');
		$src     = null;

		if ($block->location() == 'web') {
			$src = $block->src()->esc();
		} elseif ($image = $block->image()->toFile()) {
			$alt = $alt ?? $image->alt();
			$src = $image->url();
		}

		?>
		<?php if ($src): ?>
		<figure<?= attr(['data-ratio' => $ratio, 'data-crop' => $crop], ' ') ?>>
		<?php if ($link->isNotEmpty()): ?>
		<a href="<?= esc($link->toUrl()) ?>">
			<img src="<?= $src ?>" alt="<?= $alt->esc() ?>">
		</a>
		<?php else: ?>
		<img src="<?= $src ?>" alt="<?= $alt->esc() ?>">
		<?php endif ?>

		<?php if ($caption->isNotEmpty()): ?>
		<figcaption class="font-epicene text-sm mt-2">
			<?= $caption ?>
		</figcaption>
		<?php endif ?>
		</figure>
		<?php endif ?>
	</div>


