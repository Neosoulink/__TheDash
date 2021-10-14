const JsonProjectList = window.document.getElementById("JsonProjectList").value;
window.document.getElementById("JsonProjectList").remove();

const RootComponent = {
	data() {
		return {
			projectList: [],
			sidebarMenuList: [
				{ icon: "format_list_bulleted", label: "Project list", id: 1 },
				{ icon: "favorite_border", label: "Favoris", id: 2 },
				{ icon: "handyman", label: "Tools", id: 3 },
				{ icon: "help_outline", label: "Infos", id: 4 },
				{ icon: "settings", label: "Settings", id: 5 },
			],
			currentModal: null,
			orderByOptions: [],
		}
	},
	mounted() {
		this.projectList = JsonProjectList
			? JSON.parse(JsonProjectList)
			: [];
	},
}


const app = Vue.createApp(RootComponent);
const vm = app.mount('#app');

console.log(vm.projectList)
