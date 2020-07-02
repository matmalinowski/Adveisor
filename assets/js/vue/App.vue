<template>
	
	<v-app>

		<v-navigation-drawer
	      	v-model="drawer"
	      	app
	      	clipped
	      	color="deep-orange accent-4"
	      	dark
	    >
	      
	      	<v-list dense>
	        	
	        	<v-list-item link :to="{ name: 'main_path' }" exact>
	          		
	          		<v-list-item-action>
	            		<v-icon>mdi-view-dashboard</v-icon>
	          		</v-list-item-action>
		          	
		          	<v-list-item-content>
		            	<v-list-item-title>Hauptseite</v-list-item-title>
		          	</v-list-item-content>
	        	
	        	</v-list-item>

	        	<v-list-item link :to="{ name: 'about_us_path' }" exact>
	        		
	        		<v-list-item-action>
	        			<v-icon>group</v-icon>
	        		</v-list-item-action>

	        		<v-list-item-content>
	        			<v-list-item-title>Über uns</v-list-item-title>
	        		</v-list-item-content>

	        	</v-list-item>
	      
	      </v-list>
	    
	    </v-navigation-drawer>

	    <v-app-bar
	      	app
	      	clipped-left
	      	color="indigo darken-2"
	      	dark
	    >
      		<v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      		<v-toolbar-title>MWD-Münchner Wetterdienst | Gruppe 6</v-toolbar-title>
    	</v-app-bar>
		
		<v-main>
			
			<v-container
				fluid
			>
				
				<router-view></router-view>

			</v-container>

		</v-main>

		<v-footer app color="grey lighten-2">
			<span>&copy; MWD-Münchner Wetterdienst</span>
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