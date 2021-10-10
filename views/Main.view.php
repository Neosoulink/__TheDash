<?php $JsonProjectList = json_encode(ProjectsManager::get_project_list()); ?>
<input id="JsonProjectList" type="hidden" value='<?= $JsonProjectList ?>'>

<div id="app">
	<!--<section id="sidebar-menu">
		<div class="logo-container">
			<h1 class="text-logo">_TheDash</h1>
		</div>

		<ul class="nav-container">
			<a href="#" class="list-item" v-for="(item, index) in sidebarMenuList" :key="index" :class="((!currentModal || currentModal === null) && index === 0) || (currentModal === item?.label) ? 'selected' : ''" @click="currentModal = item?.label">
				<span class="material-icons">{{ item?.icon }}</span>
				<span class="list-item-label selected">{{ item?.label }}</span>
			</a>
		</ul>

		<div class="gift-card-container">
			<a href="https://github.com/Neosoulink" target="blank_" class="gift-card">
				<span class="material-icons">redeem</span>
				<h2>Gift</h2>
				<p>Follow the instructions to embed the icon font in your</p>
			</a>
		</div>
	</section>-->
	<main id="main">d</main>
</div>

<script src="<?= Helpers::getAssetsPath() ?>/js/Vue3.js"></script>
<script type="module" src="<?= Helpers::getAssetsPath() ?>/js/App.js"></script>
