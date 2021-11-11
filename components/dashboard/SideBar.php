	<section id="sidebar-menu">
		<div class="logo-container">
			<a href="/" class="text-logo"><?= getenv("APP_NAME") ?></a>
		</div>

		<ul class="nav-container">
			<a :href="'#' + item.label.replace(' ', '_')" class="list-item" v-for="(item, index) in sidebarMenuList" :key="index" :class="((!currentView || currentView === null) && index === 0) || (currentView === item?.id) ? 'selected' : ''" @click="currentView = item?.id">
				<span class="material-icons icon">{{ item?.icon }}</span>
				<span class="list-item-label selected">{{ item?.label }}</span>
			</a>
		</ul>

		<div class="gift-card-container">
			<a href="https://www.paypal.com/donate/?hosted_button_id=C4GZG2BAF3LMY" title="Support the creator" target="_blank" class="gift-card">
				<span class="material-icons">volunteer_activism</span>
				<p>If you like this project and want support me and my job, you can make a donation <span class="material-icons text-danger" style="font-size: inherit;">favorite<span></p>
			</a>
		</div>
	</section>
