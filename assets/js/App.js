const JsonProjectList = document.getElementById("JsonProjectList").value;
const favoritesJsonProjects = localStorage.getItem("favoritesProjects");
const optionsSettingsJson = localStorage.getItem("optionItems");
document.getElementById("JsonProjectList").remove();

const RootComponent = {
	data() {
		return {
			projectList: [],
			optionItems: {},
			favoritesProjects: [],
			searchInp: "",
			sidebarMenuList: [
				{ icon: "format_list_bulleted", label: "Project list", id: 1 },
				{ icon: "favorite_border", label: "Favoris", id: 2 },
				//{ icon: "handyman", label: "Tools", id: 3 },
				{ icon: "help_outline", label: "About", id: 4 },
				{ icon: "settings", label: "Settings", id: 5 },
			],
			currentView: 1,
			orderByOptions: [],
		}
	},
	methods: {
		formatProjectLink: function (project = Object) {
			return (
				this.optionItems.enableVirtualHost &&
				this.optionItems.domainVirtualHost != ''
			) ? 'http://' + project?.name + '.' + this.optionItems.domainVirtualHost
				: project?.project_url + ((
					project?.builded_lang?.toLowerCase() === 'laravel'
					&& this.optionItems.laravelPublicDirSupport
				)
					? '/public'
					: ''
				)
		},
		setLocalOptions: function () {
			localStorage.setItem('optionItems', JSON.stringify(this.optionItems));
		},
		addFavorite: function (project = String) {
			let favoritesProjects = JSON.parse(JSON.stringify(this.favoritesProjects));
			favoritesProjects.unshift(project);

			this.favoritesProjects = favoritesProjects;
			localStorage.setItem("favoritesProjects", JSON.stringify(favoritesProjects));
		},
		removeFavorite: function (project = String) {
			let favoritesProjects = JSON.parse(JSON.stringify(this.favoritesProjects));
			favoritesProjects = favoritesProjects.filter(item => item != project);

			this.favoritesProjects = favoritesProjects;
			localStorage.setItem("favoritesProjects", JSON.stringify(favoritesProjects));
		},
		isFavorite: function (project = String) { return this.favoritesProjects.includes(project) },
		alert: (msg) => alert(msg)
	},
	computed: {
		projectListFiltered() {
			return this.projectList.filter(item => {
				return new RegExp(this.searchInp, 'ig').test(item.name)
			});
		},
		favorisProjectListFiltered() {
			return this.projectListFiltered.filter(i => this.favoritesProjects.includes(i.name));
		}
	},
	mounted() {
		// INIT DATA
		this.projectList = JsonProjectList ? JSON.parse(JsonProjectList) : [];
		this.favoritesProjects = favoritesJsonProjects
			? JSON.parse(favoritesJsonProjects)
			: [];

		// INIT ROUTE
		const sidebarMenuList = this.sidebarMenuList;
		const setCurrentView = (id) => this.currentView = id;
		const setUrlAnchor = (urlAnchor = document.URL.split('#')[1]) => {
			if (urlAnchor && urlAnchor.length > 0) sidebarMenuList.forEach(item => {
				if (item.label.replace(' ', '_') === urlAnchor) setCurrentView(item.id);
			});
		};

		setUrlAnchor(document.URL.split('#')[1]);
		window.addEventListener('hashchange', () => setUrlAnchor(document.URL.split('#')[1]));

		// OPTIONS SETTING
		this.optionItems = optionsSettingsJson
			? JSON.parse(optionsSettingsJson)
			: {
				enableVirtualHost: false,
				domainVirtualHost: 'test',
				openWithBlank: true,
				laravelPublicDirSupport: true,
			};
	},
}

const app = Vue.createApp(RootComponent);
const vm = app.mount('#app');

console.log(vm.projectList)
console.log(vm.favoritesProjects)

