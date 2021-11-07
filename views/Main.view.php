<?php $JsonProjectList = json_encode(ProjectsManager::get_project_list()); ?>
<input id="JsonProjectList" type="hidden" value='<?= $JsonProjectList ?>'>

<div id="app">

	<?= require(Helpers::getRelativeRootPath() . "/components/dashboard/SideBar.php") ?>

	<section id="main">
		<header class="main-header">
			<div class="input-icon-wrapper">
				<span class="material-icons icon">search</span>
				<input type="search" class="rounded-input input" placeholder="Search a project" title="Search a project" v-model="searchInp" />
			</div>

			<a href="#" title="Support the creator on github" class="btn btn-circle-icon"><span class="material-icons icon">redeem</span></a>
			<a href="https://github.com/Neosoulink/__TheDash" target="blank_" title="See github repo" class="btn btn-circle-icon"><img src="<?= Helpers::getAssetsPath() ?>/svg/logos/github.svg" class="icon" /></a>
		</header>
		<main>

			<?= require(Helpers::getRelativeRootPath() . "/components/dashboard/routeViews/projectList.php") ?>

		</main>
		<footer>
			<h3><span class="text-semi-bold"><?= getenv("APP_NAME") ?></span>@<?= (new DateTime())->format("Y") ?> | <a href="https://github.com/Neosoulink/__TheDash" target="blank_" title="See github repo" class="text-accent">Github</a></h3>
			<h3><?= (!empty(Helpers::get_parsed_phpinfo()["apache2handler"]) &&
						!empty(Helpers::get_parsed_phpinfo()["apache2handler"]["Apache Version"])) ?
						Helpers::get_parsed_phpinfo()["apache2handler"]["Apache Version"] :
						"Php version : " .  Helpers::get_parsed_phpinfo()["Core"]["PHP Version"]; ?>
			</h3>
		</footer>
	</section>

	<div class="modal" v-if="currentModal === 2" @click.self="currentModal = null">
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

<script src="<?= Helpers::getAssetsPath() ?>/js/Vue3.js"></script>
<script type="module" src="<?= Helpers::getAssetsPath() ?>/js/App.js"></script>
<?php
require Helpers::getRelativeRootPath() . '/lib/php-hot-reloader/src/HotReloader.php';
new HotReloader\HotReloader('//localhost/' . getenv('APP_NAME') . '/phrwatcher.php');
