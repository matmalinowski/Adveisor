import Vue from 'vue';
import VueRouter from 'vue-router';
import Main from '../vue/main/Main.vue';

Vue.use(VueRouter);

const routes = [
	{
		path: '/',
		name: 'main_path',
		component: Main
	}
];

const router = new VueRouter({
	routes
});

export default router;