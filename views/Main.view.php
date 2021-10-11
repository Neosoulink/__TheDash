<?php $JsonProjectList = json_encode(ProjectsManager::get_project_list()); ?>
<input id="JsonProjectList" type="hidden" value='<?= $JsonProjectList ?>'>

<div id="app">
	<section id="sidebar-menu">
		<div class="logo-container">
			<a href="/" class="text-logo"><?= getenv("APP_NAME") ?></a>
		</div>

		<ul class="nav-container">
			<a href="#" class="list-item" v-for="(item, index) in sidebarMenuList" :key="index" :class="((!currentModal || currentModal === null) && index === 0) || (currentModal === item?.label) ? 'selected' : ''" @click="currentModal = item?.label">
				<span class="material-icons icon">{{ item?.icon }}</span>
				<span class="list-item-label selected">{{ item?.label }}</span>
			</a>
		</ul>

		<div class="gift-card-container">
			<a href="#" title="Support the creator" class="gift-card">
				<span class="material-icons">redeem</span>
				<h2>Gift</h2>
				<p>Follow the instructions to embed the icon font in your</p>
			</a>
		</div>
	</section>


	<section id="main">
		<header class="main-header">
			<div class="input-icon-wrapper">
				<span class="material-icons icon">search</span>
				<input type="search" class="rounded-input input" placeholder="Search a project" title="Search a project" />
			</div>

			<a href="#" title="Support the creator on github" class="btn btn-circle-icon"><span class="material-icons icon">redeem</span></a>
			<a href="https://github.com/Neosoulink/__TheDash" target="blank_" title="See github repo" class="btn btn-circle-icon"><img src="<?= Helpers::getAssetsPath() ?>/svg/logos/github.svg" class="icon" /></a>
		</header>
		<main>

		</main>
		<footer>

		</footer>
	</section>
</div>

<script src="<?= Helpers::getAssetsPath() ?>/js/Vue3.js"></script>
<script type="module" src="<?= Helpers::getAssetsPath() ?>/js/App.js"></script>
<?php
require Helpers::getRelativeRootPath() . '/lib/php-hot-reloader/src/HotReloader.php';
new HotReloader\HotReloader('//localhost/' . getenv('APP_NAME') . '/phrwatcher.php');
