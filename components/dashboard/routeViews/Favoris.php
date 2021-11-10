<div class="header-title-container">
	<h2>Favoris : {{ favoritesProjects.length }}</h2>

</div>

<div class="cards-projects-container">
	<div v-for="(item, index) in projectListFiltered.filter(i => favoritesProjects.includes(i.name))" :key="index">
		<?php require(Helpers::getRelativeRootPath() . '/components/dashboard/cards/CardProject.php') ?>
	</div>
</div>
