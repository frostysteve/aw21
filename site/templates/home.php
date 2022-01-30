<?php snippet('header') ?>
<?php snippet('nav') ?>

<main class="mt-60 mb-40">
<?php $projects = $site->find('projects') ?>

<?php

$filterBy = get('filter');
$unfiltered = $projects->children()->listed();

$projectz = $unfiltered
  ->when($filterBy, function($filterBy) {
    return $this->filterBy('category', $filterBy, ',');
  })
  ->paginate();

$pagination = $projectz->pagination();
$filters = $unfiltered->pluck('category', ',', true);

?>


<section class="grid grid-cols-12 gap-4 mb-12">
    <div class="col-span-12 mb-6 font-epicene">
    <nav class="filter">
      <a href="<?= $site->url() ?>">All,</a>
      <?= implode(', ', array_map(fn ($value) => Html::a(url(null, ['query' => ['filter' => $value]]), $value), $filters));?>
    </nav>
    </div>
</section>




<?php if($filterBy === 'Photography' ? 'active' : ''): ?>
  <div class="grid grid-cols-12 gap-4 mt-6 mb-6 "> 
  <?php $index = 0; foreach ($projectz as $project): $index = $index + 1;?>
    <?php if($hero = $project->thumb()->image()->toFile()): ?>
      <?php if ($project->link()->isNotEmpty()): ?>
        <a class="col-span-6 sm:col-span-3" href="<?= $project->link() ?>" target="_blank">
      <?php else: ?>
				<a class="col-span-6 sm:col-span-3" href="<?= $project->url() ?>">
      <?php endif ?>
        <img class="rounded-xl w-full object-cover object-center" src="<?= $hero->crop(600,600)->url() ?>" srcset="<?= $hero->crop(600,600)->srcset() ?>" alt="<?= $project->title() ?> image" />
        </a>
     <?php endif ?>
   <?php endforeach ?>
   </div>
  <?php else: ?>
  
<?php $index = 0; foreach ($projectz as $project): $index = $index + 1;?>
<section class="grid grid-cols-12 gap-4 font-folio leading-tight  " x-data="accordion(<?php echo $index ?>)">
    <div class="mt-6 col-span-8 sm:col-span-4 cursor-pointer">
        <a role="button" @click="handleClick()"><span class=""><?= $project->title() ?></span></a>
    </div>
    <div class="mt-6 col-span-4 sm:col-span-2 text-right sm:hidden">
        <p><?= $project->projectyear() ?></p>
    </div>
    <div class="col-span-12 sm:col-span-3 font-epicene sm:font-folio -mt-3 sm:mt-6 ">
        <p><?= $project->client() ?></p>
    </div>
    <div class="mt-6 col-span-3 hidden sm:block font-epicene">
        <p class="tags"><?= $project->category() ?></p>
    </div>
    <div class="mt-6 col-span-6 sm:col-span-2 text-right hidden sm:block">
        <p><?= $project->projectyear() ?></p>
    </div>
    <div x-ref="tab" :style="handleToggle()" class="col-span-12 sm:col-span-6 overflow-hidden max-h-0 duration-300 transition-all font-epicene text-lg">
       <?php if($hero = $project->thumb()->image()->toFile()): ?>
				<div class="block sm:hidden col-xs-12 col-sm-8 col-md-6 show-hide w-2/3 mb-6">
					<a class="hero-img" href="<?= $project->url() ?>">
						<img class="rounded-xl" src="<?= $hero->url() ?>" srcset="<?= $hero->srcset() ?>" alt="<?= $project->title() ?> image" />
					</a>
				</div>
			<?php endif ?>
      <div class="group">
        <p class="mb-4 text-xl">
        <?= $project->text() ?>
        <?php if($hero = $project->thumb()->image()->toFile()): ?>
        <div class="hidden z-50 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 mx-auto w-1/3 group-hover:block col-xs-12 col-sm-8 col-md-6 w-2/3 mb-6">
          <a class="hero-img" href="<?= $project->url() ?>">
            <img class="mx-auto" src="<?= $hero->url() ?>" srcset="<?= $hero->srcset() ?>" alt="<?= $project->title() ?> image" />
          </a>
        </div>
        <?php endif ?>
        </p>
      </div>
      <?php if ($project->link()->isNotEmpty()): ?>
      <a class="underline" href="<?= $project->link() ?>" target="_blank">View project</a>
      <?php endif ?>
      <?php if ($project->blocks()->isNotEmpty()): ?>
      <a class="underline" href="<?= $project->url() ?>">View project</a>
      <?php endif ?>
    </div>
</section>

<?php endforeach ?>
<?php endif ?>

</main>

<script>
    document.addEventListener('alpine:init', () => {
      Alpine.store('accordion', {
        tab: 0
      });
      
      Alpine.data('accordion', (idx) => ({
        init() {
          this.idx = idx;
        },
        idx: -1,
        handleClick() {
          this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
        },
        handleToggle() {
          return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
        }
      }));
    })
  </script>

<?php snippet('footer') ?>