<header class="main-header">
	<div class="input-icon-wrapper">
		<span class="material-icons icon">search</span>
		<input type="search" class="rounded-input input " :class="{extend: searchInp.length || searchInpFocused}" placeholder="Search a project" title="Search a project" v-model="searchInp" />
		<?php require(Helpers::getRelativeRootPath(). '/components/dashboard/cards/CardSearch.php') ?>
	</div>

	<a href="https://www.paypal.com/donate/?hosted_button_id=C4GZG2BAF3LMY" title="Support the creator" target="_blank" title="Support the creator on github" class="btn btn-circle-icon"><span class="material-icons icon">volunteer_activism</span></a>
	<a href="https://github.com/Neosoulink/__TheDash" target="blank_" title="See github repo" class="btn btn-circle-icon"><img src="<?= Helpers::getAssetsPath() ?>/svg/logos/github.svg ?>" class="icon" /></a>
</header>
