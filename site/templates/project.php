<?php snippet('header') ?>
<?php snippet('nav') ?>
<div class="project">
  <section class="project-content">

    <div class="grid grid-cols-12 gap-4 ">
          <p class="col-span-10 mt-24 mb-12 font-folio text-4xl"><?= $page->title() ?></p>
    </div>


  <main class="font-epicene mb-40 prose prose-base sm:prose-lg max-w-none">
    <?php foreach ($page->blocks()->toBlocks() as $block): ?>
    <div id="<?= $block->id() ?>" class="mb-24">
      <?= $block ?>
    </div>
    <?php endforeach ?>
  </main>

  </section>
</div>

<?php snippet('footer') ?>