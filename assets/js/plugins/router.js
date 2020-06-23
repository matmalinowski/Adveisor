import Vue from 'vue';
import VueRouter from 'vue-router';
import Main from '../vue/main/Main.vue';
import User from '../vue/main/User.vue';

Vue.use(VueRouter);

const routes = [
	{
		path: '/',
		name: 'main_path',
		component: Main
	},
	{
		path: '/user/:id',
		name: 'user_path',
		component: User
	}
];

const router = new VueRouter({
	routes
});

export default router;