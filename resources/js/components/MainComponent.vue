<template>
  <div>
    <city-flicker v-on:changeSlide="changeCity" v-on:openModal="displayModal"></city-flicker>
    <venues-details-list id="venue_details" v-bind:venues.sync="venues"></venues-details-list>
    <weather-details-list id="weather_details" v-bind:forecasts.sync="forecasts"></weather-details-list>
  </div>
</template>
<style>
  
</style>
<script>
  export default {
    data(){
      return {
        selected_city: 'Tokyo',
        venues: [],
        forecasts: []
      }
    },
    methods:{
      changeCity(city_index){
        switch(city_index){
          case 0:
            this.selected_city = 'Tokyo'
            break;
          case 1:
            this.selected_city = 'Yokohama'
            break;
          case 2:
            this.selected_city = 'Kyoto'
            break;
          case 3:
            this.selected_city = 'Osaka'
            break;
          case 4:
            this.selected_city = 'Sapporo'
            break;
          case 5:
            this.selected_city = 'Nagoya'
            break;
          default:
            this.selected_city = 'Tokyo'
        }
      },
      displayModal(id){
        var myModal = new bootstrap.Modal(document.getElementById(id), {
          keyboard: false
        })
        myModal.show()
      },
      getCityWeather(){
        let that = this;
        axios.post(process.env.MIX_APP_URL+'/api/gwf', {city: this.selected_city}).then(response=>{
          that.venues = response.data.DATA.venues
          that.forecasts = response.data.DATA.forecasts
          console.log(response)
        })
      }
    },
    watch:{
      'selected_city': 'getCityWeather'
    }
  }
</script>