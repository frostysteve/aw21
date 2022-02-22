<?php snippet('header') ?>
<?php snippet('nav') ?>
<div class="project">
  <section class="grid grid-cols-12 gap-4 project-content">

    <div class="col-span-10 mt-24 mb-12 font-folio text-4xl">
          <p><?= $page->title() ?></p>
    </div>


  <main class="col-span-12 sm:col-span-6 font-epicene mb-40 prose prose-base sm:prose-lg max-w-none">
    <?php foreach ($page->blocks()->toBlocks() as $block): ?>
    <div id="<?= $block->id() ?>" class="mb-24">
      <?= $block ?>
    </div>
    <?php endforeach ?>
  </main>

  </section>
</div>

<?php snippet('footer') ?>