
const RootComponent = {
	data() {
		return {
			projectList: []
		}
	}
}

const app = Vue.createApp(RootComponent);
const vm = app.mount('#app');
