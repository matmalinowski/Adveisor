<template>
	
	<v-app>

		<v-navigation-drawer
	      	v-model="drawer"
	      	app
	      	clipped
	    >
	      
	      	<v-list dense>
	        	
	        	<v-list-item link :to="{ name: 'main_path' }">
	          		<v-list-item-action>
	            		<v-icon>mdi-view-dashboard</v-icon>
	          		</v-list-item-action>
		          	<v-list-item-content>
		            	<v-list-item-title>Hauptseite</v-list-item-title>
		          	</v-list-item-content>
	        	</v-list-item>
	      
	      </v-list>
	    
	    </v-navigation-drawer>

	    <v-app-bar
	      	app
	      	clipped-left
	    >
      		<v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      		<v-toolbar-title>Adveisor | Gruppe 6</v-toolbar-title>
    	</v-app-bar>
		
		<v-main>
			
			<v-container
				fluid
			>
				
				<router-view></router-view>

			</v-container>

		</v-main>

		<v-footer app>
			<span>Adveisor Gruppe 6</span>
		</v-footer>

	</v-app>

</template>

<script>
	
	export default {

		data: () => ({
			drawer: null
		}),

		created() {

			//this.$vuetify.theme.dark = true;

		}

	}

</script>