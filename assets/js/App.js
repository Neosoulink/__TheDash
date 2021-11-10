const JsonProjectList = window.document.getElementById("JsonProjectList").value;
const favoritesJsonProjects = localStorage.getItem("JsonProjectList");
window.document.getElementById("JsonProjectList").remove();

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
		alert(msg) { window.alert(msg); }
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

