require('../css/app.css');

import Vue from 'vue';
import vuetify from './plugins/vuetify.js';
import router from './plugins/router.js';
import App from './vue/App.vue';

const app = new Vue({
	vuetify,
	router,
	el: '#app',
	render: h => h(App)
});