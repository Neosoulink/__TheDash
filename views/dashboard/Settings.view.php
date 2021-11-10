<div class="header-title-container">
	<h2>Settings</h2>

</div>

<div class="cards-projects-container">

	<template v-for="(item, index) in optionList" :key="index">
		<?php require(Helpers::getRelativeRootPath() . '/components/dashboard/OptionItem.php') ?>
	</template>

	<div class="option-item">
		<div>
			<h3 class="option-title">Active virtual host</h3>
			<p class="option-detail">Sometime you can specify that you've an virtual host</p>
		</div>

		<div class="option-control">
			<input type="checkbox" />
			<span class="checkmark"></span>
		</div>
	</div>

	<div class="option-item disabled">
		<div>
			<h3 class="option-title">Virtual host domain</h3>
			<p class="option-detail">Update your local domain. (e.g: myProject.test)</p>
		</div>

		<div class="option-control">
			<input type="text" value="test" class="input" style="background-color: white;border: 1px solid #00000050;" />
		</div>
	</div>

	<div class="option-item">
		<div>
			<h3 class="option-title">Active virtual host</h3>
			<p class="option-detail">Sometime you can specify that you've an virtual host</p>
		</div>

		<div class="option-control">
			<input type="checkbox" />
			<span class="checkmark"></span>
		</div>
	</div>


</div>
