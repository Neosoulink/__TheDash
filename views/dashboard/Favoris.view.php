<div class="header-title-container">
	<h2>Favortes list : {{ favorisProjectListFiltered.length }}</h2>

</div>

<div class="cards-projects-container" v-if="favorisProjectListFiltered.length">
	<div v-for="(item, index) in favorisProjectListFiltered" :key="index">
		<?php require(Helpers::getRelativeRootPath() . '/components/dashboard/cards/CardProject.php') ?>
	</div>
</div>

<div class="empty-projects-container" v-else>
	<img src="<?= Helpers::getRelativeRootPath() ?>/assets/svg/no-items.svg" />

	<h3 class="text-muted">No favorites</h3>
</div>
