<?php $JsonProjectList = json_encode(ProjectsManager::get_project_list()); ?>
<input id="JsonProjectList" type="hidden" value='<?= $JsonProjectList ?>'>

<div id="app">
	<section id="sidebar-menu">
		<div class="logo-container">
			<h1 class="text-logo">_TheDash</h1>
		</div>

		<ul class="nav-container">
			<li class="list-item">
				<span class="material-icons">face</span>
				<span class="list-item-label">Project list</span>
			</li>
		</ul>
	</section>
	<main id="main">d</main>
</div>

<script src="<?= Helpers::getAssetsPath() ?>/js/Vue3.js"></script>
<script type="module" src="<?= Helpers::getAssetsPath() ?>/js/App.js"></script>
