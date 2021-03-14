<template>
<div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <img :src="weather_icon_url" style="width: 25px; height: 25px; margin-top: -10px;margin-right: 10px"> 5-day Weather Forecasts
        </h5>
        <img class="btn" :src="times_icon_url" style="height: 25px;" @click="dismissModal">
      </div>
      <div class="modal-body p-2">
        <div class="card mb-2" v-for="(forecast, key) in forecasts" :key=key>
          <div class="row mt-2 p-2">
            <div class="col-md-6 pr-4 pl-4">
              <img class="card-icon" :src="calendar_icon_url">{{forecast.date}}<br>
              <img class="card-icon" :src="time_icon_url">{{forecast.time}}<br>
              <img class="card-icon" :src="info_icon_url">{{forecast.description}}
            </div>
            <div class="col-md-6 pr-4 pl-4">
              <img class="card-icon" :src="fire_icon_url">{{cf_temp(forecast.max_temp)}}<br>
              <img class="card-icon" :src="snowflake_icon_url">{{cf_temp(forecast.min_temp)}}<br>
              <img class="card-icon" :src="umbrella_icon_url">{{forecast.pop}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<style scoped>
  .card{
    transition: box-shadow 0.3s ease-in-out;
  }
  .card:hover{
    box-shadow: 0px 0px 5px #888;
  }
  img.card-icon{
    width: 20px;
    height: 15px;
    margin-top: -5px;
    margin-right: 5px;
  }
</style>
<script>
  export default {
    props:{
      forecasts: Array,
    },
    data(){
      return {
        url: process.env.MIX_APP_URL + '/images'
      }
    },
    computed:{
      calendar_icon_url(){
        return this.url + '/calendar-day.svg';
      },
      fire_icon_url(){
        return this.url + '/fire.svg';
      },
      info_icon_url(){
        return this.url + '/info-circle.svg';
      },
      snowflake_icon_url(){
        return this.url + '/snowflake.svg';
      },
      time_icon_url(){
        return this.url + '/clock.svg';
      },
      times_icon_url(){
        return this.url + '/times.svg';
      },
      umbrella_icon_url(){
        return this.url + '/umbrella.svg';
      },
      weather_icon_url(){
        return this.url + '/cloud-sun-black.svg';
      },
    },
    methods:{
      cf_temp(kelvin){
        var celsius = kelvin - 273.15;
        var fahrenheit = celsius * 9 / 5 +32;
        return celsius.toFixed(2) + '°C / ' + fahrenheit.toFixed(2) + '°F';
      },
      dismissModal(){
        this.$emit('closeModal', 'weather_details')
      }
    }
  }
</script>