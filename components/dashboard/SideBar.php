	<section id="sidebar-menu">
		<div class="logo-container">
			<a href="/" class="text-logo"><?= getenv("APP_NAME") ?></a>
		</div>

		<ul class="nav-container">
			<a href="#" class="list-item" v-for="(item, index) in sidebarMenuList" :key="index" :class="((!currentModal || currentModal === null) && index === 0) || (currentModal === item?.id) ? 'selected' : ''" @click="currentModal = item?.id">
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
