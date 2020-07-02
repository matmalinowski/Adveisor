<template>

	<div>
	
		<h1 class="headline pa-4">
			Unsere Mitglieder
		</h1>

		<v-card>
				
			<v-list-item
				v-if="users.length"
				v-for="user in users"
				:key="user['@id']"
			>
				
				<v-list-item-avatar>
					
					<v-img
						src="/images/person-gray-photo-placeholder-man-vector-23907840.jpg"
					></v-img>
				
				</v-list-item-avatar>

				<v-list-item-content>
					
					<v-list-item-title v-text="user.name"></v-list-item-title>

				</v-list-item-content>

				<v-list-item-action>

					<v-btn
						text
						color="teal"
						link
						:to="{ name: 'user_path', params: { id: user.id } }"
					>
						Schau
					</v-btn>

				</v-list-item-action>

			</v-list-item>

			<div class="text-center pa-5" v-if="!users.length">

				<v-progress-circular
					:size="50"
      				color="primary"
      				indeterminate
				></v-progress-circular>

			</div>

		</v-card>

	</div>

</template>

<script>

	import axios from 'axios';
	
	export default {

		data: () => ({
			users: []
		}),

		methods: {

			async onLoad() {

				await axios.get('/api/users').then((res) => {

					console.log(res);

					let users = res.data['hydra:member'];

					this.users = users;

					console.log(users);

				}).catch((err) => {

					console.log(err);

				});

			}

		},

		mounted() {

			this.onLoad();

		}

	}

</script>