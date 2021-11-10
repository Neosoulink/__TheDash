<div class="header-title-container">
	<h2>Project list</h2>

	<div>

	</div>
	<select class="input">
		<option>Order by</option>
		<option v-for="(label, index) in orderByOptions" :key="index">label</option>
	</select>
</div>

<div class="cards-projects-container">
	<?php require(Helpers::getRelativeRootPath().'/components/dashboard/cards/CardProject.php') ?>
</div>
