const JsonProjectList = document.getElementById("JsonProjectList").value;
const favoritesJsonProjects = localStorage.getItem("favoritesProjects");
document.getElementById("JsonProjectList").remove();

const RootComponent = {
	data() {
		return {
			projectList: [],
			favoritesProjects: [],
			searchInp: "",
			sidebarMenuList: [
				{ icon: "format_list_bulleted", label: "Project list", id: 1 },
				{ icon: "favorite_border", label: "Favoris", id: 2 },
				{ icon: "handyman", label: "Tools", id: 3 },
				{ icon: "help_outline", label: "Infos", id: 4 },
				{ icon: "settings", label: "Settings", id: 5 },
			],
			currentModal: 1,
			orderByOptions: [],
		}
	},
	methods: {
		addFavoris: (project = String) => {
			let favoritesProjects = JSON.parse(JSON.stringify(this.favoritesProjects));
			favoritesProjects.unshift(project);

			this.favoritesProjects = favoritesProjects;
			localStorage.setItem("favoritesProjects", JSON.stringify(favoritesProjects));
		},
		removeFavoris: (project = String) => {
			let favoritesProjects = JSON.parse(JSON.stringify(this.favoritesProjects));
			favoritesProjects = favoritesProjects.filter(item => item != project);

			this.favoritesProjects = favoritesProjects;
			localStorage.setItem("favoritesProjects", JSON.stringify(favoritesProjects));
		},
		alert: (msg) => alert(msg)
	},
	computed: {
		projectListFiltered() {
			return this.projectList.filter(item => {
				return new RegExp(this.searchInp, 'ig').test(item.name)
			});
		}
	},
	mounted() {
		this.projectList = JsonProjectList ? JSON.parse(JsonProjectList) : [];
		this.favoritesProjects = favoritesJsonProjects
			? JSON.parse(favoritesJsonProjects)
			: [];
	},
}

const app = Vue.createApp(RootComponent);
const vm = app.mount('#app');

console.log(vm.projectList)
console.log(vm.favoritesProjects)

