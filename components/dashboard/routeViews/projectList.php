<div class="header-title-container">
	<h2>Project list : {{ projectListFiltered.length }}</h2>

	<div>

	</div>
	<select class="input">
		<option>Order by</option>
		<option v-for="(label, index) in orderByOptions" :key="index">label</option>
	</select>
</div>

<div class="cards-projects-container">
	<div v-for="(item, index) in projectListFiltered" :key="index">
		<?php require(Helpers::getRelativeRootPath() . '/components/dashboard/cards/CardProject.php') ?>
	</div>
</div>
