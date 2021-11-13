<div class="header-title-container">
	<h2>Projects list : {{ projectListFiltered.length }}</h2>

	<div>

	</div>
	<select class="input">
		<option>Order by</option>
		<option v-for="(label, index) in orderByOptions" :key="index">label</option>
	</select>
</div>

<div class="cards-projects-container" v-if="projectListFiltered.length">
	<div v-for="(item, index) in projectListFiltered" :key="index">
		<?php require(Helpers::getRelativeRootPath() . '/components/dashboard/cards/CardProject.php') ?>
	</div>
</div>

<div class="empty-projects-container" v-else>
	<img src="<?= Helpers::getRelativeRootPath() ?>/assets/svg/no-items.svg" />

	<h3 class="text-muted">No projects</h3>
</div>
