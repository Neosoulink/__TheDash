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
			<template v-if="currentView === 1">
				<?php require(Helpers::getRelativeRootPath() . "/views/dashboard/ProjectList.view.php") ?>
			</template>

			<!-- FAVORITES -->
			<template v-if="currentView === 2">
				<?php require(Helpers::getRelativeRootPath() . "/views/dashboard/Favoris.view.php") ?>
			</template>

			<!-- INFOS -->
			<template v-if="currentView === 4">
				<?php require(Helpers::getRelativeRootPath() . "/views/dashboard/Infos.view.php") ?>
			</template>

			<!-- SETTINGS -->
			<template v-if="currentView === 5">
				<?php require(Helpers::getRelativeRootPath() . "/views/dashboard/Settings.view.php") ?>
			</template>
		</main>

		<!-- FOOTER -->
		<?php require(Helpers::getRelativeRootPath() . "/components/dashboard/Footer.php") ?>

	</section>

</div>

<!-- SCRIPTS -->
<?php require(Helpers::getRelativeRootPath() . "/components/dashboard/Scripts.php") ?>
