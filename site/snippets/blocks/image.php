<div class="grid grid-cols-12 gap-4">
<div class=" 
			<?php if ($block->imagewidth() == 'large'): ?>col-span-12 p-4 
			<?php if ($block->imageposition() == 'left'): ?><?php endif ?>
			<?php if ($block->imageposition() == 'center'): ?><?php endif ?>
			<?php if ($block->imageposition() == 'right'): ?><?php endif ?><?php endif ?>

			<?php if ($block->imagewidth() == 'medium'): ?>col-span-12 p-4 sm:p-0 sm:col-span-6
			<?php if ($block->imageposition() == 'left'): ?> sm:pl-4 <?php endif ?>
			<?php if ($block->imageposition() == 'center'): ?> sm:col-start-4 <?php endif ?>
			<?php if ($block->imageposition() == 'right'): ?> sm:pr-4 sm:col-start-6  <?php endif ?><?php endif ?>

			<?php if ($block->imagewidth() == 'small'): ?>col-span-12 p-4 sm:p-0 sm:col-span-5 md:col-span-4 
			<?php if ($block->imageposition() == 'left'): ?> sm:pl-4 <?php endif ?>
			<?php if ($block->imageposition() == 'center'): ?>sm:col-start-6 md:col-start-5<?php endif ?>
			<?php if ($block->imageposition() == 'right'): ?>sm:pr-4 sm:col-start-7 lg:col-start-9 xl:col-start-9 <?php endif ?><?php endif ?>">
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
			<img class="w-full h-auto" src="<?= $src ?>" alt="<?= $alt->esc() ?>">
		</a>
		<?php else: ?>
		<img class="w-full h-auto" src="<?= $src ?>" alt="<?= $alt->esc() ?>">
		<?php endif ?>

		<?php if ($caption->isNotEmpty()): ?>
		<figcaption class="font-epicene text-sm mt-2">
			<?= $caption ?>
		</figcaption>
		<?php endif ?>
		</figure>
		<?php endif ?>
	
	</div>
</div>