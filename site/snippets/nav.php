<div class="grid grid-cols-12 gap-4 sticky top-4 font-epicene">
	<div class="col-span-6"><a href="<?= $site->url() ?>">Alan Weedon</a></div>
	<div class="col-span-6 float-right">
		<button id="open-about" class="fixed right-4 top-4">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			<path d="M19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12C18 12.5523 18.4477 13 19 13Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			<path d="M5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
	</div>
</div>

<?php $info = $site->find('info') ?>


<section id="about" class="hidden flex flex-row-reverse font-folio z-50 transition-transform">
    <div class="fixed pt-4 pl-8 pr-12 sm:pr-24 right-0 top-0 w-full sm:w-1/2 h-full bg-amber-400 shadow-xl overflow-y-auto">
		<div class="fixed right-4">
			<button id="close-about">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M18 6L6 18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M6 6L18 18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>
		</div>

		<div class="pb-8">
			<h1>
			<?= $info->infotext()->kirbytext() ?>
			</h1>
		</div>

		<?php foreach($info->images() as $image): ?>
		<div class="w-2/3 sm:w-1/2 h-auto my-8 mix-blend-multiply">
			<picture>
				<source srcset="<?= $image->thumb(['format' => 'avif'])->url() ?>" type="image/avif">
				<source srcset="<?= $image->thumb(['format' => 'webp'])->url() ?>" type="image/webp">
				<img src="<?= $image->thumb(['format' => 'jpg'])->url() ?>" alt="Portrait of Alan Weedon">
			</picture>
		</div>
		<?php endforeach ?>


		<div class="pt-4 pb-8">
			<h3 class="text-base font-epicene uppercase pb-2">
				Get in touch
			</h3>
			<a href="mailto:<?= $info->email() ?>">
			Email, 
			</a>
			<a href="mailto:<?= $info->instagram() ?>" target="_blank">
			Instagram
			</a>
		</div>
		<div class="pb-8">
			<h3 class="text-base font-epicene uppercase pb-2">
			Selected publications / clients
			</h3>
			<?= $info->list() ?>
		</div>
		<div class="pt-4 mb-40 sm:mb-24">
			<h3 class="text-base font-epicene uppercase pb-2">
				Site
			</h3>
			<a href="https://newassoc.world" target="_blank">
			New Association 
			</a>
		</div>
    </div>
</section>

<script>
    let modal = document.getElementById("about");
	let btn = document.getElementById("open-about");
	let button = document.getElementById("close-about");

    // We want the modal to open when the Open button is clicked
    btn.onclick = function() {
    modal.style.display = "block";
    }
    // We want the modal to close when the OK button is clicked
    button.onclick = function() {
    modal.style.display = "none";
    }

	window.onclick = function(event) {
    if (event.target == modal) {
     modal.style.display = "none";
    }
    }


</script>
