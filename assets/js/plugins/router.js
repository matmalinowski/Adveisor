import Vue from 'vue';
import VueRouter from 'vue-router';
import Main from '../vue/main/Main.vue';
import User from '../vue/main/User.vue';
import About from '../vue/main/About.vue';

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
	},
	{
		path: '/uber-unse',
		name: 'about_us_path',
		component: About
	}
];

const router = new VueRouter({
	routes
});

export default router;