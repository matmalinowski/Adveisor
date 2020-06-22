require('../css/app.css');

import Vue from 'vue';
import vuetify from './plugins/vuetify.js';
import router from './plugins/router.js';

/*import Pusher from 'pusher-js';

Pusher.logToConsole = true;

let pusher = new Pusher('d1cd9ab8c904f6b99ef4', {
      cluster: 'eu'
    }
);

let channel = pusher.subscribe('channel');

channel.bind('project-update', function(data) {
  app.pusherMessages.push(JSON.stringify(data));
});*/

const app = new Vue({
	lang: {
		locales: { pl },
		current: 'pl' 
	},
	vuetify,
	router,
	el: '#app',
	render: h => h(App)
});