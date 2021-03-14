<template>
  <div>
    <city-flicker v-on:changeSlide="changeCity" v-on:openModal="displayModal"></city-flicker>
    <venues-details-list id="venue_details" :venues.sync="venues" v-on:closeModal="dismissModal"></venues-details-list>
    <weather-details-list id="weather_details" :forecasts.sync="forecasts" v-on:closeModal="dismissModal"></weather-details-list>
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
        forecasts: [],
      }
    },
    mounted(){
      this.getCityWeather();
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
      dismissModal(id){
        $("#"+id).click();
      },
      displayModal(id){
        var myModal = new bootstrap.Modal(document.getElementById(id))
        myModal.show()
      },
      getCityWeather(){
        let that = this;
        axios.post(process.env.MIX_APP_URL+'/api/gwf', {city: this.selected_city}).then(response=>{
          that.venues = response.data.DATA.venues
          that.forecasts = response.data.DATA.forecasts
        })
      }
    },
    watch:{
      'selected_city': 'getCityWeather'
    }
  }
</script>