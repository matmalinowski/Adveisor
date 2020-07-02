<template>
	
	<div>
		
		<h1 class="headline pa-4">

			<span v-if="user">{{ user.name }}</span>

		</h1>

		<v-card
			class="ma-5"
		>

			<v-card-title>
				Wetterangaben
			</v-card-title>
			
			<v-data-table
				:headers="headers"
				:items="geoData"
				item-key="id"
				class="elevation-1"
				:loading="loading"
				hide-default-footer
			>
				
				<template v-slot:item.postedAt="{ item }">
					<span>{{ resolveDate(item.postedAt) }}</span>
				</template>

			</v-data-table>

			<div class="text-center pt-2" v-if="geoData.length">

				<v-pagination v-model="page" :length="pageCount" @input="onPageChanged"></v-pagination>

			</div>

			<h1 class="headline pa-4" v-if="!loading && !geoData.length">
				Keine Daten
			</h1>

		</v-card>

	</div>

</template>

<script>

	import axios from 'axios';
	import LineChart from '../../plugins/LineChart.js';
	var moment = require('moment');
	moment.locale('de');
	
	export default {

		components: {

		},

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
				},
				{
					text: 'Datum',
					value: 'postedAt'
				}
			],
			data: null,
			loading: true,
			user: null,
			totalGeo: null,
			page: 1,
			pageCount: 1
		}),

		methods: {

			async onLoad() {

				const id = this.$route.params.id;

				await axios.get('/api/users/' + id).then((res) => {

					let data = res.data;

					this.user = data;

				}).catch((err) => {

					console.log(err);

				});

				await axios.get('/api/users/' + id + '/geo_datas', {

					params: {
						page: 1,
						'order[postedAt]': 'desc'
					}

				}).then((res) => {

					console.log(res);

					let data = res.data['hydra:member'];

					this.geoData = data;
					this.loading = false;
					this.totalGeo = res.data['hydra:totalItems'];

					this.pageCount = Math.ceil(res.data['hydra:totalItems'] / 10);

				}).catch((err) => {

					console.log(err);

				});

			},

			resolveDate(date) {

				return moment(date).format('LL, HH:mm:SSS');

			},

			async onPageChanged() {

				this.loading = true;

				await axios.get('/api/users/' + this.$route.params.id + '/geo_datas', {

					params: {
						page: this.page,
						'order[postedAt]': 'desc'
					}

				}).then((res) => {

					let data = res.data['hydra:member'];

					this.geoData = data;

					let totalItems = res.data['hydra:totalItems'];

					if(Math.ceil(totalItems / 10) != this.pageCount) {

						this.pageCount = Math.ceil(totalItems / 10);

					}

				}).catch((err) => {

					console.log(err);

				}).finally(() => {

					this.loading = false;

				});

				console.log(this.page);

			}

		},

		mounted() {

			this.onLoad();

		}

	}

</script>