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
				<div v-for="(item, index) in projectList" :key="index" class="card-project">
					<div class="card-img">
						<img src="<?= Helpers::getAssetsPath() ?>/img/computer-programming.png" />
					</div>
					<div class="card-body">
						<h4 class="title">{{ item?.name }}</h4>
						<div class="content">
							<ul>
								<li>Size : {{ item?.size }}kb</li>
								<li>Permissions : {{ item?.permissions }}</li>
							</ul>
							<ul>
								<li>Last access: {{ new Date(item?.last_access_time).toString().substr(0, 16) }}</li>
								<li>Updated at: {{ new Date(item?.modification_time).toString().substr(0, 16) }}</li>
							</ul>
						</div>
						<div class="footer">
							<ul>
								<li>
									<img class="img-icon" v-if="item?.builded_lang != 'Unknown'" :src="`<?= Helpers::getAssetsPath() ?>/svg/builded_env/${item?.builded_lang?.toLowerCase()}.svg`" />
								</li>
							</ul>
							<div>
								<a :href="item?.project_url" target="blank_" class="btn btn-light btn-circle-icon"><span class="text-accent material-icons icon">visibility</span></a>

								<a href="#" target="blank_" class="btn btn-light btn-circle-icon"><span class="text-accent material-icons icon">edit</span></a>

								<a href="#" target="blank_" class="btn btn-light btn-circle-icon"><span class="text-accent material-icons icon">favorite_border</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>

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

	<div class="modal">
		<div class="card-content">
			<button class="btn btn-light btn-circle-icon close-btn"><span class="material-icons icon">close</span></button>
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
