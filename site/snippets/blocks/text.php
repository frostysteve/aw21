
<div class=" 
	<?php if ($block->textsize() == 'large'): ?>prose-lg sm:prose-xl <?php else: ?>
	prose-base sm:prose-lg  <?php endif ?>">
	<article class="mt-4 mb-8">
	<?php /** @var \Kirby\Cms\Block $block */ ?>
		<?= $block->text(); ?>
	</article>
</div>

