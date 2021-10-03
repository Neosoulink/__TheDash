	<div class="screen d-flex flex-column">
		<header class="nav space-between-centered">
			<h1 class="app-name">myProjects</h1>
			<div class="">
				<button class="">Favoris</button>
			</div>
		</header>
		<main class="body fill">
			<h1 class="body-title">My local projects (<?= count(ProjectsManager::get_project_list()) ?>)</h1>

			<?php
			$projectList = ProjectsManager::get_project_list();
			if (count($projectList)) {
			?>
				<section class="project-list fill">
					<?php
					foreach ($projectList as $projectName) {
					?>
						<div class="project-item space-between-centered">
							<div>
								<h2 class="project-name"><?= $projectName ?></h2>
								<a href="<?= ProjectsManager::generate_project_url($projectName) ?>" target="blank_">Open project</a>
							</div>
							<diV>
								<button>fav</button>
							</diV>
						</div>
					<?php } ?>
				</section>
			<?php } else { ?>
				<div class="empty-list centered">
					List empty
				</div>
			<?php } ?>
		</main>
		<footer class="space-between-centered">
			<div class="copyright">myProjects@<span id="currentYear">2021</span> | Github</div>
			<div> Php v7.4.3</div>
		</footer>
	</div>
