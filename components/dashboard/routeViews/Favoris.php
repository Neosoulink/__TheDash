<div class="header-title-container">
	<h2>Favoris : {{ favorisProjectListFiltered.length }}</h2>

</div>

<div class="cards-projects-container">
	<div v-for="(item, index) in favorisProjectListFiltered" :key="index">
		<?php require(Helpers::getRelativeRootPath() . '/components/dashboard/cards/CardProject.php') ?>
	</div>
</div>
