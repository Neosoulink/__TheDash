<div class="header-title-container">
	<h2>Settings</h2>

</div>

<div class="cards-projects-container">

	<div class="option-item" @click="{
		optionItems.enableVirtualHost = !optionItems.enableVirtualHost;
		setLocalOptions();
	}">
		<div>
			<h3 class="option-title">Active virtual host</h3>
			<p class="option-detail">Sometime you can specify that you've an virtual host</p>
		</div>

		<div class="option-control">
			<input type="checkbox" v-model="optionItems.enableVirtualHost" @change="setLocalOptions" />
		</div>
	</div>

	<div class="option-item" :class="{disabled: !optionItems.enableVirtualHost}">
		<div>
			<h3 class="option-title">Virtual host domain</h3>
			<p class="option-detail">Update your local domain. (e.g: myProject.test)</p>
		</div>

		<div class="option-control">
			<input type="text" value="test" class="input" style="background-color: white;border: 1px solid #00000050;" v-model="optionItems.domainVirtualHost" @change="setLocalOptions" />
		</div>
	</div>

	<div class="option-item" @click="() => {
		optionItems.openWithBlank = !optionItems.openWithBlank;
		setLocalOptions();
	}">
		<div>
			<h3 class="option-title">Blank page</h3>
			<p class="option-detail">Automatically open new view on open project</p>
		</div>

		<div class="option-control">
			<input type="checkbox" v-model="optionItems.openWithBlank" @change="setLocalOptions" />
		</div>
	</div>

	<div class="option-item" @click="() => {
		optionItems.enableLaravelSupport = !optionItems.enableLaravelSupport;
		setLocalOptions();
	}">
		<div>
			<h3 class="option-title">Laravel public support</h3>
			<p class="option-detail">Automatically redirect to public repo for laravel projects</p>
		</div>

		<div class="option-control">
			<input type="checkbox" v-model="optionItems.enableLaravelSupport" @change="setLocalOptions" />
		</div>
	</div>


</div>
