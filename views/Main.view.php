<?php $JsonProjectList = json_encode(ProjectsManager::get_project_list()); ?>
<input id="JsonProjectList" type="hidden" value='<?= $JsonProjectList ?>'>

<div id="app">
	<section id="sidebar-menu">
		<div class="logo-container">
			<h1 class="text-logo">_TheDash</h1>
		</div>

		<ul class="nav-container">
			<a href="#" class="list-item selected">
				<span class="material-icons">format_list_bulleted</span>
				<span class="list-item-label selected">Project list</span>
			</a>

			<a href="#" class="list-item">
				<span class="material-icons">favorite_border</span>
				<span class="list-item-label selected">Favoris</span>
			</a>

			<a href="#" class="list-item">
				<span class="material-icons">settings</span>
				<span class="list-item-label selected">Settings</span>
			</a>
		</ul>
	</section>
	<main id="main">d</main>
</div>

<script src="<?= Helpers::getAssetsPath() ?>/js/Vue3.js"></script>
<script type="module" src="<?= Helpers::getAssetsPath() ?>/js/App.js"></script>
