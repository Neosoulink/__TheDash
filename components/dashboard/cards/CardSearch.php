<div class="card-search" v-if="currentView !== 1 && currentView !== 2 && searchInp.length">
	<a :href="formatProjectLink(item)" @click="searchInp = ''" :target="optionItems.openWithBlank ? 'blank_' : '' " class="project-item" v-for="(item, index) in projectListFiltered.slice(0, 5)" :key="index">
		<h5 class="title">{{ item?.name }}</h5>
		<span class="material-icons icon">visibility</span>
	</a>
</div>
