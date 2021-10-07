const JsonProjectList = window.document.getElementById("JsonProjectList").value;
window.document.getElementById("JsonProjectList").remove();

const RootComponent = {
	data() {
		return {
			projectList: []
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
