<?php $JsonProjectList = json_encode(ProjectsManager::get_project_list()); ?>
<input id="JsonProjectList" type="hidden" value='<?= $JsonProjectList ?>'>

<div id="app">

	<?php require(Helpers::getRelativeRootPath() . "/components/dashboard/SideBar.php") ?>

	<section id="main">
		<!-- HEADER -->
		<?php require(Helpers::getRelativeRootPath() . "/components/dashboard/Header.php") ?>

		<!-- MAIN ROUTE VIEWS -->
		<main>
			<!-- PROJECT LIST (HOME) -->
			<template v-if="currentModal === 1">
				<?php require(Helpers::getRelativeRootPath() . "/components/dashboard/routeViews/projectList.php") ?>
			</template>

			<!-- FAVORITES -->
			<template v-if="currentModal === 2">
				<?php require(Helpers::getRelativeRootPath() . "/components/dashboard/routeViews/Favoris.php") ?>
			</template>
		</main>

		<!-- FOOTER -->
		<?php require(Helpers::getRelativeRootPath() . "/components/dashboard/Footer.php") ?>

	</section>

	<div class="modal" :class="{visible: showModal}" @click.self="currentModal = null">
		<div class="card-content">
			<button class="btn btn-light btn-circle-icon close-btn" @click="currentModal = null">
				<span class="material-icons icon">close</span>
			</button>
			<h3 class="card-title">Favoris</h3>

			<div class="card-body">

			</div>
		</div>
	</div>
</div>

<!-- SCRIPTS -->
<?php require(Helpers::getRelativeRootPath() . "/components/Scripts.php") ?>
