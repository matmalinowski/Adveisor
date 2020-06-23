<template>
	
	<div>
		
		<h1 class="headline pa-4">

			Mitglied

		</h1>

		<v-card
			
		>
			
			<v-data-table
				v-if="geoData.length"
				:headers="headers"
				:items="geoData"
				item-key="id"
				class="elevation-1"
			></v-data-table>

			<h1 class="headline pa-4" v-else-if="!loading">
				Keine Dateien
			</h1>

		</v-card>

	</div>

</template>

<script>

	import axios from 'axios';
	
	export default {

		data: () => ({
			geoData: [],
			headers: [
				{
					text: 'Temperatur (Grad Celsius)',
					value: 'temperature'
				},
				{
					text: 'Luftfeuchtigket ( % )',
					value: 'humidity'
				},
				{
					text: 'Luftdruck',
					value: 'airPressure'
				}
			],
			data: null,
			loading: true
		}),

		methods: {

			async onLoad() {

				const id = this.$route.params.id;

				await axios.get('/api/users/' + id).then((res) => {

					console.log(res);

					let user = res.data;

					this.geoData = user.geoData;
					this.loading = false;

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