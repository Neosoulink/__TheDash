<?php
$JsonProjectList = json_encode(ProjectsManager::get_project_list());
?>

<input id="JsonProjectList" type="hidden" value='<?= $JsonProjectList ?>'>

<div id="app">
	<header class="nav space-between-centered">
		<h1 class="app-name">myProjects</h1>
		<div class="">
			<button class="">Favoris</button>
		</div>
	</header>
	<main class="body fill">
		<h1 class="body-title">My local projects {{ projectList?.length }}</h1>

		<section v-if="projectList?.length" class="project-list fill">
			<div v-for="(projectData, index) in projectList" :key="index" class="project-item space-between-centered">
				<div>
					<h2 class="project-name">
						{{ projectData?.name }} /
						{{ projectData?.builded_lang }} /
						Size : {{ projectData?.size }}kb
					</h2>
					<a :href="projectList?.project_url" target="blank_">Open project</a>
				</div>
				<diV>
					<button>fav</button>
				</diV>
			</div>
		</section>
		<div v-else class="empty-list centered">
			List empty
		</div>
	</main>
	<footer class="space-between-centered">
		<div class="copyright">myProjects@<span id="currentYear">2021</span> | Github</div>
		<div> Php v7.4.3</div>
	</footer>
</div>

<script src="<?= Helpers::getAssetsPath() ?>/js/Vue3.js"></script>
<script type="module" src="<?= Helpers::getAssetsPath() ?>/js/App.js"></script>
