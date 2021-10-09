const JsonProjectList = window.document.getElementById("JsonProjectList").value;
window.document.getElementById("JsonProjectList").remove();

const RootComponent = {
	data() {
		return {
			projectList: [],
			sidebarMenuList: [
				{ icon: "format_list_bulleted", label: "Project list" },
				{ icon: "favorite_border", label: "Favoris" },
				{ icon: "settings", label: "Settings" },
			],
			currentModal: null
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
