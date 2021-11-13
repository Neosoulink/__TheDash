<div class="header-title-container">
	<h2>Settings</h2>

</div>

<div class="cards-projects-container">

	<div class="option-item" @click="{
		optionItems.enableVirtualHost = !optionItems.enableVirtualHost;
		setLocalOptions();
	}">
		<div>
			<h3 class="option-title">Enable virtual host</h3>
			<p class="option-detail">You can specify that you are using a virtual host.</p>
		</div>

		<div class="option-control">
			<input type="checkbox" v-model="optionItems.enableVirtualHost" @change="setLocalOptions" />
		</div>
	</div>

	<div class="option-item" :class="{disabled: !optionItems.enableVirtualHost}">
		<div>
			<h3 class="option-title">Virtual host domain</h3>
			<p class="option-detail">Update your local domain. (Virtual host must be enabled. e.g: myProject.test).</p>
		</div>

		<div class="option-control">
			<input type="text" value="test" class="input" style="background-color: white;border: 1px solid #00000050;" v-model="optionItems.domainVirtualHost" @change="setLocalOptions" />
			<small class="text-danger" v-if="optionItems.enableVirtualHost && (!optionItems.domainVirtualHost || optionItems.domainVirtualHost == '')">Must not be empty</small>
		</div>
	</div>

	<div class="option-item" @click="() => {
		optionItems.openWithBlank = !optionItems.openWithBlank;
		setLocalOptions();
	}">
		<div>
			<h3 class="option-title">Blank page</h3>
			<p class="option-detail">Automatically open a new view on open project.</p>
		</div>

		<div class="option-control">
			<input type="checkbox" v-model="optionItems.openWithBlank" @change="setLocalOptions" />
		</div>
	</div>

	<div class="option-item" @click="() => {
		optionItems.laravelPublicDirSupport = !optionItems.laravelPublicDirSupport;
		setLocalOptions();
	}" :class="{disabled: optionItems.enableVirtualHost}">
		<div>
			<h3 class="option-title">Laravel public support</h3>
			<p class="option-detail">Automatically redirect to public directory for laravel projects. (Disabled if using a virtual host).</p>
		</div>

		<div class="option-control">
			<input type="checkbox" v-model="optionItems.laravelPublicDirSupport" @change="setLocalOptions" />
		</div>
	</div>

</div>
